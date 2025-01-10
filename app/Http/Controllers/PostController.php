<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //Display a list
    public function index()
    {
        $posts = Post::with('user')->get();

        return view('blog', [
            'posts'=>$posts,
            //add tags
        ]);
    }

    public function show(Post $post){
        return view('components.post', ['post'=>$post]);
    }
}
