@extends('layouts.Admin')

@section('content')
<div id="wrapper">
	<div id="page" class="container">
    <h1 class="heading has-text-weight-bold is-size-6">Update Plan</h1>

    <form method="POST" enctype = "multipart/form-data" action="/{{ $pricing->id }}">
    @csrf
    @method('PUT')  
    <div class="field">
            <label for="title">Title</label>

            <div class="control">
                <input class="form-control @error('title') is-invalid @enderror"  
                    type="text"
                    name="title" 
                    value="{{$pricing->title}}"
                    ></input>
                @error('title')
                <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                </span>
                @enderror
                
            </div>
        </div>
        <br>
        <br>

        <div class="field">

            <div class="form-group">
                <table class="table">
                    <tr>
                        <td><label class="font-weight-bold">Select Image for Upload</label></td>
                        <td><input class="@error('file') is-invalid @enderror" type = "file" name="file"></td>

                        @error('file')
                      <span class="invalid-feedback" role="alert">
                         <strong>{{ $message }}</strong>
                        </span>
                        @enderror 

                    </tr>
                    <tr>
                        <td></td>
                        <td><span class="text-muted">jpeg, jpg, png, gif</span></td>
                        <td></td> 
                </table>
                </div>
            </div>

        <div class="field">
            <label class="label" for="Description">Description</label>

            <div class="control">
                <textarea class="textarea form-control @error('Description') is-invalid @enderror"
                    name="Description" 
                    id="Description"
                    >{{$pricing->Description}}</textarea>
               
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