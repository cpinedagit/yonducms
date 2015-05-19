@extends('cms.home')
@section('content')
<div class="main-container__content__reminder">
                    <i class="fa fa-exclamation-circle"></i>
                    <small>Reminder: Allowed file types: {{ env('APP_MEDIA_FORMATS') }}.</small>
                </div>




<div class='main-container__content__info'>
                   {!! Form::open(array('route'=>'cms.media.store','method'=>'POST','id'=>'upload', 'files'=>true)) !!}
                       <div class="row">
                            <div class="col-sm-12">
                               <div class="form-group">
                                    <label for="media-upload" class='form-title'>Add New Media</label>
                                    <div class="control-group">
                                      <div class="controls controls--upload">
                                        
                                        <div class="filedrag-holder">
                                            <div id="filedrag">
                                                <h3>Drop files here</h3>
                                                or <br>
                                               {!! Form::file('fileselect[]', array('multiple'=>true,'id'=>'fileselect','accept'=>'image/*,video/*','class'=>'btn btn-add filedrag__modal')) !!}
                               
                                            </div>
                                        </div>
                                     </div>
                                    </div>
                                    <div class="preview-drag-drop"></div>
                                  <div id="messages"></div>
                                  
                                </div>     
                            </div>
                        </div>
                   {!! Form::close() !!}
                </div>


















<script>
var formats = "{{ env('APP_MEDIA_FORMATS') }}";
formats = formats.split(',');
var default_size = "{{ env('APP_MEDIA_MAX_FILE_SIZE') }}";	
</script>
{!! HTML::script('public/js/upload.js') !!}

@stop