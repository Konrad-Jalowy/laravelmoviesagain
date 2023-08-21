@extends('layouts.app')

@section('content')
<div class="container">
    <p>Category: {{$category->name}}</p>
    <ul>
    @forelse ($category->movies as $movie )
       <li><strong>{{$movie->title}}</strong></li>
    @empty
        <li>No movies yet!</li>
    @endforelse
    </ul>
</div>
@endsection