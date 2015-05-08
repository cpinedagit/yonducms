@extends('cms.main')

 @section('content')

 {!! Form::open(['url'=>'login']) !!}
 	{!! Form::label('username', 'User Name:') !!}
 	{!! Form::text('username') !!}

	{!! Form::label('password', 'Password:') !!}
 	{!! Form::password('password') !!} 	

 	{!! Form::submit('Submit') !!}
 {!! Form::close() !!}

 @stop