<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

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
        return view('components.manage.new-blog');
    }

    private function attachTag(Request $request, Post $post){
        //tag section
        $tags=$request->input("hidden-input-tags");
        $tagArray=[];
        
        //if tags
        if ($tags != '[]' && $tags){
            
            //turn to array
            $tags = explode(',', $tags);
            foreach ($tags as $tag){
                $tagInstance=Tag::firstOrCreate([
                    'name'=>$tag
                ]);
                
                array_push($tagArray, $tagInstance->id);
                
            }
            //dd($tagArray);
            //attach tags
            $post->tags()->sync($tagArray);
        } else {
            //used to delete any associate tags if user deletes all tags from existing post
            $post->tags()->sync([]);
        }
        return;
    }

    public function store(Request $request){
        //rules
        
        $postAttributes=$request->validate([
            'title'=>['required'],
            'text'=>['required'],
        ]);

        $postAttributes['user_id']=$request->user()->id;
        //create post
        $post=Post::create($postAttributes);
  
        $this->attachTag($request, $post);
        
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
        $tagsObject=$post->tags()->get();
        //convert to correct type
        $tags="";
        foreach($tagsObject as $tag){
            $name=$tag->name;
            $tags.=$name.',';
        }
        $tags=mb_substr($tags, 0, -1);
        
        return view('components.manage.update-post', compact('post', 'tags'));
        
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
        
        $this->attachTag($request, $oldPost);
        return redirect('/blog/manage')->with('message', 'Updated Successfully!');

    }
}
