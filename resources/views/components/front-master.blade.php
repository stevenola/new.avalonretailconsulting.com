<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Avalon Retail Consulting</title>

  <!-- Bootstrap core CSS -->
<link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
{{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous"> --}}

  <!-- Custom styles for this template -->
{{-- <link href="{{asset('css/blog-post.css')}}" rel="stylesheet"> --}}
<link href="{{asset('css/style.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>

<body class="bg-light text-dark" >


  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/new.avalonretailconsulting.com/public"><h2>Avalon Retail Consulting, Inc.</h2></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
 
          <li class="nav-item">
            <a class="nav-link" href="about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="services">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="posts">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="team">Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact">Contact</a>
          </li>
@if(Auth::check())

          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.index')}}">Admin</a>
          </li>
          <li>
            <a class="nav-link" href="logoutnow">Logout</a>
          </li>
@else
          <li class="nav-item">
            <a class="nav-link" href="login">Login</a>
          </li>
@endif




        </ul>
      </div>
    </div>
  </nav>


 @yield('content')




  <!-- Bootstrap core JavaScript -->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


{{-- Get current year for copyright --}}
<script>
$('#year').text(new Date().getFullYear());
</script>

</body>

</html>
