@extends('cms.home')
@section('title')
<h2>Add Schedule</h2>
@stop
@section('content')
{!! Form::open(array('url' => 'cms/scheduler','files' => 'true')) !!}
    {!! Form::label('title','Title:') !!}
    {!! Form::text('title',null,['class' => 'form-control']) !!}<br><br>
    {!! Form::label('imageSchedule','Select Image for Schedule Banner:') !!}<br><br>
    {!! Form::file('imageSchedule') !!}<br><br>
    <br><br><br><br><br>
    {!! Form::submit('Save',['class'=> 'btn btn-add']) !!}
    {!! Form::reset('Reset',['class' => 'btn btn-reset']) !!}
    {!! Form::button('Cancel',['class' => 'btn btn-reset','id' => 'cancel']) !!}
{!! Form::close() !!}
<script>
    $('#cancel').on('click', function () {
	  window.location = ("{!! URL::to('/')!!}/cms/scheduler");
    });
   //  $('#test').on('click',function(){
	  // var selected = new Array();
	  // $("input:checkbox[name=daySchedule]:checked").each(function () {
	  // selected.push($(this).val());
	  // });
	  // console.log(selected);
   //  });
</script>
@stop
