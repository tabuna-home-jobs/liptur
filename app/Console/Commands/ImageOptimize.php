<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class ImageOptimize extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:optimize';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Оптимизация изображений';

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
        Carbon::now();
        $optimize = new Process('find  -type f -iname "*.jpg" -exec jpegoptim --strip-all -pm85 --all-progressive {} \;', [

        ]);
        $optimize->run();
    }
}
