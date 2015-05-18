@extends('cms.home')

@section('content')

	<h5>Create New User</h5>

		{!! Form::open(array('route' => array('cms.user.store'), 'id' => 'UserCreateForm',
   'method' => 'post', 'enctype' => 'multipart/form-data')) !!}

		<p>
			{!! Form::label('username', 'Username') !!}
			{!! Form::text('username', null, ['data-parsley-required' => 'true', 'data-parsley-range' => '6, 25']) !!}
		</p>

		<p>
			{!! Form::label('firstname', 'Firstname') !!}
			{!! Form::text('first_name', null, ['data-parsley-required' => 'true', 'data-parsley-range' => '1, 50']) !!}
		</p>

		<p>
			{!! Form::label('lastname', 'Lastname') !!}
			{!! Form::text('last_name', null, ['data-parsley-required' => 'true', 'data-parsley-range' => '1, 50']) !!}
		</p>

		<p>
			{!! Form::label('email', 'Email') !!}
			{!! Form::email('email', null, ['data-parsley-required' => 'true', 'data-parsley-range' => '6, 25', 'data-parsley-type' => 'email']) !!}
		</p>

		<p>
			{!! Form::label('password', 'Password') !!}
			{!! Form::password('password', null, ['data-parsley-required' => 'true']) !!}
		</p>

		<p>
			{!! Form::label('passwordconfirm', 'Confirm Password') !!}
			{!! Form::password('passwordconfirm', null, ['data-parsley-required' => 'true']) !!}
		</p>

		<p>
			{!! Form::label('rolelabel', 'Role') !!}
			<select name='role_id'>
				@foreach(roles() as $role)
					<option value='{!! $role->id !!}'>{!! $role->role_name !!}</option>
				@endforeach
			</select>
		</p>

		<p>
			{!! Form::label('uploadpic', 'Profile Picture') !!}
			{!! Form::file('profile_pic') !!}
		</p>

		<p>
			{!! Form::submit('Submit', ['id' => 'UserCreateUpdate']) !!}
		</p>

		{!! Form::close() !!}

		@if($errors->any())

			@foreach($errors->all() as $error)
				<li>{!! $error !!}</li>
			@endforeach

		@endif

<script type = "text/javascript">
	$('#UserCreateUpdate').on('click', function(){
		if($('#UserCreateForm').parsley().validate()) {
			$('#UserCreateForm').submit();
		}
	});
</script>

@endsection
@stop