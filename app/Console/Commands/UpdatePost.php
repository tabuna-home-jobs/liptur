<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Orchid\Platform\Core\Models\Post;

class UpdatePost extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'post:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        Post::chunk(100, function ($posts) {
            foreach ($posts as $post) {
                $this->comment($post->id);
                $post->touch();
                $post->save();
            }
        });
    }
}
