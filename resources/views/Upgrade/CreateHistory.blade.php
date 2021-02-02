@extends('layouts.Admin')

@section('content')
<div id="wrapper">
	<div id="page" class="container">
    <h1 class="heading has-text-weight-bold is-size-6">New History</h1>

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
            <label class="label" for="Description">Description</label>

            <div class="control">
                <textarea class="textarea form-control @error('Description') is-invalid @enderror"
                    name="Description" 
                    id="Description"
                    ></textarea>
                @error('Description')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                </span>
                @enderror
               
            </div>
        </div>

        <div class="field">
            <label for="DueDate">Due Date</label>

            <div class="control">
                <input class="form-control @error('DueDate') is-invalid @enderror"  
                    type="text"
                    name="DueDate" 
                    id="DueDate"
                    ></input>
                @error('DueDate')
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
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
         </select>
        </div>
        </div>
        <br>

        <div class="field is-grouped">
            <div class="control">
            <button class="btn btn-primary" type="submit">Submit</button>
            <a href="javascript:history.back()" class="btn btn-primary">Back</a>
            </div>
            
            
        </div>
    </form>

    </div>
</div>
@endsection