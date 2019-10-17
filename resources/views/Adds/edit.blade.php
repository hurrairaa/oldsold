@extends('layouts.site_template_layout')

@section('content')



<form action="/add/update/{{$add->id}}" method="post" enctype="multipart/form-data">
@csrf
@method('patch')

<div class="d-flex justify-content-center mt-4">
    <div class="col-md-4">
            <div class="card card-blog">
                <div class="card-footer">
                <div class="post-author">
                    <div class="text-center">
                        <a href="{{url('show/'.$add->id)}}">
                        <img src="{{ asset('images/'.$add->image) }}" width="300"  height="300" >
                        </a>
                    </div>
                </div>
    
            </div>
            <div class="card-body">
                <div class="card-category-box">
                    <div class="card-category">
                        <div class="text-center">
                            <div class="form-group">
                                <div class="form-group">
                                    <input type="file" name="image" value="{{$add->image}}" class="form-control text-left" required>
                                </div>
                                <P class="text-left">Title:</P>
                                <input type=text name="title" class="form-control text-left" value="{{strtoupper($add->title)}}">
                            </div>
                        </div>
                    </div>
                </div>

        <!-- <div id="con">   -->

                    <p>Description:</p>
                    <div class="form-group">
                            <textarea name="description" class="form-control text-left" rows="8">{{$add->description}}</textarea>
                    </div>


        <!-- </div>  -->
        <!-- <button id="reloader" class="btn btn-sm btn-info mt-4">Reload</button> -->
                <p class="card-description">
                <div class="form-group">
                    <p>Cost:</p>
                     <input type="number" name="cost" class="form-control text-left" value="{{($add->cost)}}">
                </div>
                <button type="submit" class="btn btn-info">update</button>
                </p>
            </div>
        </div> 
    </div>
</div>

</form>

@endsection