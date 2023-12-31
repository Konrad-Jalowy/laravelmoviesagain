@extends('layouts.app')

@section('content')
<div class="container">
    <p>Title: {{$article->title}}</p>
    <p>Author: {{$article->user->name}}</p>
    <p>Lead: {{$article->lead}}</p>
    <p>Content: {{$article->content}}</p>
    <a href="{{route('articles.edit', $article->id)}}">Edit</a>
    <a href="{{route('articles.destroy', $article->id)}}">Delete</a>
    <a href="{{route('answercreate', $article->id)}}">Add answer</a>
    @if ($article->tags()->exists())
    <div>
        <p>Tags: @foreach ($article->tags as $tag ) <a href="{{route('tags.show', $tag->id)}}" class="badge rounded-pill bg-primary">#{{$tag->name}}</a>  @endforeach
            
        </p>
    </div>
    @endif
    <p>Views: {{$article->viewsCount}}</p>
    
    
   
    
    <p>Answers:</p>
    <ul>
        @forelse ($article->answers as $answer )
            <li>{{$answer->content}} <small>{{$answer->user->name}}</small></li>
        @empty
            <li>No answers yet!</li>
        @endforelse
    </ul>
</div>
@endsection