@extends('layouts.Admin')

@section('content')
<div id="wrapper">
	<div id="page" class="container">
    <h1 class="heading has-text-weight-bold is-size-6">New Record</h1>

    <form method="POST" action="/allHistoryNew">
    @csrf
    <div class="field">
            <label for="title">Title</label>

            <div class="control">
                <input class="form-control @error('title') is-invalid @enderror"  
                    type="text"
                    name="title" 
                    ></input>
                @error('title')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                </span>
                @enderror
                
            </div>
        </div>

        <div class="field">
            <label for="User">User</label>

            <div class="control">
        <select name="createuser" id="createuser" class="select2 form-control1">
        @foreach($users as $user)
            @if($user->id == auth()->user()->id)
            @else
            <option value="{{$user->id}}">{{$user->name}}</option>
            @endif
        @endforeach
         </select>
        </div>
        </div>
        <br>

        <div class="field is-grouped">
            <div class="control">
            <button class="btn btn-primary" type="submit">Submit</button>
            <a href="javascript:history.back()" class="btn btn-danger">Back</a>
            </div>
            
            
        </div>
    </form>

    </div>
</div>
@endsection