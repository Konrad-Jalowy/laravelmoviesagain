@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{route('joinRole')}}" method="POST">
            @csrf
            <label for="actor">Actor:</label>
            <select name="actor" id="actor">
                @foreach ( $actors as $actor )
                    <option value="{{$actor->id}}">{{$actor->name}}</option>
                @endforeach
            </select>
            <br>
            <label for="movie">Movie:</label>
            <select name="movie" id="movie">
                @foreach ( $movies as $movie )
                    <option value="{{$movie->id}}">{{$movie->title}}</option>
                @endforeach
            </select>
            <br>
            <input type="submit" value="Join">
          </form>
        </div>
    </div>
</div>
@endsection