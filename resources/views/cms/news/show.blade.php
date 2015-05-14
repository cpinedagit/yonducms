@extends('cms.home')
@section('content')

    {!! Form::open(array('route'=>array('cms.news.update', $result->news_id),'method'=>'PUT','id'=>'news','files'=>true)) !!}

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
            {!! HTML::image($result->image_path,"alt",array("id"=>"img","height"=>100,"width"=>100)) !!}
            </div>
            {!! Form::file('file', array('multiple'=>false,'id'=>'file','accept'=>'image/*','onchange'=>'loadFile(event)')) !!}
        </div>
        <div class="form-group">
            <label for="news_content">Description</label>
            {!! Form::textarea('description',$result->description,array('class' =>'ckeditor form-control')) !!} 
        </div> 
        <div class="form-group">
            <label for="news_content">Content</label>
    		{!! Form::textarea('news_content',$result->news_content,array('id'=>'Editor1','class' =>'ckeditor form-control')) !!} 
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



            @include('cms.media.media_tool')
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

  var loadFile = function(event) {
    var output = document.getElementById('img');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script> 

@stop