@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{route('tags.update', $tag->id)}}" method="POST">
            @method('PUT')
            @csrf
            <label for="name">Tag name:</label>
            <input type="text" name="name" id="name" value="{{$tag->name}}">
            <input type="submit" value="Edit tag">
          </form>
        </div>
    </div>
</div>
@endsection