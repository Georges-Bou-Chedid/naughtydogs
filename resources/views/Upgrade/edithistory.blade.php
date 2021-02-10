@extends('layouts.Admin')

@section('content')
<div id="wrapper">
	<div id="page" class="container">
    <h1 class="heading has-text-weight-bold is-size-6">Update History</h1>

    <form method="POST" action="/allHistory/{{ $history->id }}">
    @csrf
    @method('PUT')  
    <div class="field">
            <label for="title">Title</label>

            <div class="control">
                <input class="form-control @error('title') is-invalid @enderror"  
                    type="text"
                    name="title" 
                    value="{{ $history->title }}"
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
                    >{{ $history->Description }}</textarea>
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
            <input class="form-control @error('DueDate') is-invalid @enderror" type="date" name="DueDate">
            @error('DueDate')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="field">
            <label for="Time">Time</label>

            <div class="control">
                <input class="form-control"  
                    type="text"
                    name="Time" 
                    ></input>  
            </div>
        </div>

        <div class="field">
            <label for="User">User</label>

            <div class="control">
        <select name="createuser" id="createuser" class="select2 form-control1">
            <option value="{{ $history->user->id }}">{{$history->user->name}}</option>
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