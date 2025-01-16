<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function create(Post $post){
        //view
        return view('components.comment', compact('post'));
    }

    private function checkOwner(Request $request, Comment $comment){
        if (!$request->user()->id === $comment->user_id){
            return false;
        } else {
            return true;
        }
    }

    public function store(Post $post, Request $request){
        //validate
        $commentAttributes = $request->validate([
            'text'=>['required'],
        ]);
        //get remaining attributes
        $commentAttributes['user_id']=$request->user()->id;
        $commentAttributes['post_id']=$post->id;

        //make comment
        $comment=Comment::create($commentAttributes);
        //
        return redirect('/blog/'.$post->id)->with(['message'=>'Comment make successfully']);
    }

    public function destroy(Post $post, Comment $comment, Request $request){
        if (!$this->checkOwner($request, $comment)){
            redirect('/')->with('bad_message', 'Not authorized!');
        }
        //view
        $comment->delete();
        return redirect('/blog/'.$post->id)->with(['message'=>'Comment deleted successfully']);
    }
}
