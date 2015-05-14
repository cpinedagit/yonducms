@extends('cms.home')
@section('content')

  <div class="secure">Upload form</div>
 	{!! Form::open(array('route'=>'cms.media.store','method'=>'POST','id'=>'upload', 'files'=>true)) !!}

    <div class="control-group">
      <div class="controls">
      {!! Form::file('fileselect[]', array('multiple'=>true,'id'=>'fileselect','accept'=>'image/*,video/*')) !!}
		<div id="filedrag">or drop files here</div>
     </div>
	</div>

	{!! Form::close() !!}
	<div id="messages">
	</div>
</div>


{!! HTML::script('public/js/upload.js') !!}

@stop