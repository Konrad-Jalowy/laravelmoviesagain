@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{route('uploads.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="name" class="form-label">File name:</label>
            <input type="text" name="name" id="name" placeholder="Enter name" class="form-control">
          
            <div>
                <label for="upload" class="form-label">Choose file to upload:</label>
                <input type="file" id="file" name="upload" class="form-control" />
  </div>

            <input type="submit" value="Add file" class="btn btn-primary mt-2">
          </form>
        </div>
    </div>
</div>
@endsection