<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{



    public function index()
    {
        $list = User::latest()->get();
        return view('userlist',compact('list'));
    }

    
}
