@extends('cms.home')

@section('content')

	<div class='main-container__content__info'>
       <div class="row">
           <div class="col-sm-12">
               <h3>Edit</h3>
           </div>
       </div>
       <div class="row">
            <div class="col-sm-7">
                <div class="form-group">
                   <label for="user-role" class='form-title'>User Role</label>
                   <div class="profile-role-holder">
                       <div class="profile-role-holder__role col-sm-9">
                            <select name="" id="user-role" class="form-control">
                                
                            	@foreach($roles as $role)

									<option value="{!! $role->id !!}">{!! ucwords(strtolower($role->role_name)) !!}</option>
									
								@endforeach

                            </select>
                       </div>
                        <input type="submit" class="btn btn-add pull-right" value="Update Profile">
                   </div>
                </div>
            </div>
        </div>
   </div>

	<h3>Edit {!! $user->username !!}</h3>

	{!! Form::model($user, array('route' => array('cms.user.update', $user->id),
   'method' => 'put')) !!}

   		<p>
			{!! Form::label('username', 'Username') !!}
			{!! Form::text('username', null) !!}
		</p>

  		<p>
			{!! Form::label('firstname', 'Firstname') !!}
			{!! Form::text('first_name', null) !!}
		</p>

		<p>
			{!! Form::label('lastname', 'Lastname') !!}
			{!! Form::text('last_name', null) !!}
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
			{!! Form::label('rolelabel', 'Role') !!}
			<select name='role_id'>				
				@foreach(roles() as $role)
					<option value='{!! $role->id !!}'>{!! $role->role_name !!}</option>
				@endforeach

				@if(!empty($user->role_id) && $user->role_id != '' && $user->role_id != NULL)

					<option value='{!! $user->role_id !!}' selected>{!! $roleName->role_name !!}</option>
				@endif
			</select>
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
<script type = "text/javascript">
	$('#UserCreateUpdate').on('click', function(){
		if($('#UserCreateForm').parsley().validate()) {
			$('#UserCreateForm').submit();
		}
	});
</script>
@endsection
@stop