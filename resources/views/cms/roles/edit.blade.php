@extends('cms.home')
@section('title')
<h2>User Management</h2>
@stop
@section('content')

	<h5>Edit {!! $role->role_name !!}</h5>

	{!! Form::model($role, array('route' => array('cms.role.update', $role->id), 'method' => 'put')) !!}

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