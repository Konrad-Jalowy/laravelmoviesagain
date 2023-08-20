@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{route('roles.store')}}" method="POST">
            @csrf
            <label for="name">Role name:</label>
            <input type="text" name="name" id="name" placeholder="Enter role">
            <input type="submit" value="Add">
          </form>
        </div>
    </div>
</div>
@endsection