@extends('layouts.app')

@section('content')
<div class="container">
    <p>Actors:</p>
    <ul>
    @forelse ($actors as $actor )
       <li><a href="{{route('actors.show', $actor->id)}}"><strong>{{$actor->name}}</strong></a> <small>Number of movies: {{$actor->movies_count}}</small></li>
    @empty
        <li>No actors yet!</li>
    @endforelse
    </ul>
    <p>Articles:</p>
    <ul>
    @forelse ($articles as $article )
       <li><a href="{{route('articles.show', $article->id)}}"><strong>{{$article->title}}</strong></a></li>
    @empty
           
    <li>No articles found!</li>

    @endforelse
    </ul>
    <p>Directors found:</p>
    <ul>
    @forelse ($directors as $director )
       <li><strong>{{$director->name}}</strong> <small>Number of movies: {{$director->movies_count}}</small></li>
    @empty
        <li>No directors found!</li>
    @endforelse
    </ul>
    <p>Movies:</p>
    <ul>
    @forelse ($movies as $movie )
       <li>
       <a href="{{route('movies.show', $movie->id)}}"><strong>{{$movie->title}}</strong></a> 
       </li>
    @empty
        <li>No movies yet!</li>
    @endforelse
    </ul>
</div>
@endsection