<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favorite;
class FavoriteController extends Controller
{
    public function store(){
        $favorite= new Favorite;
        $favorite->user_id=auth()->id();
        $favorite->add_id=request('add_id');
        $favorite->state=true;
        $favorite->save();
        print_r($favorite);
        // if($favorite){
        //     return respose()->json([
        //         'success'=>'data added successfully'
        //     ]);
        // }else{
        //     return response()->json([
        //         'status' => 'error']);
        // }
        
    }
}
