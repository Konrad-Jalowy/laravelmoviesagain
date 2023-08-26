@extends('layouts.app')

@section('content')
<div class="container">
    <p>Actors:</p>
    <ul>
    @forelse ($actors as $actor )
       <li><strong>{{$actor->name}}</strong> <small>Number of movies: {{$actor->movies_count}}</small></li>
    @empty
        <li>No actors yet!</li>
    @endforelse
    </ul>
</div>
@endsection