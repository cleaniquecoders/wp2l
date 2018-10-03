<?php

namespace App\Console\Commands\WordPress;

use Illuminate\Console\Command;

class MergeAllCommand extends Command
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
    protected $description = 'Merge all imported WordPress content into Laravel.';

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
        $this->call('wp:merge:tags');
        $this->call('wp:merge:categories');
        $this->call('wp:merge:posts');
    }
}
