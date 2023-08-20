@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <form action="{{route('roles.update', $role->id)}}" method="POST">
            @csrf
            <p>Role: {{$role->name}}</p>
            <select name="user" id="user">
                @foreach ( $users as $user )
                    <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <input type="submit" value="Add Role">
          </form>
        </div>
    </div>
</div>
@endsection