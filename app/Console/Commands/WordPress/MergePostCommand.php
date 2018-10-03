<?php

namespace App\Console\Commands\WordPress;

use Illuminate\Console\Command;

class MergePostCommand extends MergeBaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wp:merge:posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Merge Posts.';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $type = 'posts';

    /**
     * The tables to be truncate.
     *
     * @var array
     */
    protected $tables = [
         'posts',
    ];
}
