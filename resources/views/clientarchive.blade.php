@extends('layouts.Admin')

@section('content')

<div class="title" style="text-align:center;">

<div class=row>
  <h1 class="col-sm-7" style="margin-left:270px">Archive</h1>
</div>

   <p style="margin-top:20px"> <label for="user" class="font-weight-bold">Choose a Client:</label></p>
   
   <form action="/archive" method="POST">
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

@foreach ($archives as $archive)
<div class="pricing-column col-lg-6   col-md-6">
   <span style = "font-weight:bold; color:green">
   <strong>Completed</strong>

  <div class="card">
  <div class="card-header">
    <table><tr>
    <td class="col-12"><h3><strong>{{$archive->title}}</h3></strong></td>
  <td><form method="POST" action="/archive/{{ $archive->id }}">
            @csrf
            @method('DELETE')
            <button class="btn btn-dark btn-outline-light" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
            </form></td></tr>
</table>
  </div>
  <div class="card-body">
    <p>Name: {{$archive->user->name}}</p>
    <p>Description: {{$archive->Description}}</p>
    <p>Due Date: {{$archive->DueDate}} </p>
    <p>Time: {{$archive->Time}}</p>

  </div>
</div>
</div>
</span>
@endforeach
    

@endsection