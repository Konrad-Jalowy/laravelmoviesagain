@extends('layouts.app')

@section('content')
<div class="container">
    <p>Title: {{$article->title}}</p>
    <p>Author: {{$article->user->name}}</p>
    <p>Lead: {{$article->lead}}</p>
    <p>Content: {{$article->content}}</p>
    <a href="{{route('articles.edit', $article->id)}}">Edit</a>
    <a href="{{route('articles.destroy', $article->id)}}">Delete</a>
    <form action="{{route('answerstore', $article->id)}}" method="POST">
        @csrf
        <label for="content">Your answer:</label><br>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" value="Add answer">
    </form>
</div>
@endsection