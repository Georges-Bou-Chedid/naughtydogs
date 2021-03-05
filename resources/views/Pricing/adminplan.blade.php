@extends('layouts.Admin')

@section('content')
<section id="pricing">


<h2>A Boutique for Every Dog's Needs</h2>


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

@endsection