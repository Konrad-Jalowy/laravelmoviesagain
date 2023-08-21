@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{route('categories.store')}}" method="POST">
            @csrf
            <label for="name">Category name:</label>
            <input type="text" name="name" id="name" placeholder="Enter tag">
            <input type="submit" value="Add category">
          </form>
        </div>
    </div>
</div>
@endsection