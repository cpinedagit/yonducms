@extends('cms.home')
@section('content')
<h1>Add Schedule</h1>

{!! Form::open(array('url' => 'cms/scheduler','files' => 'true')) !!}
{!! Form::label('title','Title:') !!}
{!! Form::text('title',null,['class' => 'form-control']) !!}<br><br>
{!! Form::label('imageSchedule','Select Image for Schedule Banner:') !!}<br><br>
{!! Form::file('imageSchedule') !!}<br><br>
<!--monday to friday day schedule-->
{!! Form::label('schedule','Schedule:') !!}
{!! Form::input('time','schedule',null,['class' => 'form-control','style'=>'width:120px;']) !!}<br><br> 
{!! Form::label('','Monday:') !!}
{!! Form::checkbox('daySchedule','Monday') !!}
{!! Form::label('','Tuesday:') !!}
{!! Form::checkbox('daySchedule','Tuesday') !!}
{!! Form::label('','Wednesday:') !!}
{!! Form::checkbox('daySchedule','Wednesday') !!}
{!! Form::label('','Thursday:') !!}
{!! Form::checkbox('daySchedule','Thursday') !!}
{!! Form::label('','Friday:') !!}
{!! Form::checkbox('daySchedule','Friday') !!}
{!! Form::label('','Saturday:') !!}
{!! Form::checkbox('daySchedule','Saturday') !!}
{!! Form::label('','Sunday:') !!}
{!! Form::checkbox('daySchedule','Sunday') !!}
<!--monday to friday day schedule-->
<br><br><br><br><br>
{!! Form::submit('Save',['class'=> 'btn btn-add']) !!}
{!! Form::reset('Reset',['class' => 'btn btn-reset']) !!}
{!! Form::button('Cancel',['class' => 'btn btn-reset','id' => 'cancel']) !!}
{!! Form::close() !!}

<script>
    $('#cancel').on('click', function () {
	  window.location = ("{!! URL::to('/')!!}/cms/scheduler");
    });
</script>
@stop
