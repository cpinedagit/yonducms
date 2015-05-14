@extends('cms.home')
@section('content')

    {!! Form::open(array('route'=>'cms.news.store','method'=>'POST','id'=>'news')) !!}

        <div class="form-group">
            <label for="news_title">Title</label>
         	{!! Form::text('news_title','',array('class'=>'form-control')) !!}
        </div>
        <div class="form-group">
            <label for="news_date">News Date</label>
            {!! Form::text('news_date','',array('class'=>'form-control')) !!}
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <div id="photo"></div>
            {!! Form::hidden('photo_id','',array('id' =>'photo_id')) !!} 
            @include('cms.media.media_tool')
        </div>
        <div class="form-group">
            <label for="news_content">Description</label>
            {!! Form::textarea('description','',array('class' =>'form-control ckeditor')) !!} 
        </div> 
        <div class="form-group">
            <label for="news_content">Content</label>
            {!! Form::textarea('news_content','',array('class' =>'form-control ckeditor')) !!} 
        </div>   
        <div class="form-group">
            <label for="published">Published</label>
            {!! Form::checkbox('published',1,true) !!} 
        </div> 
        <div class="form-group">
            <label for="featured">Featured</label>
            {!! Form::checkbox('featured',1,true) !!} 
        </div>  

     {!! Form::submit('Submit', array('class'=>'btn btn-primary')) !!}
     {!! Form::close() !!}


<script>
$(document).ready(function(){
    $('#insert').on('click',function(){
  var selected = new Array();
    $("input:checkbox[name=cbfiles]:checked").each(function() {
         selected.push($(this).val());
    });
    

 $.ajax({
        type: 'POST',
        url: '{!! URL::route("cms.media.get") !!}',
        data: {'selected':selected, '_token': $("[name=_token").val()},
        dataType:'json',
        success: (function(data){
            media_path=data[0][0]['media_path'];
            $('#photo').append('{!! HTML::image("'+media_path+'","alt",array("height"=>100,"width"=>100)) !!}');
            $('#photo_id').val(data[0][0]['media_id']);
            $('#fileModal').modal("hide"); 
        })

    })

    });
});
</script>

@stop