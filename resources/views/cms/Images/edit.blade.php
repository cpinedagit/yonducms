
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
            <li role="presentation" class="active">{!! HTML::link('Image','Images') !!}</li>   
            <li role="presentation">{!! HTML::link('Pages','Page Management') !!}</li>   
            <li role="presentation">{!! HTML::link('Banners','Banner Management') !!}</li>   
            <li role="presentation">{!! HTML::link('frontEnd','Front End',['target' => '_blank']) !!}</li>   
        </ul>
        <div class="border">
            <h2>Edit Image</h2>
            {!! Form::model($images,array('method'=>'PUT','url'=>'Image/'.$images['id'],'files'=>'true')) 	!!}
                {!! Form::label('name', 'Name:') !!} 
                {!! Form::text('name', $images['name'],['class' => 'form-control Nform-control ']) !!}
                {!! Form::label('image','Image:') !!}
                {!! Form::file('image',['class' => 'form-control Nform-control']) !!}
                {!! Form::label('','Current Image:') !!}<br>
                {!! HTML::image('images/'.$images['image'],null,['width' => '310','height' => '180','style=margin-left:100px:']) !!}<br><br>
                {!! Form::submit('Save',['class' => 'btn btn-success']) !!}
                {!! Form::button('Cancel',['id' => 'cancel', 'class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>

    </body>
</html>

<script>
    
$(document).ready(function(){
    
   $(document).on("click","#cancel",function(){
       
      window.location=("http://localhost/ninang/public/Image");       
   });
    
});


</script>


