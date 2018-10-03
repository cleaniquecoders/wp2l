<?php

namespace App\Console\Commands\WordPress;

use Illuminate\Console\Command;

class MergePageCommand extends MergeBaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wp:merge:pages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Merge Pages.';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $type = 'pages';

    /**
     * The tables to be truncate.
     *
     * @var array
     */
    protected $tables = [
         'pages',
    ];
}
