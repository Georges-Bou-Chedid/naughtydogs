@extends('layouts.Admin')

@section('content')

<div class="title" style="text-align:center;">

<div class=row>
  <h1 class="col-sm-7" style="margin-left:270px">History</h1>
  <p class="col-md-2 text-md-right"><a href="/allHistory/CreateHistory" class="btn btn-dark btn-outline-light text-md-right">Create History</a>
</div>

   <p style="margin-top:20px"> <label for="user" class="font-weight-bold">Choose a Client:</label></p>
   
   <form action="/allHistory" method="POST">
   @csrf
    <select name="username" id="username" class=" select2 form-control1">
        @foreach($users as $user)
            @if($user->id == auth()->user()->id)
            <option value="{{$user->id}}">All</option>
            @else
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endif
        @endforeach
    </select>
  
    <input type="submit" name="submit" value="Choose User">
    </form>
</div>
</div>


<div class="row">
@foreach ($histories as $history)

<div class="pricing-column col-lg-6   col-md-6">
  

@foreach ($histories1 as $history1)
    @if($history->id == $history1->id)
   <span style="color:red;">
   @endif
   @endforeach

   @foreach ($histories2 as $history2)
    @if($history->id == $history2->id)
   <span style="color:green;">
   <p style="color:green; margin-left:200px"><strong>Completed!!</strong>
   <form method="POST" action="/allHistory/{{ $history->id }}">
   @csrf
   <button class="btn btn-dark btn-outline-light" style="margin-bottom:10px; margin-left:205px">Archive</button>
  </form>
   @endif
   @endforeach

   <span style = "font-weight:bold">
  <div class="card">
  <div class="card-header">
    <table><tr>
    <td class="col-12"><h3><strong>{{$history->title}}</h3></strong></td>
  <td><a href="/allHistory/{{ $history->id }}/edit" class="btn btn-dark btn-outline-light">Edit</a></td>
  <td><form method="POST" action="/allHistory/{{ $history->id }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-dark btn-outline-light" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form></td></tr>
</table>
  </div>
  <div class="card-body">
    <p>Name: {{$history->user->name}}</p>
    <p>Description: {{$history->Description}}</p>
    <p>Due Date: {{$history->DueDate}} </p>
    <p>Time: {{$history->Time}}</p>

  </div>
</div>
</div>
</span>
</span>
</span>
    

@endforeach
@endsection