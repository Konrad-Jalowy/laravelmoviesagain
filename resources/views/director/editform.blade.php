@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{route('directors.update', $director->id)}}" method="POST">
            @method('PUT')
            @csrf
            <label for="name">Director name:</label>
            <input type="text" name="name" id="name" value="{{$director->name}}">
            <br>
            <label for="date_of_birth">Date of birth:</label>
            <input type="date" name="date_of_birth" id="date_of_birth" value="{{$director->date_of_birth}}">
            <br>
            <label for="bio">Bio:</label>
            <br>
            <textarea name="bio" id="bio" cols="30" rows="10">{{$director->bio}}</textarea>
            <br>
            <input type="submit" value="Update director">
          </form>
        </div>
    </div>
</div>
@endsection