@extends('main')
@section('content')

<script src="//cdn.ckeditor.com/4.4.7/standard/ckeditor.js"></script>
<div class = "col-md-12">
<div class = "col-md-6">
    {!! Form::open(array('route'=>array('media.update', $file->image_id),'method'=>'PUT','id'=>'upload', 'files'=>true)) !!}
        <div class="form-group">
             <label for="image_file_name">File name</label>
            {!! Form::text('image_file_name',$filename, array('class'=>'form-control')) !!}
             {!! Form::hidden('image_file_name_orig',$filename) !!}
        </div>
    <img src="../{{ $file->image_path  }}"/>
        <div class="form-group">
            <label for="caption">Caption</label>
         	{!! Form::text('caption',$file->caption,array('class'=>'form-control')) !!}
        </div>
        <div class="form-group">
            <label for="alternative_text">Alternative Text</label>
         	{!! Form::text('alternative_text',$file->alternative_text,array('class'=>'form-control')) !!}
        </div> 
        <div class="form-group">
            <label for="description">Description</label>
    		{!! Form::textarea('description',$file->description,array('id'=>'Editor1','class' =>'ckeditor form-control')) !!} 
    	</div>   
</div>

<div class = "col-md-6">

    <table>
        <tr>
            <td>File name </td>
            <td> {{$file->image_file_name}}</td>
        </tr>
            <tr>
            <td>File Type </td>
            <td> {{ File::extension($file->image_path) }}</td>
        </tr>
        <tr>
            <td>File Size </td>
            <td> {{ File::size($file->image_path) }} bytes </td>
        </tr>
        <tr>
            <td>Dimensions </td>
            <td> {{ $width.'x'.$height }}</td>
        </tr>
    </table>


     {!! Form::submit('Submit', array('class'=>'btn btn-primary')) !!}
     {!! Form::close() !!}

    {!! Form::open(array('route'=>array('media.destroy', $file->image_id),'method'=>'DELETE')) !!}
        {!! Form::submit('Delete Permanently', array('class' => 'btn btn-warning')) !!}
    {!! Form::close() !!}
</div>



@include('cms.media.media_tool')



{!! gallery([25,26,27,36]) !!}


@stop