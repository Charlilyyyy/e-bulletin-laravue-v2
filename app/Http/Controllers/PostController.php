<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return Post::all();
    }

    public function create(Request $request)
    {
        // return $request;
        // $request->validate([
        //     'topic' => 'required|string',
        //     'story' => 'required|string',
        // ]);
        
        $post = Post::create([
            'user_id' => $request->userId,
            'topic' => $request->posts['topic'],
            'story' => $request->posts['story']
        ]);

        return response()->json([
            'message' => 'Successfully create post',
            'post' => $post
        ],201);
    }
}
