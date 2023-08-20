@extends('layouts.app')

@section('content')
<div class="container">
    <p>Articles:</p>
    <ul>
    @forelse ($articles as $article )
       <li><a href="{{route('articles.show', $article->id)}}"><strong>{{$article->title}}</strong></a></li>
    @empty
        <li>No articles yet!</li>
    @endforelse
    </ul>
</div>
@endsection