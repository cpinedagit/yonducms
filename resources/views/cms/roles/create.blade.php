@extends('cms.home')

@section('content')

	<h5>Create New Role</h5>

	{!! Form::open(array('route' => array('cms.role.store'), 'method' => 'post')) !!}

	<p>
		{!! Form::label('role_name', 'Role Name') !!}
		{!! Form::text('role_name', null) !!}
	</p>

	<p>
		{!! Form::label('role_description', 'Role Desciption') !!}
		{!! Form::textarea('role_description', null) !!}
	</p>	

	<p>
		{!! Form::checkbox('role_active'); !!} 
		{!! Form::label('role_active', 'Activate') !!}
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