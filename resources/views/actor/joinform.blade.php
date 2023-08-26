@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{route('joinMovie')}}" method="POST">
            @csrf
            <label for="actor" class="form-label">Actor:</label>
            <select name="actor" id="actor" class="form-select">
                @foreach ( $actors as $actor )
                    <option value="{{$actor->id}}">{{$actor->name}}</option>
                @endforeach
            </select>
         
            <label for="movie" class="form-label">Movie:</label>
            <select name="movie" id="movie" class="form-select">
                @foreach ( $movies as $movie )
                    <option value="{{$movie->id}}">{{$movie->title}}</option>
                @endforeach
            </select>
          
            <input type="submit" value="Join" class="btn btn-primary mt-2">
          </form>
        </div>
    </div>
</div>
@endsection