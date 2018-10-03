<?php

namespace App\Console\Commands\WordPress;

use Illuminate\Console\Command;

class ImportCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wp:import {domain}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import WordPress User, Post, Category, Tag and Media.';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $domain = $this->argument('domain') . '/wp-json/wp/v2/';
        $this->info('Domain: ' . $domain);
        $this->cleanUp();
        collect(config('wp2l.types'))
            ->each(function ($fetch) use ($domain) {
                $this->info('Fetch: ' . $fetch);
                (new \App\Services\WordPress\ImportService())
                    ->setDomain($domain)
                    ->setUri($fetch)
                    ->handle();
            });
    }

    private function cleanUp()
    {
        collect(glob(storage_path('wp/*.json')))
            ->each(function ($path) {
                unlink($path);
            });
    }
}
