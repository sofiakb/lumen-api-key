<?php


namespace Sofiakb\Lumen\ApiKey\Console\Commands;

use Sofiakb\Lumen\ApiKey\Models\ApiKey;
use Illuminate\Console\Command;
use Sofiakb\Lumen\ApiKey\Services\Parser;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class ApiKeyDeactivateCommand
 * @package Sofiakb\Lumen\ApiKey\Console\Commands
 */
class ApiKeyDeactivateCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'apikey:deactivate {--name= : Nom de la clé à désactiver}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Deactivate API key by name";

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

        if (($entry = ApiKey::whereName($name)->first()) === null)
            throw new \Exception("Aucune clé d'API n'existe déjà avec ce nom");

        if ($entry->deactivate())
            $this->info("~~ $name ~~\nAPI key deactivated successfully.");
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