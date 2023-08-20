@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{route('roles.store')}}" method="POST">
            @csrf
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" placeholder="Enter title">
            <br>
            <label for="lead">Lead:</label>
            <br>
            <textarea name="lead" id="lead" cols="30" rows="10"></textarea>
            <br>
            <label for="content">Content:</label>
            <br>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
            <br>
            <input type="submit" value="Add">
          </form>
        </div>
    </div>
</div>
@endsection