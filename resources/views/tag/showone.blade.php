@extends('layouts.app')

@section('content')
<div class="container">
    <p>Tag: {{$tag->name}}</p>
    <a href="{{route('tags.edit', $tag->id)}}">Edit</a>
    <a href="{{route('tags.destroy', $tag->id)}}">Delete</a>
    <ul>
    @forelse ($tag->articles as $article )
       <li><strong>{{$article->title}}</strong></li>
    @empty
        <li>No articles yet!</li>
    @endforelse
    </ul>
</div>
@endsection