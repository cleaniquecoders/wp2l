<?php

namespace App\Console\Commands\WordPress;

use Illuminate\Console\Command;

class MergeMediaCommand extends MergeBaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wp:merge:media';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Merge Media.';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $type = 'media';

    /**
     * The tables to be truncate.
     *
     * @var array
     */
    protected $tables = [
         'media',
    ];
}
