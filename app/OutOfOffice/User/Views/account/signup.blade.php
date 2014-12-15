@extends('layouts.master')

@section('content')

<div class="row page-header">
    <div class="col-md-12">
        <h1>Sign Up</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        {{ Form::open(array('route' => array('user.account.store'), 'method' => 'POST', 'role' => 'form', 'files' => true, 'autocomplete' => 'off')) }}

            <div class="form-group {{ ($errors->first('email')) ? 'has-error' : '' }}">
                {{ Form::label('email', 'E-Mail Address', array('class' => 'control-label')) }}
                {{ ($errors->first('email')) ? '<p class="text-danger">' . $errors->first('email') . '</p>' : '' }}
                {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Enter email')) }}
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
                {{ Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Enter Name')) }}
            </div>

            <a href="{{ route('home.index') }}" class="btn btn-default">Cancel</a>
            {{ Form::submit('Create User', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
    <div class="col-md-4">
        <div class="well">
            <h3>Stuff Here</h3>
        </div>
    </div>
</div>




@stop