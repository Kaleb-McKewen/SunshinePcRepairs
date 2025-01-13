<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    //Display a list
    public function index()
    {
        $posts = Post::with('user')->with("tags")->get();

        return view('blog', compact('posts'));
    }

    public function viewAll(Request $request)
    {
        $posts = $request->user()->posts()->with('tags')->with('user')->get();
        return view('components.manage.blog-manage', compact('posts'));
    }

    public function show(Post $post){
        return view('components.post', compact('post'));
    }

    public function create(){
        return view('new-blog');
    }

    public function store(Request $request){
        //rules
        $postAttributes=$request->validate([
            'title'=>['required'],
            'text'=>['required'],
        ]);
        $postAttributes['user_id']=$request->user()->id;
        //create post
        Post::create($postAttributes);
        //redirect
        return redirect('/blog')->with('message', 'Post added successfully!');;
    }

    public function userPosts(User $user){
        $posts = $user->posts()->with('tags')->with('user')->get();
        $title = "Blog posts by $user->name:";
        return view('blog',compact('title', 'posts'));
    }

    public function destroy(Request $request, Post $post){
        
        if (!$request->user()->id === $post->user_id){
            return redirect('/')->with('bad_message', 'Not authorized!');
        }
        $post->delete();

        $posts = $request->user()->posts()->with('tags')->with('user')->get();
        return redirect('/blog/manage')->with('message', 'Deleted Successfully!');

    }
}
