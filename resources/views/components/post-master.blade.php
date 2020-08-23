

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

    
      <a class="navbar-brand" href="{{url('/')}}"><img class="img-fluid"  id="navbar-logo" src="{{asset('images/arc logo 072520.jpg')}}" alt="Avalon Retail Consulting"></a>
  

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
   
        
            <li class="nav-item">
            
              <a class="nav-link" href="{{url('services')}}">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('posts')}}">Blog</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('team')}}">Team</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('contact')}}">Contact</a>
            </li>
  @if(Auth::check())
  
            <li class="nav-item">
              <a class="nav-link" href="{{route('admin.index')}}">Admin</a>
            </li>
            <li>
              <a class="nav-link" href="{{url('logoutnow')}}">Logout</a>
            </li>
  @else
            <li class="nav-item">
              <a class="nav-link" href="{{url('login')}}">Login</a>
            </li>
  @endif
  
  
  
  
          </ul>
        </div>
      </div>
    </nav>

  {{-- Banner     --}}
  <section class="mt-4" id="blog-page">
    <header id="blog-top">
      <div id="blog-top-overlay">
      {{-- <div class="dark-overlay"> --}}
        <div class="blog-home-inner container">
          <div class="row">
            <div class="col-lg-12 d-none d-lg-block">
              <h1>Our Blog</h1>
           
    
            </div>
    
          </div>
        </div>
      {{-- </div> --}}
    </div>
    </header>
  </section>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">

 @yield('content')

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Web Design</a>
                  </li>
                  <li>
                    <a href="#">HTML</a>
                  </li>
                  <li>
                    <a href="#">Freebies</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">JavaScript</a>
                  </li>
                  <li>
                    <a href="#">CSS</a>
                  </li>
                  <li>
                    <a href="#">Tutorials</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
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

</body>

</html>
