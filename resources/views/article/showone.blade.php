@extends('layouts.app')

@section('content')
<div class="container">
    <p>Title: {{$article->title}}</p>
    <p>Author: {{$article->user->name}}</p>
    <p>Lead: {{$article->lead}}</p>
    <p>Content: {{$article->content}}</p>
</div>
@endsection