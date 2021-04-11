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
 
 
   <section id="testimonials">

    <div id="testimonial-carousel" class="carousel slide" data-ride="false">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <h2 class="testimonial-text">Logged In Successfully! Welcome to our website</h2>
      <p> <a class="btn btn-lg btn-dark" href="{{ route('logout') }}">Logout</a></p>
     <p> <img class="testimonial-image" style="margin-top:12px" src="assets/images/grooming.jpg" alt="dog-profile"></p>
     

    </div>
    <div class="carousel-item">
      <h2 class="testimonial-text">Naughty dogs vet clinic offers a full range of medical services.<br>Our goal is to help our patients livelong,happy
      and healthy lives. Therefore, we take pride in our dedication to the highest standard in veterinary medicine<br>
      FOR EMERGENCIES , please call 81/743986</h2>
      <p> <img class="testimonial-image" style="margin-top:12px" src="assets/images/medical wejha1.jpg" alt="dog-profile"></p>
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
  <h2>Pet Boutique</h2>
  <p>Simple and affordable price plans for your pets.</p>
  <h6>Tap on the picture below <i class="far fa-arrow-alt-circle-down"></i></h6>
  <a href="/adminplans"><div class="container containerhome">
 <img src="assets/images/boutic2.png" alt="Avatar" class="image">
  <div class="overlay">
  <div class="text"><i>Click Here!</i></div>
  </div>
</div></a>
  <p>Everything your pet needs to be pampered at all times!</p>
 
  </div>
  </section>



  <!-- Call to Action -->

  <section id="cta">

    <h3 class="cta-heading">Everything you need, Under one Woof!.</h3>

  </section>


  <!-- Footer -->
  
  <footer id="footer">
  
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
  <hr class="hr2">

 
@endsection