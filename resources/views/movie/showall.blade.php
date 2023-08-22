@extends('layouts.app')

@section('content')
<div class="container">
    <p>Movies:</p>
    <ul>
    @forelse ($movies as $movie )
       <li>
       <a href="{{route('movies.show', $movie->id)}}"><strong>{{$movie->title}}</strong></a> 
       </li>
    @empty
        <li>No movies yet!</li>
    @endforelse
    </ul>
</div>
@endsection