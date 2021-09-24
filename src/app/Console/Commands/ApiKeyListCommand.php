<?php


namespace Sofiakb\Lumen\ApiKey\Console\Commands;

use Sofiakb\Lumen\ApiKey\Models\ApiKey;
use Illuminate\Console\Command;
use Sofiakb\Lumen\ApiKey\Services\Parser;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class ApiKeyListCommand
 * @package Sofiakb\Lumen\ApiKey\Console\Commands
 */
class ApiKeyListCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'apikey:list';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "List all api keys";
    
    /**
     * Execute the console command.
     *
     * @return void
     * @throws \Exception
     */
    public function handle()
    {
        $keys = ApiKey::all();
    
        $parser = new Parser();
        foreach ($keys as $entry)
            echo $parser->decode($entry->key) . ":" . $entry->name . PHP_EOL;
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