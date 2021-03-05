@extends('layouts.Admin')

@section('content')
<section>

  <div class="container-fluid">
  <hr class="hr1">
    <!-- Title -->
  
    <div class="row">
      <div class="col-lg-12" style="text-align:center">


    <!--edit user -->
      <form action="/enableUser" method="POST">
   @csrf
    <select name="username" id="username" class=" select2 form-control1">
        @foreach($users as $user)
            @if($user->id == auth()->user()->id)
            <option value="{{$user->id}}">Admin</option>
            @else
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endif
        @endforeach
    </select>
  
    <input type="submit" name="submit" value="Disable/Enable Client">
    </form>

    @if(session('disabled'))
    <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  {{ session('disabled')}}
</div>
        @endif

        @if(session('enabled'))
    <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  {{ session('enabled')}}
</div>
        @endif



        <form action="/DeleteUser" method="POST">
   @csrf
    <select name="username1" id="username1" class=" select2 form-control1">
        @foreach($users as $user)
            @if($user->id == auth()->user()->id)
            <option value="{{$user->id}}">Admin</option>
            @else
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endif
        @endforeach
    </select>
  
    <input type="submit" name="submit"  onclick="return confirm('Are you sure?')" value="Delete Client">
    </form>

    @if(session('delete'))
    <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  {{ session('delete')}}
</div>
        @endif


    
        <form action="/editUser" method="GET">
   @csrf
    <select name="username2" id="username2" class=" select2 form-control1">
        @foreach($users as $user)
            @if($user->id == auth()->user()->id)
            <option value="{{$user->id}}">Admin</option>
            @else
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endif
        @endforeach
    </select>
  
    <input type="submit" name="submit"  value="Edit Client">
    </form>

    @if(session('edit'))
    <div class="alert">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  {{ session('edit')}}
</div>
        @endif



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
       <h2 class="testimonial-text">Log In Successfully! Welcome to our site.
       </h2>
      <p> <img class="testimonial-image" src="assets/images/dog-img.jpg" alt="dog-profile"></p>
      
 
     </div>
     <div class="carousel-item">
       <h2 class="testimonial-text">This is the Plans u can get!</h2>
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
   <div class="row">
       <div class="col-lg-12">
   <h3>Pet Boutique</h3>
   <img class="testimonial-image" src="assets/images/boutic2.png" alt="dog-profile">
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
    <h2 class="prices"><img src = "assets/images/{{$pricings->img}}" class="img-responsive"></h2>
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