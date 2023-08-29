@extends('layouts.app')

@section('content')
<div class="container">
    <p>Uploads:</p>
    <ul>
    @forelse ($uploads as $upload )
       <li><strong>{{$upload->name}}</strong> <small>(added by {{$upload->user->name}})</small></li>
    @empty
        <li>No uploads yet!</li>
    @endforelse
    </ul>
</div>
@endsection