@extends('cms.home')
@section('content')
<h1>Add Schedule</h1>

{!! Form::open(array('url' => 'cms/scheduler','files' => 'true')) !!}
{!! Form::label('title','Title:') !!}
{!! Form::text('title',null,['class' => 'form-control']) !!}<br><br>
{!! Form::label('imageSchedule','Select Image for Schedule Banner:') !!}<br><br>
{!! Form::file('imageSchedule') !!}<br><br>
{!! Form::label('schedule','Schedule:') !!}
{!! Form::input('time','schedule',null,['class' => 'form-control','style'=>'width:120px;']) !!}
<br><br><br><br><br>
{!! Form::submit('Save',['class'=> 'btn btn-add']) !!}
{!! Form::reset('Reset',['class' => 'btn btn-reset']) !!}
{!! Form::close() !!}

@stop
