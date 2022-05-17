<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request){
        
        $comment = $request->validate([
            'body' => ['required'],
            'post' => ['exists:posts,id']
        ]);

        Comment::create([
            'body' => $comment['body'],
            'user_id' => auth()->user()->id,
            'post_id' => $comment['post']
        ]);

        return back();

    }

    public function destroy(Comment $comment){
        
        if(auth()->user()->id === $comment->author->id || auth()->user()->role->permission_access_all_posts === 1 || auth()->user()->id === $comment->post->author->id){
            $comment->delete();
        };

        return back();

    }
}
