@extends('layouts.admin')

@section('content')

    <h1 class="page-header">Users Dashboard!</h1>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>IsActive</th>
            <th>Created Time</th>
            <th>Updated Time</th>
        </tr>
        </thead>
        <tbody>
            @if(!$users)
                <h4>There are no Users!</h4>
            @endif
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    @if(!$user->photo)
                        <td><a href="{{route('admin.users.edit', $user->id)}}"><img height="50px" src="/images/user.png" alt="user"></a></td>
                    @else
                        <td><a href="{{route('admin.users.edit', $user->id)}}"><img height="70px" src="{{$user->photo ? $user->photo->file : ''}}" alt=""></a></td>
                    @endif
                    <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->is_active == 1 ? 'Active' : 'Non-Active'}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection