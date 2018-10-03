<?php

namespace App\Console\Commands\WordPress;

use Illuminate\Console\Command;

class MergeTagCommand extends MergeBaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wp:merge:tags';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Merge Tags.';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $type = 'tags';

    /**
     * The tables to be truncate
     *
     * @var array
     */
    protected $tables = [
         'taggables', 'tags'
    ];
}
