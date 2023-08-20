@extends('layouts.app')

@section('content')
<div class="container">
    <p>Tag: {{$tag->name}}</p>
    <ul>
    @forelse ($tag->articles as $article )
       <li><strong>{{$article->name}}</strong></li>
    @empty
        <li>No articles yet!</li>
    @endforelse
    </ul>
</div>
@endsection