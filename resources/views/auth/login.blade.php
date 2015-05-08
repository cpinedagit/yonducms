@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Login</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-success">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif
					
					{!! Form::open(['url'=>url('/auth/login'), 'id'=>'LogInForm', 'class'=>'form-horizontal', 'role'=>'form']) !!}
					 	<div class="form-group">	
					 		{!! Form::label('username', 'User Name:', ['class' =>'col-md-4 control-label']) !!}
					 		<div class="col-md-6">
					 			{!! Form::text('username', old('username'), ['class'=>'form-control', 'data-parsley-required'=>'true'] ) !!}
					 		</div>
						</div>
						<div class="form-group">	
					 		{!! Form::label('password', 'Password:', ['class' =>'col-md-4 control-label']) !!}
					 		<div class="col-md-6">
					 			{!! Form::text('password', '', ['class'=>'form-control', 'data-parsley-required'=>'true'] ) !!}
					 		</div>
						</div>
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::button('Submit', ['id'=>'LogInFormBtn' ,'class'=>'btn btn-primary']) !!}

								<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>
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
	$('#LogInFormBtn').on('click',function(){
		if($('#LogInForm').parsley().validate()){
			$('#LogInForm').submit();
		}
	});
</script>
@endsection
