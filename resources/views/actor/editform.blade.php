@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{route('actors.update', $actor->id)}}" method="POST">
            @csrf
            @method('PUT')
            <label for="name">Actor name:</label>
            <input type="text" name="name" id="name" value="{{$actor->name}}">
            <br>
            <label for="date_of_birth">Date of birth:</label>
            <input type="date" name="date_of_birth" id="date_of_birth" value="{{$actor->date_of_birth}}">
            <br>
            <label for="bio">Bio:</label>
            <br>
            <textarea name="bio" id="bio" cols="30" rows="10">{{$actor->bio}}</textarea>
            <br>
            <input type="submit" value="Update actor">
          </form>
        </div>
    </div>
</div>
@endsection