<?php


namespace Sofiakb\Lumen\ApiKey\Console\Commands;

use Sofiakb\Lumen\ApiKey\Models\ApiKey;
use Illuminate\Console\Command;
use Sofiakb\Lumen\ApiKey\Services\Parser;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class ApiKeyTableCommand
 * @package Sofiakb\Lumen\ApiKey\Console\Commands
 */
class ApiKeyTableCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'apikey:table';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Create migration for api_keys table";

    /**
     * Execute the console command.
     *
     * @return void
     * @throws \Exception
     */
    public function handle()
    {
        if (copy(__DIR__ . '/../../../database/migrations/create_api_keys_table.php', database_path('migrations/' . \Carbon\Carbon::now()->format('Y_m_d_His') . "_create_api_keys_table.php")))
            $this->info('Table Migration created successfully');
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return array(//            array('name', null, InputOption::VALUE_REQUIRED, 'Ajouter une clé existante'),
        );
    }
}