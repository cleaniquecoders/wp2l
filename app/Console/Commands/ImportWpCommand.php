<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportWpCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:wp {domain}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import WordPress User, Post, Category, Tag and Media.';

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
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $domain = $this->argument('domain') . '/wp-json/wp/v2/';
        $this->info('Domain: ' . $domain);
        collect(['posts', 'pages', 'categories', 'comments', 'tags', 'media'])
            ->each(function ($fetch) use ($domain) {
                $this->info('Fetch: ' . $fetch);
                (new \App\Services\WordPress\ImportService())
                    ->setDomain($domain)
                    ->setUri($fetch)
                    ->handle();
            });
    }
}
