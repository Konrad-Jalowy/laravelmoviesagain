@extends('layouts.app')

@section('content')
<div class="container">
    <p>Name: {{$actor->name}} <small>{{$actor->date_of_birth}}</small></p>
    <p>Bio: {{$actor->bio}}</p>
    <ul>
    @forelse ($actor->movies as $movie )
       <li><a href="{{route('movies.show', $movie->id)}}"><strong>{{$movie->title}}</strong></a>
        </li>
    @empty
        <li>No movies yet!</li>
    @endforelse
    </ul>
</div>
@endsection