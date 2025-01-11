<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    //Display a list
    public function index()
    {
        $posts = Post::with('user')->with("tags")->get();

        return view('blog', compact('posts'));
        //add tags
    }

    public function show(Post $post){
        return view('components.post', compact('post'));
    }

    public function userPosts(User $user){
        $posts = $user->posts()->with('tags')->with('user')->get();
        $title = "Blog posts by $user->name:";
        return view('blog',compact('title', 'posts'));
    }
}
