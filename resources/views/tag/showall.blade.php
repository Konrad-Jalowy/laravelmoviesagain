@extends('layouts.app')

@section('content')
<div class="container">
    <p>Tags:</p>
    <ul>
    @forelse ($tags as $tag )
       <li><strong>{{$tag->name}}</strong></li>
    @empty
        <li>No tags yet!</li>
    @endforelse
    </ul>
</div>
@endsection