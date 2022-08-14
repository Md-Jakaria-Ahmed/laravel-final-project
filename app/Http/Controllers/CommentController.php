<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::check()) {

            
            Comment::create([
                'post_id'=>$post_id,
                'user_id'=>$Auth::user()->id,
                'Comment'=>$request->comment
            ]);
        }
        else{
           return redirect()->back()->with('msg','post not found');
        }
    }
}
