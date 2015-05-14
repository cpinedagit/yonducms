@extends('cms.home')
@section('content')
@foreach($result as $result)
    {!! Form::open(array('route'=>array('cms.news.update', $result->news_id),'method'=>'PUT','id'=>'news')) !!}

        <div class="form-group">
            <label for="news_title">Title</label>
         	{!! Form::text('news_title',$result->news_title,array('class'=>'form-control')) !!}
        </div>
        <div class="form-group">
            <label for="news_date">News Date</label>
            {!! Form::text('news_date',$result->news_date,array('class'=>'form-control')) !!}
        </div> 
        <div class="form-group">
            <label for="photo">Photo</label>
            <div id="photo">
            {!! HTML::image("$result->media_path","alt",array("height"=>100,"width"=>100)) !!}
            </div>
            {!! Form::hidden('photo_id',$result->photo_id,array('id' =>'photo_id')) !!} 
            @include('cms.media.media_tool')
        </div>
        <div class="form-group">
            <label for="news_content">Description</label>
            {!! Form::textarea('description',$result->description,array('class' =>'ckeditor form-control')) !!} 
        </div> 
        <div class="form-group">
            <label for="news_content">Content</label>
    		{!! Form::textarea('news_content',$result->news_content,array('class' =>'ckeditor form-control')) !!} 
    	</div>   
        <div class="form-group">
            <label for="published">Published</label>
            @if($result->published == 1)
                {!! $pub = true !!}
            @else
                {!! $pub = false !!}
            @endif
            {!! Form::checkbox('published',$result->published,$pub,array('class' =>'cbox')) !!} 
        </div> 
        <div class="form-group">
            <label for="featured">Featured</label>
            @if($result->featured == 1)
               {!! $fea = true !!}
            @else
                {!! $fea = false !!}
            @endif
            {!! Form::checkbox('featured',$result->featured,$fea,array('class' =>'cbox')) !!} 
        </div> 
     {!! Form::submit('Submit', array('class'=>'btn btn-primary')) !!}
     {!! Form::close() !!}

    {!! Form::open(array('route'=>array('cms.news.destroy', $result->news_id),'method'=>'DELETE')) !!}
        {!! Form::submit('Delete Permanently', array('class' => 'btn btn-warning')) !!}
    {!! Form::close() !!}

@endforeach
<script>
$('.cbox').on('click',function(){
    val = $(this).val();
    if (val == 1) {
        $(this).val('0');
    }
    else
    {
        $(this).val('1');        
    }
});
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
            $('#photo').empty();
            $('#photo').append('{!! HTML::image("'+media_path+'","alt",array("height"=>100,"width"=>100)) !!}');
            p_id=data[0][0]['media_id'];
            $('#photo_id').val(p_id);
            $('#fileModal').modal("hide"); 
        })

    })
    });
});
</script> 

@stop