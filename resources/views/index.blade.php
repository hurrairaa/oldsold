@extends('layouts.site_template_layout')
@section('content')


<!--/ Intro Skew Star /-->
<div id="home" class="intro route bg-image" style="background-image: url(img/intro-bg.jpg)">
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <!--<p class="display-6 color-d">Hello, world!</p>-->
          <h1 class="intro-title mb-4">I am Morgan Freeman</h1>
          <p class="intro-subtitle"><span class="text-slider-items">CEO DevFolio,Web Developer,Web Designer,Frontend Developer,Graphic Designer</span><strong class="text-slider"></strong></p>
          <!-- <p class="pt-3"><a class="btn btn-primary btn js-scroll px-4" href="#about" role="button">Learn More</a></p> -->
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->



  <!--/ Section Blog Star /-->
  <section id="blog" class="blog-mf sect-pt4 route">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="title-box text-center">
            <h3 class="title-a">
              Blog
            </h3>
            <p class="subtitle-a">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit.
            </p>
            <div class="line-mf"></div>
          </div>
        </div>
      </div>
    <br><br>
<!-- ######################### CARD ################################-->
  
      <div class="row">
      @foreach($Adds as $add)
        <div class="col-md-4">
          <div class="card card-blog">
            <div class="card-footer">
              <div class="post-author">
                <a href="{{url('show/'.$add->id)}}">
                  <img src="{{ asset('images/'.$add->image) }}" width="300"  height="300" >
                  <!-- class="avatar rounded-circle" -->
                </a>
              </div>
      
            </div>
            <div class="card-body">
              <div class="card-category-box">
                <div class="card-category">
                  <h6 class="category"><strong>{{$add->title}}</strong></h6>
                </div>
              </div>
              <h3 class="card-description"><a href="{{url('show/'.$add->id)}}">{{str_limit($add->description,10,)}}</a></h3>
              <p class="card-title">
                Rs {{$add->cost}}
              </p>
            </div>
          </div>
          
        </div>
        @endforeach
        
    </div>
  </div>
  </section>
  <br><br>
  <br><br><br>


  
 <!--#######################      End Of Card      #######################-->




<div class="row">
  <div class="col-md-1">

  </div>
  <div class="col-md-6">
    <h3 >Post Your ADD </h3>
    <form method="post" enctype="multipart/form-data" action="/upload">
      @csrf
      <div class="form-group">
        <label for="">Enter Title:</label>
        <input type="text" class="form-control" placeholder="Enter title" name="title" value="{{old('title')}}">
        @if($errors->has("title"))
          <p class="text-danger">{{$errors->get('title')[0]}}</p>
        @endif
      </div>

      <div class="form-group">
        <label>Enter Product Name:</label>
        <textarea class="form-control" type="text" placeholder="Enter description" rows="3" cols="2" name="description" >{{old('description')}}</textarea>
      </div>
      @if($errors->has("description"))
          <p class="text-danger">{{$errors->get('description')[0]}}</p>
      @endif

      <div class="form-group">
        <label>Enter Cost:</label>
        <input  class="form-control" type="number" placeholder="Enter Cost" name="cost" value="{{old('cost')}}">
      </div>
      @if($errors->has("cost"))
          <p class="text-danger">{{$errors->get('cost')[0]}}</p>
      @endif
      

      <div class="form-group">
        <label>Enter phone_no:</label>
        <input  class="form-control" type="number" placeholder="Enter Phone number" name="phone_no" value="{{old('phone_no')}}">
      </div>
      @if($errors->has("phone_no"))
          <p class="text-danger">{{$errors->get('phone_no')[0]}}</p>
      @endif

      <div class="form-group">
        <label>Enter Location:</label>
        <select class="selectpicker form-control" name="location">
          <option value="AB hall">AB hall</option>
          <option value="Q hall">Q hall</option>
          <option value="Ail hall">Ail hall</option>
          <option value="I hall">I hall</option>
        </select>
      </div>

      <div class="form-group">
        <label>Enter Room_no:</label>
        <input  class="form-control" type="number" placeholder="Enter Room number" name="Room_no" value="{{old('Room_no')}}">
      </div>
      @if($errors->has("Room_no"))
          <p class="text-danger">{{$errors->get('Room_no')[0]}}</p>
      @endif


      <div class="form-group">
        <label>Enter Year:</label>
        <input  class="form-control" type="number" placeholder="Enter Year" name="age" value="{{old('age')}}">
      </div>
      @if($errors->has("age"))
          <p class="text-danger">{{$errors->get('age')[0]}}</p>
      @endif


    
      <div class="form-group">
        <label>Enter type:</label>
        <input  class="form-control" type="text" placeholder="type" name="type" value="{{old('type')}}">
      </div>
      @if($errors->has("type"))
          <p class="text-danger">{{$errors->get('type')[0]}}</p>
      @endif



      <div class="form-group">
        <label>Upload File:</label>
        <input  class="form-control" type="file" name="img">
      </div>
      @if($errors->has("img"))
          <p class="text-danger">{{$errors->get('img')[0]}}</p>
      @endif



      <button type="submit" class="btn btn-info">publish</button>
    <form>
  </div>

</div>

<!-- <img src="{{ asset('images/1570762211.jpg')}}"/>

<img src="{{ asset('images/5d9fef932473b.jpg') }}"> -->
<!-- /images/5da02a5419396.jpg -->
@endsection
