<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function show(Tag $tag){
        //n+1 fix
        $posts = $tag->posts()->with('tags')->with('user')->get();
        $title = 'Blog posts with the "'.$tag->name.'" tag:';
        return view('blog', compact('title', 'posts'));
    }
}
