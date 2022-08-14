<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
class BlogController extends Controller
{
    
    public function post(Request $request){

        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ],
        ['title.required'=>'please insert title' ]);

        Blog::insert([
            'title'=>$request->title,
            'description'=>$request->description,
        ]);

        return redirect()->back()->with('success','post has been uploaded successfully...!');
    }


/*==================  get all data from post  ================*/
    public function index()
    {
        $posts = Blog::latest()->get();
        return view('post',compact('posts'));
    }


/*==================  get all comment  ================*/
    public function comment()
    {
        $comments = Blog::latest()->get();
        return view('home',compact('comments'));
    }




    public function edit($id)
    {
        $data  = Blog::findOrFail($id);

        return view('edit',compact('data'));

    }


    /*==========================  update post ================*/

    public function update(Request $request,$id)
    {

        $request->validate([
            'title'=>'required',
            'description'=>'required'
        ],
        ['title.required'=>'please insert title' ]);

        Blog::findOrFail($id)->update([
            'title'=>$request->title,
            'description'=>$request->description,
        ]);

        return redirect()->to('post')->with('success','post has been updated successfully...!');
        
    }

    /*================== delete post ====================*/


    public function destroy($id) {
        
        if (Blog::find($id)->delete()) {
            Session()->flash('delete','Post Deleted Successfully..! ✔');
        }
        return redirect()->back();
    }



}
