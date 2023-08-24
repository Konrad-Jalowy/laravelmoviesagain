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
    <p>Role: <strong>{{$role->name}}</strong></p>
    <p>Members:</p>
    <ul>
    @forelse ($role->users as $user )
        <li>{{$user->name}}</li>
    @empty
        <li>No members!</li>
    @endforelse
    </ul>
</div>
@endsection