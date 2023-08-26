@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{route('actors.store')}}" method="POST">
            @csrf
            <label for="name" class="form-label">Actor name:</label>
            <input type="text" name="name" id="name" placeholder="Enter name" class="form-control">
          
            <label for="date_of_birth" class="form-label">Date of birth:</label>
            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control">
      
            <label for="bio" class="form-label">Bio:</label>
            <textarea name="bio" id="bio" cols="30" rows="10" class="form-control"></textarea>

            <input type="submit" value="Add director" class="btn btn-primary mt-2">
          </form>
        </div>
    </div>
</div>
@endsection