<x-front-master>


  @section('content')
  

  <section class="mt-4 mb-4" id="services-page">
    <header id="contact-top">
      <div id="contact-top-overlay"></div>
        <div class="blog-home-inner container">
          <div class="row">
            <div class="col-lg-8 d-none d-lg-block">
              <h1>Contact Us</h1>
              <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio vel provident, pariatur labore animi sequi.</p>
    
            </div>
    
          </div>
        </div>
      </div>
    
    </header>
  </section>

  <section class="mt-2" >
  
  <div class="container">
    <div class="row">
    <div class="col-lg-3"></div>
<div class="col-lg-6">
  
    <form action="registration.php" method="post" id="login_form">
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Name">
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" class="form-control form-control-lg" placeholder="Email">
      </div>
      <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" name="subject" id="subject" class="form-control form-control-lg" placeholder="Subject">
      </div>

      <div class="form-group">

        <textarea name="body" id="body" class="form-control form-control-lg" cols="50" rows="10" placeholder="Message"></textarea>
      </div>
   
      <input type="submit" name="submit" id="btn-login" value="Submit" class="btn btn-primary btn-block mb-5">
    </form>
  </div>
  <div class="col-lg-3"></div>
</div>
</div>
  @endsection
  
  </x-front-master>