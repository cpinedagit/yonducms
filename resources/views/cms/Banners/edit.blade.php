@extends('cms.home')
@section('content')
<ul class="nav nav-pills nav-tabs">
    <li role="presentation">{!! HTML::link('cms/editor', 'Code Editor') !!}</li>
    <li role="presentation">{!! HTML::link('cms/image','Images') !!}</li>
    <li role="presentation"  class='active'>{!! HTML::link('cms/banners','Banner Management') !!}</li> 
    <li role="presentation">{!! HTML::link('cms/pages','Page Management') !!}</li> 
</ul>
<div class="border">
    <h2>Edit Banners</h2>
    {!! Form::model($banners,array('method'=>'PUT','url'=>'cms/banners/'.$banners['id'],'files'=>'true')) 	!!}
    {!! Form::label('name', 'Name:') !!} 
    {!! Form::text('name', $banners['title'],['class' => 'form-control Nform-control ']) !!}       
    <select name ='banner' class ='form-control Nform-control'>
        <option value="{{ $banners['type']}}" selected disabled>{{ $banners['type']}}</option>                                 
        <option value="Standard">Standard</option>
        <option value="Advanced">Advanced</option>
    </select> {!! Form::label('','Current Images:') !!}<br>    

    @foreach($currentImages as $currentImage)
    @if($currentImage->image === null)
    {!! HTML::image('images/noimage.png',null,['width' => '100','height' => '100','style=margin-left:100px:']) !!}<br><br>           

    @else
    {!! HTML::image('images/'.$currentImage->image,null,['width' => '100','height' => '100','style=margin-left:100px:']) !!}            
    <a href='#' id='{!!$currentImage->id!!}' title ='delete this one?' class="glyphicon glyphicon-trash delCur" aria-hidden="true"></a>
    <br><br>
    @endif
    @endforeach            
    {!! Form::label('image','Select Image for '.$banners['title']) !!}<br>
    @foreach($images as $image)
    {!! HTML::image('images/'.$image->image,null,['width' => '100','height' => '100','style=margin-left:100px:']) !!} {!! Form::checkbox('ID[]',$image->id,false) !!}<br><br>
    @endforeach
    @if($type == 'Advanced')
    {!! Form::textarea('editor') !!}
    @endif()
    {!! Form::submit('Save',['class' => 'btn btn-success']) !!}
    {!! Form::button('Cancel',['id' => 'cancel', 'class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
</div>
{!! HTML::script('js/jquery.js') !!}
{!! HTML::script('js/bootstrap.min.js') !!}
<script>

    $(document).ready(function () {

        $(document).on("click", "#cancel", function () {

            window.location = ("http://localhost/lwebservice_2/public/cms/banners");
        });

        $(document).on("click", '.delCur', function () {
            var id = this.id
            if (confirm('do you really want to delete this current image for this banner?')) {
                $.ajax({
                    type: "DELETE",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '../../banners' + "/" + id,
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

