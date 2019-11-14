<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Comment;


class PostCommentsSeader extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Post::class, 20)->create();
        factory(Comment::class, 60)->create();
    }
}
