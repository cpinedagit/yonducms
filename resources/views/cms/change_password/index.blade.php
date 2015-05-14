@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Change Password Page</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-success">
							<strong>Messages:</strong><br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li><?php print_r($error); ?></li>
								@endforeach
							</ul>
						</div>
					@endif
					
					{!! Form::open(['url'=>url('/change_password/update'), 'method'=>'PUT', 'id'=>'ChangePasswordForm', 'class'=>'form-horizontal', 'role'=>'form']) !!}
					 	<div class="form-group">	
					 		{!! Form::label('username', 'Username:', ['class' =>'col-md-4 control-label']) !!}
					 		<div class="col-md-6">
					 			{!! Form::text('username', old('username'), ['class'=>'form-control', 'data-parsley-required'=>'true'] ) !!}
					 		</div>
						</div>
						<div class="form-group">	
					 		{!! Form::label('password', 'Password:', ['class' =>'col-md-4 control-label']) !!}
					 		<div class="col-md-6">
					 			{!! Form::password('password', ['class'=>'form-control', 'data-parsley-required'=>'true'] ) !!}
					 		</div>
						</div>
						<div class="form-group">	
					 		{!! Form::label('new_password', 'New Password:', ['class' =>'col-md-4 control-label']) !!}
					 		<div class="col-md-6">
					 			{!! Form::password('new_password', ['id'=>'new_password','class'=>'form-control', 'data-parsley-required'=>'true', 'data-parsley-minlength'=>'6'] ) !!}
					 		</div>
						</div>
						<div class="form-group">	
					 		{!! Form::label('confirm_new_password', 'Confirm New Password:', ['class' =>'col-md-4 control-label']) !!}
					 		<div class="col-md-6">
					 			{!! Form::password('confirm_new_password', ['class'=>'form-control', 'data-parsley-required'=>'true', 'data-parsley-minlength'=>'6', 'data-parsley-equalto'=>'#new_password'] ) !!}
					 		</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::button('Submit', ['id'=>'ChangePasswordFormBtn' ,'class'=>'btn btn-primary']) !!}
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	// Log in Form Validation
	$('#ChangePasswordFormBtn').on('click',function(){
		if($('#ChangePasswordForm').parsley().validate()){
			$('#ChangePasswordForm').submit();
		}
	});
</script>
@endsection
