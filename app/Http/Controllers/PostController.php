<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status',1)->orderBy('id','DESC')->get();
        return view('welcome',compact('posts'));
    }

    public function getAllPost()
    {
      return  Post::with('likes')->where('status',1)->orderBy('id','DESC')->get();
    }

    public function savelike(Request $request){
        $like = new Like();
        $like->post_id = $request->id;
        $like->user_id = \Auth::id();
        $like->save();
    }
}
