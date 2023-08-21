@extends('layouts.app')

@section('content')
<div class="container">
    <p>Categories:</p>
    <ul>
    @forelse ($categories as $category )
       <li><strong>{{$category->name}}</strong> <small>Number of movies: {{$category->movies_count}}</small></li>
    @empty
        <li>No categories yet!</li>
    @endforelse
    </ul>
</div>
@endsection