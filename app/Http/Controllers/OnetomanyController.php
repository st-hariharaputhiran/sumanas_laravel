<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class OnetomanyController extends Controller
{
    public function getPotmPostComment()
    {
        $posts = Post::simplePaginate(2);
        return view('posts', ['posts' => $posts]);
    }

    public function postcomments(Request $request)
    {
        $post = Post::find($request->postid);	
        $redirects_to=$request->redirects_to;
        $comment = new Comment;
        $comment->body = $request->pcomment;
        $post->comments()->save($comment);
        //$posts = Post::simplePaginate(2);
        //return view('posts', ['posts' => $posts]);
        return redirect($request->redirects_to);
    }

    
}
