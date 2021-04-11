@extends('layouts.app')

@section('content')

 <!-- Pricing -->

 <section id="pricing">

<h2>A Boutique for Every Dog's Needs</h2>


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
</div>
</div>
</div>
@endforeach

</section>

@endsection