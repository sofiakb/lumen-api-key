<?php


namespace Sofiakb\Lumen\ApiKey\Console\Commands;

use Sofiakb\Lumen\ApiKey\Models\ApiKey;
use Illuminate\Console\Command;
use Sofiakb\Lumen\ApiKey\Services\Parser;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class ApiKeyRetrieveCommand
 * @package Sofiakb\Lumen\ApiKey\Console\Commands
 */
class ApiKeyRetrieveCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'apikey:retrieve {--name= : Nom de la clé à récupérer}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Retrieve API key by name";

    /**
     * Execute the console command.
     *
     * @return void
     * @throws \Exception
     */
    public function handle()
    {
        if (($name = $this->option('name')) === null)
            throw new \Exception("Le nom de la clé d'API est obligatoire");

        $parser = new Parser();
        if (($entry = ApiKey::whereName($name)->first()) === null)
            throw new \Exception("Aucune clé d'API n'existe déjà avec ce nom");

        $this->info("~~ $name ~~\nAPI key [" . $parser->decode($entry->key) . "].");
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(
            array('name', null, InputOption::VALUE_REQUIRED, 'Ajouter une clé existante'),
        );
    }
}
