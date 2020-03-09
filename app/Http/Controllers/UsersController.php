<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\UserCollection;

class UsersController extends Controller
{

    //пункт 6
    public function index($posts_limit = null)
    {
        $users = User::where('active', '=', true)->
                       whereHas('posts', function($q) {
                           $q->whereNull('deleted_at');
                       })->
                       limit($posts_limit)->
                       get();

        return new UserCollection($users);
    }

    //пункт 7
    public function show($user_id)
    {
        //через Query Builder
        $comments = DB::table('comments')
            ->leftJoin('posts', 'comments.post_id', '=', 'posts.id')
            ->where('commentator_id', $user_id)
            ->whereNotNull('image_id')
            ->get()
            ->sortByDesc('created_at');

        return new CommentCollection($comments);

        //на чистом SQL
//        $comments = DB::select('select * from comments
//                                       left join posts on comments.post_id=posts.id
//                                       where commentator_id = ? and
//                                       image_id is not null',
//            [$user_id]);
//
//        return response()->json($comments);
    }
}
