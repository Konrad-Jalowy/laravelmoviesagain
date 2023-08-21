@extends('layouts.app')

@section('content')
<div class="container">
    <p>Name: {{$director->name}} <small>{{$director->date_of_birth}}</small></p>
    <p>Bio: {{$director->bio}}</p>
    <ul>
    @forelse ($director->movies as $movie )
       <li><strong>{{$movie->title}}</strong></li>
    @empty
        <li>No movies yet!</li>
    @endforelse
    </ul>
</div>
@endsection