<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Add;
use App\Addpic;

class AddController extends Controller
{
    public function __construct(){
        $this->middleware('auth')->only('upload','delete','edit','update');
    }
    public function index(){
        $Adds=Add::all();
        return view('index',compact("Adds"));
    }

    public function upload(Request $request){
        request()->validate([
            "img"=>'required|image|mimes:jpg,png,jpeg|max:2000',
            "title"=>"required|min:2|max:20",
            "description"=>"required|min:2|max:800",
            "cost"=>"required",
        ]);

        $image = $request->file('img');
        $path = public_path(). '/images/';
        $filename = uniqid(). '.' . $image->getClientOriginalExtension();
        $image->move($path, $filename);
        
        echo $filename;
        $add = new Add();
        $add->title=request('title');
        $add->description=request('description');
        $add->owner_id=auth()->id();
        $add->cost=request('cost');
        $add->image=$filename;
        print_r($add);
        $add->save();
        
        return redirect('/');

        // $data=[
        //     "image"=>$filename,
        //     "title"=>request('title'),
        //     "description"=>request('description'),
        //     "owner_id"=>auth()->id(),
        //     "cost"=>request('cost')
            
        // ];
        
        // Add::create($data);
    }


    public function show($id){
        $add=Add::findorfail($id);
        $addpics=DB::table('add_pics')->where('add_id',$id)->get();

        return view('Adds.show',[
            "add" => $add,
            "addpics"=>$addpics
        ]);
    }


    public function delete($id){
        
        $add=Add::findorfail($id);
        $this->authorize('update',$id);
        $path=public_path()."/images/".$add->image;
        print_r($add->id);
        echo "<br>";
        print_r($id);
        $images=DB::table('add_pics')->where('add_id',$id)->get();
        $set=DB::table('add_pics')->where('add_id',$id)->delete();
        foreach($images as $image){
            $path2=public_path()."/images/".$image->pic_name;
            File::delete($path2);
        }

        $add->delete();

        File::delete($path);
        return redirect('/');
    }


    public function edit($id){
        $add=Add::findorfail($id);
        return view('Adds.edit',["add" => $add]);
    }


    public function update($id,Request $request){

        // $request->validate([
        //     "img"=>'required|image|mimes:jpg,png,jpeg|max:2000',
        //     "title"=>"required|min:2|max:20",
        //     "description"=>"required|min:2|max:800",
        //     "cost"=>"required"
        // ]);

        $add=Add::findorfail($id);
        $path=public_path()."/images/".$add->image;
        $filename=$add->image;
        File::delete($path);
        $add->delete();
        $image = $request->file('image');
        $path = public_path(). '/images/';
        $filename = uniqid(). '.' . $image->getClientOriginalExtension();
         $image->move($path, $filename);
        $add = new Add();
        $add->title=request('title');
        $add->description = request('description');
        $add->owner_id = auth()->id();
        $add->cost = request('cost');
        $add->image = $filename;
        $add->save();
        return redirect('/');
    }
}