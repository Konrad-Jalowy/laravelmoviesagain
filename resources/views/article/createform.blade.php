@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{route('articles.store')}}" method="POST">
            @csrf
            <label for="title" class="form-label">Title:</label>
            <input type="text" name="title" id="title" placeholder="Enter title" class="form-control">
    
            <label for="lead" class="form-label">Lead:</label>
     
            <textarea name="lead" id="lead" cols="30" rows="10" class="form-control"></textarea>
       
            <label for="content" class="form-label">Content:</label>
      
            <textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
           
            <input type="submit" value="Add" class="btn btn-primary mt-2">
          </form>
        </div>
    </div>
</div>
@endsection