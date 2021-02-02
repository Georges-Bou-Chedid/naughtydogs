@extends('layouts.Admin')

@section('content')
<section id="title">
  <div class="container-fluid">
    <!-- Title -->

    <div class="row">
      <div class="col-lg-6">

      <h1 class="Big-Heading">Meet new and interesting dogs nearby.</h1>

      <button type="button" class="btn btn-dark btn-lg download-button"><i class="fab fa-apple"></i> Download</button>
      <button type="button" class="btn btn-outline-light btn-lg"><i class="fab fa-google-play"></i> Download</button>
    </div>

    <div class="col-lg-6">
      <img class="title-image" src="assets/images/iphone6.png" alt="iphone-mockup">
    </div>
  </div>

</div>

  </section>


  <!-- Features -->

  <section id="features">


    <div class="row">
    <div class="feature-box col-lg-4">
        <i class="icon fas fa-check-circle fa-4x"></i>
      <h3>Easy to use.</h3>
      <p>So easy to use, even your dog could do it.</p>
    </div>

    <div class="feature-box col-lg-4">
      <i class="icon fas fa-bullseye fa-4x"></i>
    <h3>Elite Clientele</h3>
    <p>We have all the dogs, the greatest dogs.</p>
  </div>

    <div class="feature-box col-lg-4">
      <i class="icon fas fa-heart fa-4x"></i>
    <h3>Guaranteed to work.</h3>
    <p>Find the love of your dog's life or your money back.</p>
  </div>
</div>

  </section>


  <!-- Testimonials -->

  <section id="testimonials">

    <div id="testimonial-carousel" class="carousel slide" data-ride="false">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <h2 class="testimonial-text">I no longer have to sniff other dogs for love. I've found the hottest Corgi on NaughtyDogs. Woof.</h2>
      <img class="testimonial-image" src="assets/images/dog-img.jpg" alt="dog-profile">
      <em>Guy, Mansourie</em>

    </div>
    <div class="carousel-item">
      <h2 class="testimonial-text">My dog used to be so lonely, but with NaughtyDogs's help, they've found the love of their life. I think.</h2>
      <em>Tina, Roumieh</em>

    </div>
  </div>
  <a class="carousel-control-prev" href="#testimonial-carousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>

  </a>
  <a class="carousel-control-next" href="#testimonial-carousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon"></span>

  </a>
</div>



  </section>


  <!-- Press -->

  <section id="press">

  </section>


  <!-- Pricing -->

  <section id="pricing">

<h2>A Plan for Every Pet Needs</h2>
<p>Simple plans for your Pet.</p>
<a href="/CreatePlan" class="btn btn-dark btn-outline-light btn-lg">Add A Plan</a>


    <div class="row">
    @foreach ($pricing as $pricings)
<div class="pricing-column col-lg-4   col-md-6">

<div class="card">
  <div class="card-header">
  <h3>{{$pricings->title}}</h3>
  </div>
  <div class="card-body">
    <h2 class="prices">{{$pricings->img}}</h2>
    <p>{{$pricings->Description}}</p>
    <a href="/{{ $pricings->id }}/edit" class="btn btn-dark btn-outline-light">Edit</a>
    <form method="POST" action="/{{ $pricings->id }}" >
            @csrf
            @method('DELETE')
            <button class="btn btn-dark btn-outline-light" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form>
  </div>
</div>
</div>
@endforeach

</section>


  <!-- Call to Action -->

  <section id="cta">

    <h3 class="cta-heading">Find the True Love of Your Dog's Life Today.</h3>
    <button class="download-button btn btn-lg btn-dark" type="button" ><i class="fab fa-apple"></i>Download</button>
    <button class="download-button btn btn-lg btn-light" type="button"><i class="fab fa-google-play"></i>Download</button>

  </section>


  <!-- Footer -->

  <footer id="footer">
    <i class="social-icon fab fa-facebook-f"></i>
    <i class="social-icon fab fa-twitter"></i>
    <i class="social-icon fab fa-instagram"></i>
    <i class="social-icon fas fa-envelope"></i>
    <p>Mansourie and Baabdath</p>
    <p>© Copyright 2021 NaughtyDogs</p>

  </footer>


 
@endsection