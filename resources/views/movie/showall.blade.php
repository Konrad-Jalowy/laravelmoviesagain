@extends('layouts.app')

@section('content')
<div class="container">
    <p>Directors:</p>
    <ul>
    @forelse ($movies as $movie )
       <li><strong>{{$movie->title}}</strong></li>
    @empty
        <li>No movies yet!</li>
    @endforelse
    </ul>
</div>
@endsection