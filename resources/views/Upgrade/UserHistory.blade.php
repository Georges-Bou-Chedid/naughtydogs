@extends('layouts.Member')

@section('content')
<div class="title" style="text-align:center;">
  <h1>History</h1>
</div>
<div class="row">
    @foreach ($histories as $history)
<div class="pricing-column col-lg-6   col-md-6">

<div class="card">
  <div class="card-header">
 <h3>{{$history->title}}</h3>
  </div>
  <div class="card-body">
    <p>Description: {{$history->Description}}</p>
    <p>Due Date: {{$history->DueDate}}</p>
    
  </div>
</div>
</div>
@endforeach
@endsection