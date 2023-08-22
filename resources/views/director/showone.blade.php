@extends('layouts.app')

@section('content')
<div class="container">
    <p>Name: {{$director->name}} <small>{{$director->date_of_birth}}</small></p>
    <p>Bio: {{$director->bio}}</p>
    <ul>
    @forelse ($director->movies as $movie )
       <li><a href="{{route('movies.show', $movie->id)}}"><strong>{{$movie->title}}</strong></a>
        </li>
    @empty
        <li>No movies yet!</li>
    @endforelse
    </ul>
</div>
@endsection