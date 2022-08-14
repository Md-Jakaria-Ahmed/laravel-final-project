<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $comments = Comment::latest()->get();
        return view('home',compact('comments'));

       /* return view('home');*/
    }

    /*==================  get all comment  ================*/


    public function post(Request $request){

        $request->validate([
            'author'=>'required',
            'comment'=>'required'
        ],
        ['author.required'=>'please insert author' ]);

        comment::insert([
            'author'=>$request->author,
            'comment'=>$request->comment,
        ]);

        return redirect()->back();
    }


/*================== destroy ==========*/

 public function destroy($id) {
        
        if (Comment::find($id)->delete()) {
            Session()->flash('delete','comm Deleted Successfully..! ✔');
        }
        return redirect()->back();
    }



}
