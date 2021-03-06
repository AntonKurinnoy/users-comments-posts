<?php

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 5)->create()->each(function ($user) {
            $user->posts()->saveMany(factory(Post::class, 3)->make());
        });
    }
}
