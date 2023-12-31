@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{route('tags.store')}}" method="POST">
            @csrf
            <label for="name" class="form-label">Tag name:</label>
            <input type="text" name="name" id="name" placeholder="Enter tag" class="form-control">
            <input type="submit" value="Add tag" class="btn btn-primary mt-2">
          </form>
        </div>
    </div>
</div>
@endsection