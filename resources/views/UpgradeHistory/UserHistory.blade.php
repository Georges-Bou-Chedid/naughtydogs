@extends('layouts.Member')

@section('content')
<div class="title" style="text-align:center;">
  <h1>Your History:</h1>
</div>
<div class="row" style="margin-top:20px">
@foreach ($histories as $history)

<div class="pricing-column col-lg-8">
  
   <span style = "font-weight:bold">
  <div class="card">
  <div class="card-link">
    <table><tr>
    <td class="col-2"><h3><strong>{{$history->title}}</h3></strong></td>
    <td><a href="/allHistory/{{ $history->id }}/look" class="btn btn-info">Look</a></td>
    </tr>
</table>
  </div>
</div>
</span>
</span>
</span> 
</div>
@endforeach
@endsection