<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __contruct(){
        $this->middleware('admin')->only('index');
        $this->middleware('auth')->only('index');
    
    }
    public function index(){
        
        // if(auth()->user()->role!=='admin'){
        //     abort(403);
        //     dd("here");
        // }
        return view('admin');
    }
}
