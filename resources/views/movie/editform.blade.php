@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{route('movies.update', $movie->id)}}" method="POST">
            @method('PUT')
            @csrf
            <label for="name">Movie title:</label>
            <br>
            <input type="text" name="title" id="title" value="{{$movie->title}}">
            <br>
            <label for="date_of_publishing">Date of publishing:</label>
            <br>
            <input type="date" name="date_of_publishing" id="date_of_publishing" value="{{$movie->date_of_publishing}}">
            <br>
            <label for="movie_length">Movie length:</label>
            <br>
            <input type="number" name="movie_length" id="movie_length" min="1" value="{{$movie->movie_length}}">
            <br>
            <label for="grade">Movie grade:</label>
            <br>
            <input type="number" name="grade" id="grade" min="1" max="10" value="{{$movie->grade}}">
            <br>
            <label for="review">Review:</label>
            <br>
            <textarea name="review" id="review" cols="30" rows="10">{{$movie->review}}</textarea>
            <br>
            <label for="director">Director:</label>
            <br>
            <select name="director" id="director">
                @foreach ($directors as $director )
                    @if ($director->id === $movie->director_id)
                    <option value="{{$director->id}}" selected>{{$director->name}}</option>
                    @else
                    <option value="{{$director->id}}">{{$director->name}}</option>
                    @endif
                    
                @endforeach
            </select>
            <br>
            <label for="category">Category:</label>
            <br>
            <select name="category" id="category">
                @foreach ($categories as $category )
                @if ($category->id === $first_cat->id)
                <option value="{{$category->id}}" selected>{{$category->name}}</option>   
                @else
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endif
                @endforeach
            </select>
            <br>
            <input type="checkbox" id="delcats" name="delcats">
            <label for="vehicle1">Delete previous categories</label><br>
            <br>
            <input type="submit" value="Update movie">
          </form>
        </div>
    </div>
</div>
@endsection