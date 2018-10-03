<?php

namespace App\Console\Commands\WordPress;

use Illuminate\Console\Command;

class MergeCommentCommand extends MergeBaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wp:merge:comments';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Merge Comments.';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $type = 'comments';

    /**
     * The tables to be truncate.
     *
     * @var array
     */
    protected $tables = [
         'comments',
    ];
}
