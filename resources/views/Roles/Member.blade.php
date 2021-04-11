@extends('layouts.Member')

@section('content')
<section>

  <div class="container-fluid">
  <hr class="hr1">
    <!-- Title -->
  
    <div class="row">
      <div class="col-lg-12" style="text-align:center">

      <img class="title-image" src="assets/images/Logo.png" alt="iphone-mockup">
     
    </div>

    <div class="col-lg-12" style="text-align:center">
    <img class="title-image2" src="assets/images/naughty dogs.png" alt="iphone-mockup">
    </div>
  </div>
  <hr class="hr1">
</div>


  </section>


  <!-- Testimonials -->

  <section id="testimonials">

    <div id="testimonial-carousel" class="carousel slide" data-ride="false">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <h2 class="testimonial-text" style="font-family: 'Akaya Telivigala', cursive;">Logged in successfully!!<br> Welcome to your pet profile.</h2>
      <p> <a class="btn btn-lg btn-dark" style="margin-top:12px" href="{{ route('logout') }}">Logout</a></p>
     <p> <img class="testimonial-image" style="margin-top:12px" src="assets/images/sick_dog.jpg" alt="dog-profile"></p>
     

    </div>
    <div class="carousel-item">
      <h2 class="testimonial-text" style="font-family: 'Akaya Telivigala', cursive;">Naughty dogs vet clinic offers a full range of medical services.<br>Our goal is to help our patients livelong,happy
      and healthy lives. Therefore, we take pride in our dedication to the highest standard in veterinary medicine.<br></h2>
    <p> <img class="testimonial-image" style="margin-top:12px" src="assets/images/medical wejha1.jpg" alt="dog-profile"></p>
    </div>
 

  <div class="carousel-item">
      <h2 class="testimonial-text" style="font-family: 'Akaya Telivigala', cursive;">GROOMING<br>Where Your Pets Get The Red Carpet Treatment.</h2>
    <p> <img class="testimonial-image" style="margin-top:12px" src="assets/images/grooming1.jpg" alt="dog-profile"></p>
    <h2 class="testimonial-text" style="font-family: 'Akaya Telivigala', cursive;">Lap Dogs To Big Dogs, We Groom Them All!!!</h2>
    
    </div>
  </div>

  <a class="carousel-control-prev" href="#testimonial-carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>

  </a>
  <a class="carousel-control-next" href="#testimonial-carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon"></span>

  </a>
  <hr class="hr1">
</div>



  </section>


  <!-- Press -->

  <section id="press">
  <div class="row">
      <div class="col-lg-12" style="text-align:center; margin-top:100px">
  <h1 style="font-family: 'Akaya Telivigala', cursive; font-size:3.5rem">Pet Boutique</h1>
  <p style="font-size:1.2rem">Simple and affordable price plans for your pets.</p>
  <h6>Tap on the picture below <i class="far fa-arrow-alt-circle-down"></i></h6>
  <a href="/plans"><div class="container containerhome">
 <img src="assets/images/boutic2.png" alt="Avatar" class="image">
  <div class="overlay">
  <div class="text"><i><strong>Click Here!</strong></i></div>
  </div>
</div></a>
  <p style="font-size:1.2rem">Everything your pet needs to be pampered at all times!</p>
 
  </div>
  </section>


  <!-- Footer -->
  
  <footer id="footer">
  
  <h3 class="cta-heading" style="font-family: 'Akaya Telivigala', cursive;">Everything you need, Under one Woof!!</h3>
    <i class="social-icon fab fa-facebook-f"></i>
    <i class="social-icon fab fa-instagram"></i>
    <i class="social-icon fas fa-envelope"></i>
    <p><i class="fas fa-map-marker-alt" style="color:black"></i>    Mansourie Branch, Old Road<br>
                                                                              Baabdath Branch, Street 11</p>
    <p><i class="fas fa-mobile-alt" style="color:black"></i>   +961 81 743 986 -
                                                               +961 71 383 107</p>
    <p><i class="fab fa-whatsapp" style="color:black"></i> +961 81 743 986</p><br>
    <p><strong>©</strong> Copyright {{ date('Y') }} NaughtyDogs</p>
  </footer>

 
@endsection