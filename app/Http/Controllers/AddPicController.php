<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AddPic;
class AddPicController extends Controller
{
    public function upload(Request $request){
        request()->validate([
            "pic" => 'required'
        ]);
        // dd($request);
        $image = $request->file('pic');
        $path = public_path(). '/images/';
        $filename = uniqid(). '.' . $image->getClientOriginalExtension();
        // dd($filename);
        $image->move($path, $filename);
        //echo "<pre>";
       //print_r($request);
        $addpic = new AddPic();
        $addpic->add_id=request('add_id');
        $addpic->owner_id=auth()->id();
        $addpic->pic_name=$filename;
        // dd($addpic);
        $addpic->save();
        return redirect('/show/'.request('add_id'));
    }
}
