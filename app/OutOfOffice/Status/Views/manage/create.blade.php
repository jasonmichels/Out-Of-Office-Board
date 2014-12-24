@extends('layouts.master')

@section('content')

<div class="row page-header">
    <div class="col-md-12">
        <h1>Create New Status</h1>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        {{ Form::open(array('route' => array('status.manage.store'), 'method' => 'POST', 'role' => 'form')) }}

        <div class="form-group {{ ($errors->first('type')) ? 'has-error' : '' }}">
            {{ Form::label('type', 'Status Type', array('class' => 'control-label')) }}
            {{ ($errors->first('type')) ? '<p class="text-danger">' . $errors->first('type') . '</p>' : '' }}
            {{ Form::text('type', null, array('class' => 'form-control', 'placeholder' => 'Enter Status Type')) }}
        </div>

        <div class="form-group {{ ($errors->first('start_date')) ? 'has-error' : '' }}">
            {{ Form::label('start_date', 'Start Date', array('class' => 'control-label')) }}
            {{ ($errors->first('start_date')) ? '<p class="text-danger">' . $errors->first('start_date') . '</p>' : '' }}
            {{ Form::text('start_date', null, array('class' => 'form-control datepicker_status', 'placeholder' => 'Enter Start Date')) }}
        </div>

        <div class="form-group {{ ($errors->first('start_time')) ? 'has-error' : '' }}">
            {{ Form::label('start_time', 'Start Time', array('class' => 'control-label')) }}
            {{ ($errors->first('start_time')) ? '<p class="text-danger">' . $errors->first('start_time') . '</p>' : '' }}
            {{ Form::text('start_time', null, array('class' => 'form-control timepicker_status', 'placeholder' => 'Enter Start Time')) }}
        </div>

        <div class="form-group {{ ($errors->first('end_date')) ? 'has-error' : '' }}">
            {{ Form::label('end_date', 'End Date', array('class' => 'control-label')) }}
            {{ ($errors->first('end_date')) ? '<p class="text-danger">' . $errors->first('end_date') . '</p>' : '' }}
            {{ Form::text('end_date', null, array('class' => 'form-control datepicker_status', 'placeholder' => 'Enter End Date')) }}
        </div>

        <div class="form-group {{ ($errors->first('end_time')) ? 'has-error' : '' }}">
            {{ Form::label('end_time', 'End Time', array('class' => 'control-label')) }}
            {{ ($errors->first('end_time')) ? '<p class="text-danger">' . $errors->first('end_time') . '</p>' : '' }}
            {{ Form::text('end_time', null, array('class' => 'form-control timepicker_status', 'placeholder' => 'Enter End Time')) }}
        </div>

        <a href="{{ route('status.manage.index') }}" class="btn btn-default">Cancel</a>
        {{ Form::submit('Create New Status', array('class' => 'btn btn-primary')) }}
        {{ Form::close() }}
    </div>
</div>

@stop