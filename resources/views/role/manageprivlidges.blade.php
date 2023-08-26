@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{route('joinRole')}}" method="POST">
            @csrf
            <label for="user" class="form-label">User:</label>
            <select name="user" id="user"  class="form-select">
                @foreach ( $users as $user )
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <br>
                @foreach ( $roles as $role )
                <div class="form-check">
  <input class="form-check-input" type="checkbox" value="{{$role->id}}" name="role" id="flexCheckDefault">
  <label class="form-check-label" for="flexCheckDefault">
    {{$role->name}}
  </label>
</div>
                @endforeach
            </select>
            <br>
            <input type="submit" value="Set roles to user" class="btn btn-primary">
          </form>
        </div>
    </div>
</div>
@endsection