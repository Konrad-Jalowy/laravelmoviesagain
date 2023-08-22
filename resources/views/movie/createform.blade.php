@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{route('movies.store')}}" method="POST">
            @csrf
            <label for="name">Movie title:</label>
            <br>
            <input type="text" name="title" id="title" placeholder="Enter title">
            <br>
            <label for="date_of_publishing">Date of publishing:</label>
            <br>
            <input type="date" name="date_of_publishing" id="date_of_publishing">
            <br>
            <label for="movie_length">Movie length:</label>
            <br>
            <input type="number" name="movie_length" id="movie_length" min="1">
            <br>
            <label for="grade">Movie grade:</label>
            <br>
            <input type="number" name="grade" id="grade" min="1" max="10">
            <br>
            <label for="review">Review:</label>
            <br>
            <textarea name="review" id="review" cols="30" rows="10"></textarea>
            <br>
            <label for="director">Director:</label>
            <br>
            <select name="director" id="director">
                @foreach ($directors as $director )
                    <option value="{{$director->id}}">{{$director->name}}</option>
                @endforeach
            </select>
            <br>
            <label for="category">Category:</label>
            <br>
            <select name="category" id="category">
                @foreach ($categories as $category )
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <br>
            <input type="submit" value="Add movie">
          </form>
        </div>
    </div>
</div>
@endsection