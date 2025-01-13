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

    private function checkOwner(Request $request, Post $post){
        if (!$request->user()->id === $post->user_id){
            return false;
        } else {
            return true;
        }
    }

    public function destroy(Request $request, Post $post){
        if (!$this->checkOwner($request, $post)){
            redirect('/')->with('bad_message', 'Not authorized!');
        }
        
        $post->delete();
        return redirect('/blog/manage')->with('message', 'Deleted Successfully!');

    }

    public function editShow(Request $request, Post $post){
        
        if (!$this->checkOwner($request, $post)){
            redirect('/')->with('bad_message', 'Not authorized!');
        }
        return view('components.manage.update-post', compact('post'));
        
    }

    public function edit(Request $request, Post $post){
        
        if (!$this->checkOwner($request, $post)){
            redirect('/')->with('bad_message', 'Not authorized!');
        }
        
        //validate
        $postAttributes=$request->validate([
            'title'=>['required'],
            'text'=>['required'],
        ]);
        
        //find old post
        $oldPost = Post::find($post->id);
        //update values (update time is automatically done)
        $oldPost->title=$postAttributes['title'];
        $oldPost->text=$postAttributes['text'];
        //save
        $oldPost->save();
        return redirect('/blog/manage')->with('message', 'Updated Successfully!');

    }
}
