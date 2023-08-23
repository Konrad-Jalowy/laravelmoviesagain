@extends('layouts.app')

@section('content')
<div class="container">
    <p>Articles:</p>
    <ul>
    @forelse ($articles as $article )
       <li><a href="{{route('articles.show', $article->id)}}"><strong>{{$article->title}}</strong></a></li>
    @empty
            @if(request()->get('filter') == null)
            <li>No articles yet!</li>
            @else
                @switch(request()->get('filter'))
                    @case('noanswer')
                    <li>Currently no unanswered articles!</li>
                        @break
                    @case('today')
                    <li>No articles added today!</li>
                        @break
                    @default
                    <li>No articles yet!</li>    
                @endswitch
            @endif
            
    @endforelse
    </ul>
</div>
@endsection