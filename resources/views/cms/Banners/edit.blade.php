
<!DOCTYPE html>
<!--
Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.md or http://ckeditor.com/license
-->
<html>
    <head>
        <meta charset="utf-8">

        <!--other css files-->
        {!! HTML::style('css/mystyle.css') !!}
        {!! HTML::style('bootstrap/css/bootstrap.min.css') !!}
        <!--        other js files-->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
        {!! HTML::style('bootstrap/js/bootstrap.js') !!}



    </head>
    <body>
        <ul class="nav nav-pills nav-tabs">
            <li role="presentation">{!! HTML::link('Editor', 'Code Editor') !!}</li>
            <li role="presentation">{!! HTML::link('Image','Images') !!}</li>   
            <li role="presentation"  class="active">{!! HTML::link('Banners','Banner Management') !!}</li> 
            <li role="presentation">{!! HTML::link('Pages','Page Management') !!}</li> 
        </ul>
        <div class="border">
            <h2>Edit Banner</h2>
            {!! Form::model($banners,array('method'=>'PUT','url'=>'Banners/'.$banners['id'],'files'=>'true')) 	!!}
            {!! Form::label('name', 'Name:') !!} 
            {!! Form::text('name', $banners['title'],['class' => 'form-control Nform-control ']) !!}       
            {!! Form::label('','Current Images:') !!}<br>
            @foreach($currentImages as $currentImage)
            {!! HTML::image('images/'.$currentImage->image,null,['width' => '100','height' => '100','style=margin-left:100px:']) !!}            
            <a href='#' id='delImage' title ='delete this one?' class="glyphicon glyphicon-trash" aria-hidden="true"></a>
            <br><br>
            @endforeach
            {!! Form::label('image','Select Image for '.$banners['title']) !!}<br>
            @foreach($images as $image)
            {!! HTML::image('images/'.$image->image,null,['width' => '100','height' => '100','style=margin-left:100px:']) !!} {!! Form::checkbox('ID[]',$image->id,false) !!}<br><br>

            @endforeach
            {!! Form::submit('Save',['class' => 'btn btn-success']) !!}
            {!! Form::button('Cancel',['id' => 'cancel', 'class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>

    </body>
</html>

<script>

    $(document).ready(function () {

        $(document).on("click", "#cancel", function () {

            window.location = ("http://localhost/lwebservice/public/Banners");
        });

        $(document).on("click")
    });



</script>


