<?php

namespace App\Console\Commands\WordPress;

use Illuminate\Console\Command;

class MergeBaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wp:merge';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Merge WordPress into Laravel';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Return Full Path of File Format to Fetch
     * 
     * @return string
     */
    protected function getPath()
    {
        return storage_path('wp/' . $this->type . '*.json');
    }

    /**
     * Get FQCN of the Service Class
     * 
     * @return string
     */
    protected function getClass()
    {
        return '\App\Services\WordPress\Merge' . studly_case(str_singular($this->type)) . 'Service';
    }

    /**
     * Truncate tables
     * 
     * @return void
     */
    public function truncateTables()
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        foreach ($this->tables as $table) {
            \DB::table($table)->truncate();
        }
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->truncateTables();

        $this->info('Merging ' . $this->type . '...');

        collect(glob($this->getPath()))
            ->each(function ($file) {
                $class = $this->getClass();
                (new $class($file))->handle();
            });
    }
}
