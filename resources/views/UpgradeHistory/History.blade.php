@extends('layouts.Admin')

@section('content')

<div class="title" style="text-align:center;">

<div class=row>
  <h1 class="col-sm-7" style="margin-left:270px">Records</h1>
  <p class="col-md-2 text-md-right"><a href="/allHistory/CreateHistory" class="btn btn-dark btn-outline-light text-md-right">Create Record</a>
</div>

   <p style="margin-top:20px"> <label for="user" class="font-weight-bold">Choose a Client:</label></p>
   
   <form action="/allHistory" method="POST">
   @csrf
    <select name="username" id="username" class=" select2 form-control1">
        @foreach($users as $user)
        @foreach($users1 as $user1)
           @if($user->id == auth()->user()->id)
            <option value="{{$user->id}}" @if($user1->id == $user->id) selected @endif>All</option>
           @else
            <option value="{{$user->id}}" @if($user1->id == $user->id) selected @endif>{{$user->name}}</option>
           @endif
        @endforeach
        @endforeach
    </select>
  
    <input type="submit" name="submit" value="Choose User">
    </form>
</div>
</div>

<div class="row">
@foreach ($histories as $history)

<div class="pricing-column col-lg-8">
  

@foreach ($histories1 as $history1)
    @if($history->id == $history1->id)
   <span style="color:red">
   @endif
   @endforeach

   @foreach ($histories2 as $history2)
    @if($history->id == $history2->id)
   <spam style="color:black">
   @endif
   @endforeach

   <span style = "font-weight:bold">
  <div class="card">
  <div class="card-link">
    <table><tr>
    <td class="col-6"><h3><strong>{{$history->title}} / {{$history->user->name}}</h3></strong></td>
    <td><a href="/allHistory/{{ $history->id }}/edit" class="btn btn-info">Change</a></td>
 
  <td><form method="POST" action="/allHistory/{{ $history->id }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-outline-light" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form></td></tr>
</table>
  </div>
</div>
</span>
</span>
</span> 
</div>
@endforeach
@endsection
