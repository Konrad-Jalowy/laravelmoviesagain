@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{route('joinuser', $role->id)}}" method="POST">
            @csrf
            <label for="user" class="form-label">Role: {{$role->name}}</label>
            <select name="user" id="user" class="form-select">
                @foreach ( $users as $user )
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <input type="submit" value="Add Role" class="btn btn-primary mt-2">
          </form>
        </div>
    </div>
</div>
@endsection