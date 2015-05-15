@extends('cms.home')
@section('content')
<div class="border col-md-8">
    <div class="col-md-6">
        <h2>Edit Banners</h2>
        {!! Form::model($banners,array('method'=>'PUT','url'=>'cms/banners/'.$banners['id'],'files'=>'true')) 	!!}
        {!! Form::label('name', 'Name:') !!} 
        {!! Form::text('name', $banners['title'],['class' => 'form-control Nform-control ']) !!}
        {!! Form::hidden('curType',$type) !!}
        {!! Form::hidden('id',$banners['id'],['id' => 'id']) !!}
        <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
        <select name ='type' class ='form-control Nform-control'>
            <option value="{{ $banners['type']}}" selected disabled>{{ $banners['type']}}</option>                                 
            <option value="Standard">Standard</option>
            <option value="Advanced">Advanced</option>
        </select> {!! Form::label('','Current Images:') !!}<br>  
        @foreach($currentImages as $currentImage)
        @if($currentImage->media_path === null)
        {!! HTML::image('public/images/noimage.png',null,['width' => '100','height' => '100','style=margin-left:100px:']) !!}<br><br>
        @else
        {!! HTML::image($currentImage->media_path,null,['width' => '100','height' => '100','style=margin-left:100px:']) !!}            
        <a href='#' id='{!!$currentImage->media_id!!}' title ='delete this one?' class="glyphicon glyphicon-trash delCur" aria-hidden="true"></a><br><br>
        @endif
        @endforeach 
        @include('cms.media.photo_tool')

    </div>    
    <div class="col-md-6">
        @if($type == 'Advanced')
        <small><i>note: please use spacing for different classes.</i></small>
        {!! Form::text('classes',null,['class' => 'form-control Nform-control']) !!}        
        {!! Form::textarea('editor',null,array('class' => 'codeEditor','id' => 'codeEditor')) !!}        
        @else
        {!! Form::hidden('classes',null,['class' => 'form-control Nform-control']) !!}
        @endif
    </div>
</div>
<div class='col-md-6'>
    {!! Form::submit('Save',['class' => 'btn btn-success']) !!}
    {!! Form::button('Cancel',['id' => 'cancel', 'class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}<br><br>
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

            window.location = ("http://localhost/Web/cms/banners");
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

