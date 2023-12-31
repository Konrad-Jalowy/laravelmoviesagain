@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{$article->title}}</h1>
          <form action="{{route('jointag', $article->id)}}" method="POST">
            @csrf
            <select name="tag" id="tag">
                @foreach ( $tags as $tag )
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
            <input type="submit" value="Add Tag">
          </form>
        </div>
    </div>
</div>
@endsection