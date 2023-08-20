@extends('layouts.app')

@section('content')
<div class="container">
    <p>Articles:</p>
    <ul>
    @forelse ($articles as $article )
       <li><strong>{{$article->title}}</strong></li>
    @empty
        <li>No articles yet!</li>
    @endforelse
    </ul>
</div>
@endsection