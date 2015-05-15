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
{{ env('APP_MEDIA_FORMATS') }}
{{ env('APP_MEDIA_MAX_FILE_SIZE') }} MB

	{!! Form::close() !!}
	<div id="messages">
	</div>
</div>
<script>
var formats = "{{ env('APP_MEDIA_FORMATS') }}";
formats = formats.split(',');
var default_size = "{{ env('APP_MEDIA_MAX_FILE_SIZE') }}";	
</script>
{!! HTML::script('public/js/upload.js') !!}

@stop