<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>DevFolio Bootstrap Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,400,700,900&display=swap" rel="stylesheet">
  <script src="{{asset("font-awesom/all.js")}}"></script>
  <style>


.size img{
  height: 85vh;
  
  object-fit: cover;
  
}
.box_title{
  border:solid 2px black;

}
.heading{
  padding-top:5px;
  text-align:left;
  display:block;
  font-family: 'Lato', sans-serif;
    font-size:30px;
    font-weight:bolder;
}
.heading2{
  padding-top:5px;
  text-align:left;
  display:block;
  font-family: 'Lato', sans-serif;
    font-size:20px;
    font-weight:350;
}
.side{
  /* float:right; */
}
  </style>


  <!-- =======================================================
    Theme Name: DevFolio
    Theme URL: https://bootstrapmade.com/devfolio-bootstrap-portfolio-html-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body id="page-top">

  <!--/ Nav Star /-->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top bg-dark navbar-dark" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="#page-top">DevFolio
     
      </a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link js-scroll active" href="/">Home</a>
          </li>
          @if(auth()->check())
            <li class="nav-item">
              <a class="nav-link"  href="{{ url('/logout') }}"> logout </a>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link"  href="{{ url('/login') }}"> login </a>
            </li>
            <li class="nav-item">
              <a class="nav-link"  href="{{ url('/register') }}"> register </a>
            </li>
          @endif
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#service">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#work">Work</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#blog">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="#contact">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->
@if(session('admin_error'))
<p style="margin-top:100px">{{session('admin_error')}}</p>
@endif
    <!--/ Section Blog End /-->
@yield('content')
  <!-- JavaScript Libraries -->

  

  <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- <script >
      $('#reloader').click(function(){
        $("#con").load( " #con");
      })
  // $("#con").click( function(){
  //     console.log($('#con'))
  //     const inputEle = document.createElement('input');
  //     inputEle.value = $('#con')[0].innerText
  //     document.querySelector('#con').appendChild(inputEle)
  //     // $('#con')[0].innerText = ''
  // });


</script> -->
<script>
// $('.like').on('click',function(event){
//   console.log('here');
// });
$('#like_form').on('submit',funtion(event){
    event.preventDefault();
    alert(this);
    $.ajax({
      type:"POST",
      url:{{route('favourite')}},
      data:new FormData(this),
      contentType:false,
      cache:false,
      processData:false,
      datatype:"jason",

      success:function(){
        var html='';
        if(data.errors){
          html="<div class='alert alert-danger'>";
          for(var count=0;count<data.errors.length;count++){
            html='<p>'+data.errors[count]+'</p>';
          }
          html+='</div>';
        }
        if(data.success){
          html='<div class="alert alert-success">'+data.success+'</div>';
          $('#sample_form')[0].reset();
          $('#favorites').DataTable().ajax.reload();
        }
        $('#form-result').html(html);
      }
    })
  }
});



</script>
</body>
</html>
