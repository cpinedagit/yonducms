
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
            <li role="presentation" class='active'>{!! HTML::link('Image','Images') !!}</li>
            <li role="presentation">{!! HTML::link('Pages','Page Management') !!}</li>
            <li role="presentation">{!! HTML::link('Banners','Banner Management') !!}</li> 
            <li role="presentation">{!! HTML::link('frontEnd','Front End',['target' => '_blank']) !!}</li>  
        </ul>
        <div class="border">
            <h2>Add Image</h2>           
            {!! Form::open(array('url'=> 'Image', 'files' => 'true')) !!}
            
            {!! Form::label('iname', 'Name:') !!}
            {!! Form::text('name',null,['class' => 'form-control Nform-control']) !!}            
            {!! Form::label('image', 'Image:') !!}
            {!! Form::file('image',['class' => 'form-control Nform-control']) !!}
            {!! Form::submit('Save',['class'=> 'btn btn-default marginTop marginLeft']) !!}
            {!! Form::close() !!} 
        </div>

    </body>
</html>

<script>
</script>


