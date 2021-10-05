<?php


namespace Sofiakb\Lumen\ApiKey\Console\Commands;

use Sofiakb\Lumen\ApiKey\Models\ApiKey;
use Illuminate\Console\Command;
use Sofiakb\Lumen\ApiKey\Services\Caesar;
use Sofiakb\Lumen\ApiKey\Services\Parser;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class ApiKeyGenerateCommand
 * @package Sofiakb\Lumen\ApiKey\Console\Commands
 */
class ApiKeyGenerateCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'apikey:generate {--k|key= : Valeur de la clé à assigner (optionel)} {--name= : Nom (unique) pour la clé d\'API}';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Create new api key";
    
    /**
     * Execute the console command.
     *
     * @return void
     * @throws \Exception
     */
    public function handle()
    {
        /* @var $key String La clé générée par la méthode */
        $key = trim($this->getRandomKey());
        
        if (($name = $this->option('name')) === null || !($name = strtolower(str_replace(" ", "-", $name))))
            throw new \Exception("Un nom pour la clé d'API est obligatoire");
        
        if (!(($entry = ApiKey::whereName($name)->first()) === null))
            throw new \Exception("Une clé d'API existe déjà avec ce nom");
        
        $parser = new Parser();
        if ($this->option('key')) {
            $tmp = $this->option('key');
            $encoded = $parser->encode($tmp, Caesar::shift($tmp));
            $key = $tmp;
        } else
            $encoded = $parser->encode($key);
        
        // Création de l'entrée dans la base
        ApiKey::create([
            'key'  => $encoded,
            'name' => $name
        ]);
        
        if (Caesar::shift($key) === null) {
            $shift = explode('.s00', $encoded)[1];
            $key .= ".s00$shift";
        }
        
        // Affichage de la clé à l'écran
        $this->info("~~ $name ~~\nAPI key [$key] created successfully.");
    }
    
    /**
     * Generate a random api key for the application.
     *
     * * @return string
     */
    protected function getRandomKey()
    {
        return implode('-', str_split(substr(strtolower(md5(microtime() . rand(1000, 9999))), 0, 30), 6));
    }
    
    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
            array('key', null, InputOption::VALUE_OPTIONAL, 'Ajouter une clé existante'),
            array('name', null, InputOption::VALUE_REQUIRED, 'Ajouter une clé existante'),
        );
    }
}
