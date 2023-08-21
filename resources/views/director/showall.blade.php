@extends('layouts.app')

@section('content')
<div class="container">
    <p>Directors:</p>
    <ul>
    @forelse ($directors as $director )
       <li><strong>{{$director->name}}</strong> <small>Number of movies: {{$director->movies_count}}</small></li>
    @empty
        <li>No directors yet!</li>
    @endforelse
    </ul>
</div>
@endsection