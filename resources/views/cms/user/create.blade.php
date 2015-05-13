@extends('cms.home')

@section('content')

	<h5>Create New User</h5>

		{!! Form::open(array('route' => array('cms.user.store'),
   'method' => 'post')) !!}

		<p>
			{!! Form::label('username', 'Username') !!}
			{!! Form::text('username', null) !!}
		</p>

		<p>
			{!! Form::label('firstname', 'Firstname') !!}
			{!! Form::text('firstname', null) !!}
		</p>

		<p>
			{!! Form::label('lastname', 'Lastname') !!}
			{!! Form::text('lastname', null) !!}
		</p>

		<p>
			{!! Form::label('email', 'Email') !!}
			{!! Form::email('email', null) !!}
		</p>

		<p>
			{!! Form::label('password', 'Password') !!}
			{!! Form::password('password', null) !!}
		</p>

		<p>
			{!! Form::label('passwordconfirm', 'Confirm Password') !!}
			{!! Form::password('passwordconfirm', null) !!}
		</p>

		<p>
			{!! Form::label('uploadpic', 'Profile Picture') !!}
			{!! Form::file('uploadpic') !!}
		</p>

		<p>
			{!! Form::submit('Submit') !!}
		</p>

		{!! Form::close() !!}

		@if($errors->any())

			@foreach($errors->all() as $error)
				<li>{!! $error !!}</li>
			@endforeach

		@endif
@stop