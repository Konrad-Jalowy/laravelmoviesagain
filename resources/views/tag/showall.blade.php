@extends('layouts.app')

@section('content')
<div class="container">
    <p>Tags:</p>
    <ul>
    @forelse ($tags as $tag )
       <li><a href="{{route('tags.show', $tag->id)}}"><strong>{{$tag->name}}</strong></a> <small>Number of articles: {{$tag->articles_count}}</small></li>
    @empty
        <li>No tags yet!</li>
    @endforelse
    </ul>
</div>
@endsection