@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{route('roles.update', $role->id)}}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Role name:</label>
            <input type="text" name="name" id="name" placeholder="Enter role" value="{{$role->name}}">
            <input type="submit" value="Update">
          </form>
        </div>
    </div>
</div>
@endsection