@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{route('movies.store')}}" method="POST">
            @csrf
            <label for="name" class="form-label">Movie title:</label>
   
            <input type="text" name="title" id="title" placeholder="Enter title" class="form-control">
       
            <label for="date_of_publishing" class="form-label">Date of publishing:</label>

            <input type="date" name="date_of_publishing" id="date_of_publishing" class="form-control">
        
            <label for="movie_length" class="form-label">Movie length:</label>
    
            <input type="number" name="movie_length" id="movie_length" min="1" class="form-control">
     
            <label for="grade" class="form-label">Movie grade:</label>
    
            <input type="number" name="grade" id="grade" min="1" max="10" class="form-control">
      
            <label for="review" class="form-label">Review:</label>
    
            <textarea name="review" id="review" cols="30" rows="10" class="form-control"></textarea>
       
            <label for="director" class="form-label">Director:</label>
         
            <select name="director" id="director" class="form-select">
                @foreach ($directors as $director )
                    <option value="{{$director->id}}">{{$director->name}}</option>
                @endforeach
            </select>
       
            <label for="category" class="form-label">Category:</label>
     
            <select name="category" id="category" class="form-select">
                @foreach ($categories as $category )
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
       
            <input type="submit" value="Add movie" class="btn btn-primary mt-2">
          </form>
        </div>
    </div>
</div>
@endsection