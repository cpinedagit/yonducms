@extends('cms.home')
@section('title')
<h2>Add Schedule</h2>
@stop
@section('content')
{!! Form::open(array('url' => 'cms/scheduler','files' => 'true', 'id' => 'addScheduleForm')) !!}
    {!! Form::label('title','Title:') !!}
    {!! Form::text('title',null,['class' => 'form-control']) !!}<br><br>
    {!! Form::label('imageSchedule','Select Image for Schedule Banner:') !!}<br><br>
    {!! Form::file('imageSchedule') !!}<br><br>
    <!--monday to friday day schedule-->
<!--    {!! Form::label('schedule','Schedule:') !!}
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
    {!! Form::checkbox('daySchedule','Sunday') !!}-->
    <!--monday to friday day schedule-->
    {!! Form::submit('Save',['class'=> 'btn btn-add']) !!}
    {!! Form::reset('Reset',['class' => 'btn btn-reset']) !!}
    {!! Form::button('Cancel',['class' => 'btn btn-reset','id' => 'cancel']) !!}
{!! Form::close() !!}
<script>
    $('#cancel').on('click', function () {
	  window.location = ("{!! URL::to('/')!!}/cms/scheduler");
    });
//    $('#addScheduleButton').on('click',function(){
//	  var selectedDay = new Array();
//	  var addScheduleFormdata = $('form#addScheduleForm').serialize();
//	  $("input:checkbox[name=daySchedule]:checked").each(function () {
//	  selectedDay.push($(this).val());
//	  });
//	  console.log(addScheduleForm);
//	  console.log(selectedDay);
//	  $.ajax({
//		type: 'POST',
//		url: "{!! URL::route('cms.scheduler.store') !!}",
//		data: addScheduleFormdatas,
//		async: false,
//		cache: false,
//		contentType: false,
//		processData: false,
//		success: function(data){
//		    location.reload();
//		}
//	  });
//    });
</script>
@stop