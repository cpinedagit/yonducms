@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Forgot Password Page</div>
				<div class="panel-body">					
					<div class="panel-body">
						@if (count($errors) > 0)
							<div class="alert alert-success">
								<strong>Messages:</strong><br><br>
								<ul>
									@foreach ($errors->all() as $error)
										@if ($error=='validation.captcha')
											<li>The captcha field is incorrect.</li>
										@elseif(($error==''))
											
										@else
											<li><?php print_r($error); ?></li>
										@endif
									@endforeach
								</ul>
							</div>
						@endif
						
						{!! Form::open(['url'=>url('/password/reset'), 'id'=>'ResetPasswordForm', 'class'=>'form-horizontal', 'role'=>'form']) !!}
						 	<div class="form-group">	
						 		{!! Form::label('username', 'Username:', ['class' =>'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('username', old('username'), ['class'=>'form-control', 'data-parsley-required'=>'true'] ) !!}
						 		</div>
						 		{!! Form::label('captcha', 'CAPTCHA Field:', ['class' =>'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('captcha', old('captcha'), ['class'=>'form-control', 'data-parsley-required'=>'true'] ) !!}
						 		</div>
						 		{!! Form::label('captcha', ' ', ['class' =>'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! "<div id='capthca-img'>". captcha_img('flat') ."</div> <div class='glyphicon glyphicon-refresh' id='refresh-captcha-button'> Refresh</div>" !!}
						 		</div>
							</div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
									{!! Form::button('Submit', ['id'=>'ResetPasswordFormBtn' ,'class'=>'btn btn-primary']) !!}
								</div>
							</div>
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	//Validate forgot Password Form
	$('#ResetPasswordFormBtn').on('click',function(){
	if($('#ResetPasswordForm').parsley().validate()){
		$('#ResetPasswordForm').submit();
		}
	});

	//Refresh Captcha 
	$('#refresh-captcha-button').on('click', function(){
		$.ajax({
			type: 'GET',
			url: "{{ URL() }}"+"/captcha-generator",
			dataType: 'json',
			success: (function(data){
				$('#capthca-img').html(data['captcha_img']); 
			 })
		});
	});
</script>
@endsection
