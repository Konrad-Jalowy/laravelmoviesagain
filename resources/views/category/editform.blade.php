@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{route('categories.update', $category->id)}}" method="POST">
            @method('PUT')
            @csrf
            <label for="name">Category name:</label>
            <input type="text" name="name" id="name" value="{{$category->name}}">
            <input type="submit" value="Update category">
          </form>
        </div>
    </div>
</div>
@endsection