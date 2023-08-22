@extends('layouts.app')

@section('content')
<div class="container">
    <h3>{{$movie->title}}</h1>
    <p>Grade: {{$movie->grade}}</p>
    <p>Length: {{$movie->length}}</p>
    <p>Review: {{$movie->review}}</p>
    <p>Date of publishing: {{$movie->date_of_publishing}}</p>
    <p>Directed by: {{$movie->director->name}}</p>
    <p>Categories</p>
    <ul>
        @forelse ($movie->categories as $category )
            <li>{{$category->name}}</li>
        @empty
            <li>No categories added!</li>
        @endforelse
    </ul>
</div>
@endsection