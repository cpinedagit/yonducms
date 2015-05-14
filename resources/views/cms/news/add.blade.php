@extends('cms.home')
@section('content')

    {!! Form::open(array('route'=>'cms.news.store','method'=>'POST','id'=>'news','files'=>true)) !!}

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
            <div id="photo">
            {!! HTML::image("","alt",array("id"=>"img","height"=>100,"width"=>100)) !!}
            </div>
            {!! Form::file('file', array('multiple'=>false,'id'=>'file','accept'=>'image/*','onchange'=>'loadFile(event)')) !!}
        </div>
        <div class="form-group">
            <label for="news_content">Description</label>
            {!! Form::textarea('description','',array('class' =>'form-control ckeditor')) !!} 
        </div> 
        <div class="form-group">
            <label for="news_content">Content</label>
            {!! Form::textarea('news_content','',array('id'=>'Editor1','class' =>'form-control ckeditor')) !!} 
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


  @include('cms.media.media_tool')

<script>
 var loadFile = function(event) {
    var output = document.getElementById('img');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>

@stop