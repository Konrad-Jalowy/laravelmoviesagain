@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <a href="{{route('roles.create')}}" class="btn btn-primary">Add Role</a>
          <button class="btn btn-primary">Add user to role</button>
          <button class="btn btn-primary">Remove role</button>
          <button class="btn btn-primary">Remove user from role</button>
        </div>
    </div>
    <ul>
    @forelse ($roles as $role )
        <li><strong>{{$role->name}}</strong> <small>Number of users: {{$role->users_count}}</small> <a href="{{route('roles.edit', $role->id)}}">Edit</a> <form action="{{route('roles.destroy', $role->id)}}" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Delete">
        </form></li>
    @empty
        <li>No roles yet!</li>
    @endforelse
    </ul>
</div>
@endsection