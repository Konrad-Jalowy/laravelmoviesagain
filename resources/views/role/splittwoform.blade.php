@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{route('splitRole')}}" method="POST">
            @csrf
            <label for="user" class="form-label">User:</label>
            <select name="user" id="user" class="form-select">
                @foreach ( $users as $user )
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>

            <label for="role" class="form-label">Role:</label>
            <select name="role" id="role" class="form-select">
                @foreach ( $roles as $role )
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
     
            <input type="submit" value="Take away membership" class="btn btn-primary mt-2">
          </form>
        </div>
    </div>
</div>
@endsection