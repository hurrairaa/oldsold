@extends('layouts.site_template_layout')

@section('content')

<div class="container" style="padding: 70px 0px ; ">
    <div class="row" >
        <div class="size col-sm-8 col-xs-12 " style="border:solid 2px #E0DEDE; padding:20px 20px" >
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img class="d-block w-100" src="{{ asset('images/'.$add->image) }}" alt="First slide">
                </div>
                @foreach($addpics as $addpic)
                <div class="carousel-item">
                <img class="d-block w-100" src="{{ asset('images/'.$addpic->pic_name) }}" alt="Second slide">
                </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        </div>
        <div class="col-sm-4 col-xm-12" >
        <div class="container" >
            <div class="row" >
                <br><br><br>
                <div class="col-sm-12" style="border: 2px solid #E0DEDE; height: 35vh;margin-bottom:10px">
                <span class="category heading">Rs {{strtoupper($add->cost)}} 
                    <span style="float: right; font-weight:200; font-size:20px; color: #000" class="ml-2"><i class="far fa-heart"></i></span>
                    <span style="float: right; margin-right:6px font-weight:200; font-size:20px; "><i class="fas fa-share-alt "></i></span>

                </span>
                <!-- <span class="side" > &amp; </span> -->
                </div>
                <div class="col-sm-12" style="border: 2px solid #E0DEDE; height: 60vh">
                    <span >
                        <span style="margin-right:5px" class="heading2">
                            Seller Description
                            <span style="float: right; margin-right:6px;font-size:20px; font-weight:200"><i class="fas fa-share-alt"></i></span>                            
                        </span>
                        <span>
                            <span style="float: right; margin-right:6px;font-size:20px; font-weight:200">

                            </span>
                            {{strtoupper($add->owner->name)}}
                        </span>
                        
                    </span>
                    </div>
                </div>
        </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row" style="border:2px solid #E0DEDE">
    <div class="col-sm-10" style="padding:20px 20px; height:50vh">
        <span style="font-family:'Lato', sans-serif; font-weight:1000; font-size:20px; display:block">
            Details
        </span>
        <span style="display:block;">
            {{$add->title}}
        </span>
        <span style="font-family:'Lato', sans-serif; font-weight:800; font-size:15px; display:block; padding:10px 0px;">
            type
        </span>
        <hr>
        
        
        <span style="font-family:'Lato', sans-serif; font-weight:1000; font-size:20px; display:block; padding:10px 0px;">
                Description
            </span>
            <span style="">
                {{$add->description}}
            </span>
        </div>
    </div>
</div>
<div class="container mt-4 ">
    <div class="row">
        <div class="col-sm-7 mr-5" style="height:50vh; border:2px solid #E0DEDE; padding:10px 10px">
            <span style="display:block; font-size:20px ; font-weight:700;">
                Related Adds
            </span>
        </div>
        <div class="col-sm-4" style="height:50vh; border:2px solid #E0DEDE; padding:" >
        @can('update',$add)
            <h3 class="text-center" style="padding:10px 10px">
                Upload New Pic
            </h3>
            <form method="post" action="/AddPic" enctype="multipart/form-data" >
                @csrf
                <input type="file" name="pic" class="form-control"> 
                <input type="hidden" value="{{$add->id}}" name="add_id">
                @if($errors->has("pic"))
                    <p class="text-danger">{{$errors->get('pic')[0]}}</p>
                @endif
                <button type="submit" class="btn btn-info mt-4 mb-4" style="display:block">uplaod</button>
            </form>
            
            <form method="post" action="/add/destroy/{{$add->id}}" >
                    @csrf
                    @method('delete')
                        <button type="submit" class="btn btn-danger ">Delete</button>
                </form>
                <form method="post" action="/add/edit/{{$add->id}}" class="mt-3">
                    @csrf
                        <button type="submit" class="btn btn-primary">edit</button>
                </form>
        @endcan
        </div>
    </div>
</div>
<div class="interaction">
    <a href="#" class="like">like</a>
</div>

<form id="like_form">
    @csrf
    <input type="hidden" name="add_id" value="{{$add->id}}">
    <input type='submit' name="action_button" id="action_button" value="Add">
</form>


<br><br>
<br><br>


@endsection