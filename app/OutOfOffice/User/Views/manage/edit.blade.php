@extends('layouts.master')

@section('content')

<div class="row page-header">
    <div class="col-md-12">
        <h1>{{ $user->name }} <small>Edit</small></h1>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        {{ Form::model($user, array('route' => array('user.manage.update', $user->id), 'method' => 'put', 'role' => 'form', 'autocomplete' => 'off')) }}

            {{ Form::hidden('id') }}

            <div class="form-group {{ ($errors->first('email')) ? 'has-error' : '' }}">
                {{ Form::label('email', 'E-Mail Address', array('class' => 'control-label')) }}
                {{ ($errors->first('email')) ? '<p class="text-danger">' . $errors->first('email') . '</p>' : '' }}
                {{ Form::email('email', $user->email, array('class' => 'form-control', 'placeholder' => 'Enter email')) }}
            </div>

            <div class="form-group {{ ($errors->first('password')) ? 'has-error' : '' }}">
                {{ Form::label('password', 'Password', array('class' => 'control-label')) }}
                {{ ($errors->first('password')) ? '<p class="text-danger">' . $errors->first('password') . '</p>' : '' }}
                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
            </div>
            <div class="form-group {{ ($errors->first('password_confirmation')) ? 'has-error' : '' }}">
                {{ Form::label('password_confirmation', 'Confirm Password', array('class' => 'control-label')) }}
                {{ ($errors->first('password_confirmation')) ? '<p class="text-danger">' . $errors->first('password_confirmation') . '</p>' : '' }}
                <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password">
            </div>

            <div class="form-group {{ ($errors->first('name')) ? 'has-error' : '' }}">
                {{ Form::label('name', 'Name', array('class' => 'control-label')) }}
                {{ ($errors->first('name')) ? '<p class="text-danger">' . $errors->first('name') . '</p>' : '' }}
                {{ Form::text('name', $user->name, array('class' => 'form-control', 'placeholder' => 'Enter Name')) }}
            </div>

            @if (Auth::user()->isAdmin())
            <div class="checkbox">
                {{ Form::label('is_admin', 'Is Admin') }}
                {{ Form::checkbox('is_admin', 'is_admin') }}
            </div>

            <div class="checkbox">
                {{ Form::label('active', 'Is Active') }}
                {{ Form::checkbox('active', 'active') }}
            </div>
            @endif

            <a href="{{ route('user.manage.show', array('id' => $user->id)) }}" class="btn btn-default">Cancel</a>
            {{ Form::submit('Update User', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
    <div class="col-md-6"></div>
</div>


@stop