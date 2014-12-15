@extends('layouts.master')

@section('content')

<div class="row page-header">
    <div class="col-md-12">
        <h1>Reset Password</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-6">

        {{ Form::open(array('action' => 'OutOfOffice\User\Controllers\RemindersController@postReset', 'method' => 'POST', 'role' => 'form', 'autocomplete' => 'off')) }}

            {{ Form::hidden('token', $token) }}
            <div class="form-group">
                {{ Form::label('email', 'Email', array('class' => 'control-label')) }}
                {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Enter Email Address')) }}
            </div>

            <div class="form-group">
                {{ Form::label('password', 'Password', array('class' => 'control-label')) }}
                <input name="password" type="password" class="form-control" id="password" placeholder="Enter Password">
            </div>
            <div class="form-group">
                {{ Form::label('password_confirmation', 'Confirm Password', array('class' => 'control-label')) }}
                <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password">
            </div>

            {{ Form::submit('Reset Password', array('class' => 'btn btn-primary js-show-loading-button', 'data-loading-text' => 'Loading...')) }}
        {{ Form::close() }}

    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Reset Password Steps</h3>
            </div>
            <div class="panel-body">
                <ul>
                    <li>Create New Password</li>
                    <li>Login</li>
                </ul>
            </div>
        </div>
    </div>
</div>



@stop