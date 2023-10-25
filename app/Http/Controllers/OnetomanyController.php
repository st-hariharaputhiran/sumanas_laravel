<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Image;
use App\Models\Video;
use App\Models\Comment;
use App\Models\Tag;

class OnetomanyController extends Controller
{
    public function getPotmPostCommentVideos(Request $request)
    {
        $posts = Post::Paginate(5,['*'], 'posts_page');
        $videos = Video::Paginate(5,['*'], 'videos_page');
        return view('posts', ['posts' => $posts,'videos' => $videos]);
    }

    public function postcomments(Request $request)
    {
        $post = Post::find($request->postcommentid);	
        $redirects_to=$request->redirects_to_comment;
        $comment = new Comment;
        $comment->body = $request->pcomment;
        $post->comments()->save($comment);
        return redirect($request->redirects_to_comment);
    }

    public function posttags(Request $request)
    {
        $post = Post::find($request->posttagid);	
        $redirects_to=$request->redirects_to_tag;
        $tag = new Tag;
        $tag->name = $request->ptag;
        $post->tags()->save($tag);
        return redirect($request->redirects_to_tag);
    }
    

    public function postimages(Request $request)
    {
        $post = Post::find($request->postimgid);	
        $redirects_to=$request->redirects_to_tag;
        $img = $post->image;
        $img->url = $request->imgurl;
        $post->image()->save($img);
        return redirect($request->redirects_to_tag);
    }

    public function videocomments(Request $request)
    {
        $video = Video::find($request->videocommentid);	
        $redirects_to=$request->redirects_to_comment;
        $comment = new Comment;
        $comment->body = $request->vcomment;
        $video->comments()->save($comment);
        return redirect($request->redirects_to_comment);
    }

    public function videotags(Request $request)
    {
        $video = Video::find($request->videotagid);	
        $redirects_to=$request->redirects_to_tag;
        $tag = new Tag;
        $tag->name = $request->vtag;
        $video->tags()->save($tag);
        return redirect($request->redirects_to_tag);
    }
    
}
