@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{route('directors.store')}}" method="POST">
            @csrf
            <label for="name">Director name:</label>
            <input type="text" name="name" id="name" placeholder="Enter name">
            <br>
            <label for="date_of_birth">Date of birth:</label>
            <input type="date" name="date_of_birth" id="date_of_birth">
            <br>
            <label for="bio">Bio:</label>
            <br>
            <textarea name="bio" id="bio" cols="30" rows="10"></textarea>
            <br>
            <input type="submit" value="Add director">
          </form>
        </div>
    </div>
</div>
@endsection