@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{route('splitRole')}}" method="POST">
            @csrf
            <label for="user">User:</label>
            <select name="user" id="user">
                @foreach ( $users as $user )
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <br>
            <label for="role">Role:</label>
            <select name="role" id="role">
                @foreach ( $roles as $role )
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
            </select>
            <br>
            <input type="submit" value="Take away membership">
          </form>
        </div>
    </div>
</div>
@endsection