@extends('cms.home')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">General Settings</div>
				<div class="panel-body">
					
					{!! Form::open(['url'=>url('/general_settings/update'), 'id'=>'GeneralSettingsForm', 'method'=>'PUT', 'class'=>'form-horizontal']) !!}
					 	
						<div class="panel panel-primary">
					      <div class="panel-heading">
					        <h3 class="panel-title" id="panel-title">Website Setting<a class="anchorjs-link" href="#panel-title"><span class="anchorjs-icon"></span></a></h3>
					      </div>
					      <div class="panel-body">
					        <div class="form-group">	
					 		{!! Form::label('APP_TITLE', 'Website Title:', ['class' =>'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('APP_TITLE', str_replace('APP_TITLE=', '', $env[3]), ['class'=>'form-control', 'env-parsley-required'=>'true'] ) !!}
						 		</div>
							</div>
							<div class="form-group">	
						 		{!! Form::label('APP_TAG_LINE', 'Website Tag Line:', ['class' =>'col-md-4 control-label']) !!}
							 		<div class="col-md-6">
							 			{!! Form::text('APP_TAG_LINE', str_replace('APP_TAG_LINE=', '', $env[4]), ['class'=>'form-control', 'env-parsley-required'=>'true'] ) !!}
							 		</div>
							</div>
					      </div>
					    </div>
						
						<div class="panel panel-primary">
					      <div class="panel-heading">
					        <h3 class="panel-title" id="panel-title">Mail Setting<a class="anchorjs-link" href="#panel-title"><span class="anchorjs-icon"></span></a></h3>
					      </div>
					      <div class="panel-body">
					        <div class="form-group">	
					 		{!! Form::label('MAIL_DRIVER', 'Mail Driver:', ['class' =>'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('MAIL_DRIVER', str_replace('MAIL_DRIVER=', '', $env[15]), ['class'=>'form-control', 'env-parsley-required'=>'true'] ) !!}
						 		</div>
							</div>
							<div class="form-group">	
					 		{!! Form::label('MAIL_HOST', 'Mail Host:', ['class' =>'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('MAIL_HOST', str_replace('MAIL_HOST=', '', $env[16]), ['class'=>'form-control', 'env-parsley-required'=>'true'] ) !!}
						 		</div>
							</div>
							<div class="form-group">	
					 		{!! Form::label('MAIL_PORT', 'Mail Port:', ['class' =>'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('MAIL_PORT', str_replace('MAIL_PORT=', '', $env[17]), ['class'=>'form-control', 'env-parsley-required'=>'true', 'env-parsley-type'=>'integer'] ) !!}
						 		</div>
							</div>
							<div class="form-group">	
					 		{!! Form::label('MAIL_USERNAME', 'Mail Username:', ['class' =>'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('MAIL_USERNAME', str_replace('MAIL_USERNAME=', '', $env[18]), ['class'=>'form-control', 'env-parsley-required'=>'true', 'env-parsley-type'=>'email'] ) !!}
						 		</div>
							</div>
							<div class="alert alert-warning" role="alert">
							  Do you have a new password? set it here, else just leave it blank.
							</div>
							<div class="form-group">	
					 		{!! Form::label('MAIL_PASSWORD', 'Mail Password:', ['class' =>'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::hidden('MAIL_PASSWORD_ORIG', str_replace('MAIL_PASSWORD=', '', $env[18])) !!}
						 			{!! Form::password('MAIL_PASSWORD_NEW',  ['class'=>'form-control', 'env-parsley-required'=>'false'] ) !!}
						 		</div>
							</div>
					      </div>
					    </div>

					    <div class="panel panel-primary">
					      <div class="panel-heading">
					        <h3 class="panel-title" id="panel-title">RSS Feed<a class="anchorjs-link" href="#panel-title"><span class="anchorjs-icon"></span></a></h3>
					      </div>
					      <div class="panel-body">
					        <div class="form-group">	
					 		{!! Form::label('APP_RSS_FEED', 'RSS Link:', ['class' =>'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('APP_RSS_FEED', str_replace('APP_RSS_FEED=', '', $env[21]), ['class'=>'form-control', 'env-parsley-required'=>'true', 'env-parsley-type'=>'url'] ) !!}
						 		</div>
							</div>
					      </div>
					    </div>
						
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								{!! Form::button('Submit', ['id'=>'GeneralSettingsFormBtn', 'class'=>'btn btn-primary']) !!}
							</div>
						</div>
					{!! Form::close() !!}
					
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	//General Setting Form Validation
	$('#GeneralSettingsFormBtn').on('click',function(){
		if($('#GeneralSettingsForm').parsley().validate()){
			
			$('#GeneralSettingsForm').submit();
		}
	});

</script>
@endsection
