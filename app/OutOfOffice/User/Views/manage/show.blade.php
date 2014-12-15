@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12 page-header">

        <a class="pull-left text-muted" href="{{ route('user.manage.show', array('id' => $user->id)) }}"><span class="glyphicon glyphicon-user text-muted" style="font-size: 60px;"></span></a>

        <h1>{{{ $user->name }}} <small>Profile</small></h1>

        <div class="row">
            <div class="col-md-12">
                <span class="text-muted">Joined</span> <span class="panel-title">{{ $user->created_at->toFormattedDateString() }}</span>
            </div>
        </div>

    </div>
</div>

<div class="row bottom-margin">
    <div class="col-md-12 text-center">
        <div class="btn-group">
            <a href="{{ route('user.manage.show', array('id' => $user->id)) }}" class="btn btn-primary">{{{ $user->name }}}</a>
        </div>
    </div>
</div>

@stop