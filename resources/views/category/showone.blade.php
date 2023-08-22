@extends('layouts.app')

@section('content')
<div class="container">
    <p>Category: {{$category->name}}</p>
    <ul>
    @forelse ($category->movies as $movie )
       <li><a href="{{route('movies.show', $movie->id)}}"><strong>{{$movie->title}}</strong></a>
       </li>
    @empty
        <li>No movies yet!</li>
    @endforelse
    </ul>
</div>
@endsection