<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Avalon Retail Consulting</title>

  <!-- Bootstrap core CSS -->
<link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

<link href="{{asset('css/style.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>


  <body>

  <!-- Navigation -->

          <nav class="navbar navbar-expand-sm fixed-top navbar-light">
          <div class="container">

            {{-- <a href="#" class="navbar-brand">LoopLAB</a> --}}
            <a class="navbar-brand" href="/new.avalonretailconsulting.com/public"><img class="img-fluid"  id="navbar-logo" src="images/arc logo 072520.jpg" alt="Avalon Retail Consulting"></a>
            <button
              class="navbar-toggler"
              data-toggle="collapse"
              type="button"
              data-target="#navbarCollapse"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
              <ul class="navbar-nav sm-auto">


          {{-- <li class="nav-item">
            <a class="nav-link" href="about">About</a>
          </li> --}}
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
          <li class="nav-item">
            <a class="nav-link" href="register">Register</a>
          </li>
@endif




        </ul>
      </div>
    </div>
  </nav>


 @yield('content')


{{-- Footer --}}
<footer id="main-footer">
  <div class="container">
    <div class="row">
      <div class="col text-center py-4">
        <p>Avalon Retail Consulting, Inc.  All Rights Reserved  Copyright &copy;
          <span id="year"></span></p>
        <button id="footerbtn" class="btn" data-toggle="modal" data-target="#contactModal">Contact Us</button>
      </div>
    </div>
  </div>
</footer>


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
