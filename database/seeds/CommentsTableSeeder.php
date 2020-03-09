<?php

use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maxPostId = Post::max('id');
        $maxUserId = User::max('id');

        $comments = factory(Comment::class, 10)->make()->each(function ($comment) use ($maxPostId, $maxUserId) {
            $comment->post_id = rand(1, $maxPostId);
            $comment->commentator_id = rand(1, $maxUserId);
        })->toArray();

        Comment::insert($comments);
    }
}
