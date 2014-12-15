@extends('layouts.master')

@section('content')

<div class="row page-header">
    <div class="col-md-12">
        <h1>Forgot Password</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-6">

        {{ Form::open(array('action' => 'OutOfOffice\User\Controllers\RemindersController@postRemind', 'method' => 'POST', 'role' => 'form', 'autocomplete' => 'off')) }}

            <div class="form-group">
                {{ Form::label('email', 'Email', array('class' => 'control-label')) }}
                {{ Form::email('email', null, array('class' => 'form-control', 'placeholder' => 'Enter Email Address')) }}
            </div>

            {{ Form::submit('Send Reminder', array('class' => 'btn btn-primary js-show-loading-button', 'data-loading-text' => 'Loading...')) }}
        {{ Form::close() }}

    </div>
    <div class="col-md-6">

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">What Happens Next</h3>
            </div>
            <div class="panel-body">
                <ul>
                    <li>Enter your email</li>
                    <li>You will receive an email with a link to reset your password</li>
                    <li>Reset Password</li>
                </ul>
            </div>
        </div>

    </div>
</div>

@stop