<?php

namespace App\Console\Commands\WordPress;

use Illuminate\Console\Command;

class MergeCategoryCommand extends MergeBaseCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wp:merge:categories';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Merge Categories.';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $type = 'categories';

    /**
     * The tables to be truncate.
     *
     * @var array
     */
    protected $tables = [
         'categories',
    ];
}
