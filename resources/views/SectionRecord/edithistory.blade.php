@extends('layouts.Admin')

@section('content')
<div id="wrapper">
	<div id="page" class="container">

    <form method="POST" action="/allHistory/{{ $history->id }}">
    @csrf
    

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