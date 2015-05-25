@extends('cms.home')
@section('title')
<h2>Edit Banner</h2>
@stop
@section('content')
<div class='main-container__content__info'>
    <div role="tabpanel" class="tabpanel-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#details" aria-controls="home" role="tab" data-toggle="tab">Details</a></li>
            <li role="presentation"><a href="#content" aria-controls="profile" role="tab" data-toggle="tab">Current Images</a></li>
            <li role="presentation"><a href="#upload" aria-controls="messages" role="tab" data-toggle="tab">Upload</a></li>
            @if($type == 'Advanced')
            <li role="presentation"><a href="#editor" aria-controls="messages" role="tab" data-toggle="tab">Editor</a></li>
            @endif
        </ul>
        <!-- Tab panes --> 
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="details">
                <div class="main-container__content__reminder">
                    <i class="fa fa-exclamation-circle"></i>
                    <small>Reminder: Fields with asterisk(*) are required.</small>
                </div>
                {!! Form::model($banners,array('method'=>'PUT','url'=>'cms/banners/'.$banners['id'],'files'=>'true')) 	!!}
                <div class="row">
                    <div class="col-sm-9">
                        <div class="form-group">
                            {!! Form::label('name', 'Name:') !!} 
                            {!! Form::text('name', $banners['title'],['class' => 'form-control Nform-control ']) !!}
                            {!! Form::hidden('curType',$type) !!}
                            {!! Form::hidden('id',$banners['id'],['id' => 'id']) !!}
                            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    {!! Form::label('type','Type:') !!}
                                    <select name ='type' class ='form-control Nform-control'>
                                        <option value="{{ $banners['type']}}" selected disabled>{{ $banners['type']}}</option>                                 
                                        <option value="Standard">Standard</option>
                                        <option value="Advanced">Advanced</option>
                                    </select>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                        
            </div>
            <div role="tabpanel" class="tab-pane" id="content">
                <div class="main-container__content__info__filter">
                    <label>
                        <input type="checkbox" id='selecctall-banner'>
                        Select All
                    </label>
                    <select name="" id="action" class="form-control">
                        <option value="" disabled selected>Choose Action</option>
                        <option value="Delete">Delete</option>
                    </select>
                    {!! Form::button('Apply',['class' => 'btn btn-filter', "id" => "apply"]) !!}
                </div>
                <ul class="list-unstyled banner-content-list">
                    @foreach($currentImages as $currentImage)
                    <li>
                        @if($currentImage->media_path === null)                        
                        @else
                        <input type="checkbox" name ="checkbox" value="{!! $currentImage->id !!}">
                        @endif
                        <div class="banner-content-list__image-container">
                            @if($currentImage->media_path === null)
                            {!! HTML::image('public/images/noimage.png',null) !!}
                            @else
                            {!! HTML::image($currentImage->media_path,null) !!}     
                            @endif
                        </div>
                        @if($currentImage->media_path === null)                      
                        @else
                        <div class="banner-content-list__form-container">
                            <div class="form-group banner-content-list__form-container__image-name">
                                {!! Form::label('image_name','Image Name',['class' => 'form-title']) !!}
                                {!! Form::text('image_name',$currentImage->image_name,['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group banner-content-list__form-container__image-desc">
                                {!! Form::label('image_description','Image Description',['class' => 'form-title']) !!}
                                {!! Form::text('image_description',$currentImage->image_description,['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <a href='#' id='{!!$currentImage->id!!}' title ='delete this one?' class="glyphicon glyphicon-trash delCur" aria-hidden="true"></a>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane" id="upload">
                <div class="main-container__content__reminder">
                    <i class="fa fa-exclamation-circle"></i>
                    <small>File Type: JPG, GIF, PNG <br>
                        Maximum File Size: 2MB <br>
                        Recommended dimension: 1140 x 442
                    </small>
                </div>
                <div class="upload-image-container">
                    <div class="upload-image-container__label">
                        Click "<strong>Add Photo</strong>" button to select an image for upload
                    </div>
                    @include('cms.media.photo_tool')
                </div>
            </div>
            @if($type == 'Advanced')
            <div role="tabpanel" class="tab-pane" id="editor">
                {!! Form::label('editor','Editor:') !!}<br>
                <small><i>note: please use spacing for different classes.</i></small>
                {!! Form::text('classes',null,['class' => 'form-control Nform-control']) !!}        
                {!! Form::textarea('editor',null,array('class' => 'codeEditor','id' => 'codeEditor')) !!}        
                @else
                {!! Form::hidden('classes',null,['class' => 'form-control Nform-control']) !!}

            </div>
            @endif
        </div><br><br><br>
        <div class="btn-holder pull-left">
            <input type="submit" class="btn btn-add" value="Save">
            {!! Form::button('Cancel',['class' => 'btn btn-reset','id' => 'cancel']) !!}
            {!! Form::close() !!}
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
//        code editor for banner effects
        var filename = 'public/css/banner.css';
        $.get('../../../' + filename, function (data)//Remember, same domain
        {
            var _data = data;
            $('#codeEditor').val(data);
        });
        $(document).on("click", "#cancel", function () {
            window.location = ("{!! URL::to('/') !!}" + "/cms/banners");
        });
        $(document).on("click", '#apply', function () {
            var action = $('#action').val();
            if (action === 'Delete') {
                var selected = new Array();
                $("input:checkbox[name=checkbox]:checked").each(function () {
                    selected.push($(this).val());
                    console.log(selected);
                });
                if (confirm('do you really want to delete the selected image(s) for this banner?')) {
                    $.ajax({
                        type: "DELETE",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {selected: selected},
                        url: "{!! URL::to('/') !!}" + '/cms/delImage',
                        dataType: "json",
                        success: (function (data) {
                            location.reload();
                        })
                    });
                } else {
                    return false;
                }
            }
        });
        
        $(document).on("click", '.delCur', function () {
            var id = this.id;       
            if (confirm('do you really want to delete this current image for this banner?')) {
                $.ajax({
                    type: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: "{!! URL::to('/') !!}" + "/cms/delCurrentImage/" + id,
                    dataType: "json",
                    success: (function (data) {
                        location.reload();
                    })
                });

            }

        })
    });
</script>
@stop

