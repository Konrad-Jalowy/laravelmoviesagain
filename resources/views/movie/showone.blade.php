@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{$movie->title}}</h1>
    <p>Grade: {{$movie->grade}}</p>
    <p>Length: {{$movie->length}}</p>
    <p>Review: {{$movie->review}}</p>
    <p>Date of publishing: {{$movie->date_of_publishing}}</p>
    <p>Directed by: <a href="{{route('directors.show',$movie->director->id)}}">{{$movie->director->name}}</a>
    </p>
    <p>Categories</p>
    <ul>
        @forelse ($movie->categories as $category )
            <li> <a href="{{route('categories.show', $category->id)}}">{{$category->name}}</a>
            </li>
        @empty
            <li>No categories added!</li>
        @endforelse
    </ul>
    <a href="{{route('movies.edit', $movie->id)}}">Edit Movie</a>
    <a href="{{route('movies.index')}}">All movies</a>
</div>
@endsection