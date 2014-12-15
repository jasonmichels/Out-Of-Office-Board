@extends('layouts.master')

@section('content')

<div class="row page-header">
    <div class="col-md-12">
        <h1>Login</h1>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        @if (Session::has('login_errors'))
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Warning!</strong> Email or Password incorrect.
            </div>
        @endif

        <form role="form" class="" method="POST" action="{{ route('user.account.auth') }}" accept-charset="UTF-8">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group {{ Session::has('login_errors') ? 'has-error' : '' }}">
                <label class="control-label" for="email">Email</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="Enter Email Address" value="{{ Input::old('email') }}">
            </div>

            <div class="form-group {{ Session::has('login_errors') ? 'has-error' : '' }}">
                <label class="control-label" for="password">Password</label>
                <input name="password" type="password" class="form-control" id="password" placeholder="Password">
            </div>

            <a href="{{ route('home.index') }}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary">Login</button><br />
        </form>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Stuff Here</h3>
            </div>
            <div class="panel-body">
                <ul>
                    <li><a href="{{ action('OutOfOffice\User\Controllers\RemindersController@getRemind') }}" class=""><span class="glyphicon glyphicon-question-sign"></span> Forgot Password</a></li>
                    <li><a href="{{ route('user.account.signup') }}"><span class="glyphicon glyphicon-upload"></span> Sign Up</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>



@stop