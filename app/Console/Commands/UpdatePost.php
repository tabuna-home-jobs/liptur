<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

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
        $attachments = DB::table('attachments')->select()->get();
        foreach ($attachments as $attachment) {
            if ($attachment->post_id2 < 1) {
                continue;
            }
            DB::table('attachmentable')->insert([
                'attachmentable_type' => \App\Models\Post::class,
                'attachmentable_id'   => $attachment->post_id2,
                'attachment_id'       => $attachment->id,
            ]);
        }

        dd('test');

        Post::chunk(100, function ($posts) {
            foreach ($posts as $post) {
                $this->comment($post->id);
                $post->touch();
                $post->save();
            }
        });
    }
}
