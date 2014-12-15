@extends('layouts.master')

@section('content')

<div class="row page-header">
    <div class="col-md-12">
        <h1>User Listing Page</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table">

            <thead>
            <tr>
                <th></th>
                <th>Email</th>
                <th>Name</th>
                <th>Active</th>
                <th>Is Admin</th>
                <th>Created</th>
                <th>Last Updated</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>

            <tbody>
            @foreach ($users as $user)
            <tr>
                <td><a href="{{ route('user.manage.show', array('id' => $user->id)) }}"><span class="glyphicon glyphicon-chevron-right"></span></a></td>
                <td>{{{ $user->email }}}</td>
                <td><a href="{{ route('user.manage.show', array('id' => $user->id)) }}">{{{ $user->name }}}</a></td>
                <td><span class="label label-{{ $user->active ? 'success' : 'danger' }}">{{ $user->active ? 'Active' : 'De-Active' }}</span></td>
                <td><span class="label label-{{ $user->isAdmin() ? 'success' : 'default' }}">{{ $user->isAdmin() ? 'Admin' : 'User' }}</span></td>
                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>
                <td><a href="{{ route('user.manage.edit', array('id' => $user->id)) }}"><button type="button" class="btn btn-warning btn-xs">Edit</button></a></td>
                <td>
                    {{ Form::open(array('route' => array('user.manage.destroy', $user->id), 'method' => 'delete')) }}
                    <button type="submit button" class="btn btn-danger btn-xs">Delete</button>
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
            </tbody>

        </table>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        {{ $users->links() }}
    </div>
</div>

@stop