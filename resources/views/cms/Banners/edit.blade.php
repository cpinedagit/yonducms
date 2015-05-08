
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
            <li role="presentation">{!! HTML::link('Banners','Banners') !!}</li>   
            <li role="presentation">{!! HTML::link('frontEnd','Front End',['target' => '_blank']) !!}</li>   
        </ul>
        <div class="border">
            <h2>Edit Banner</h2>
            {!! Form::model($banners,array('method'=>'PUT','url'=>'Banners/'.$banners['id'],'files'=>'true')) 	!!}
                {!! Form::label('name', 'Name:') !!} 
                {!! Form::text('name', $banners['name'],['class' => 'form-control']) !!}
                {!! Form::label('order', 'Order:') !!}
                {!! Form::text('order', $banners['order'],['class' => 'form-control']) !!}
                {!! Form::label('image','Image:') !!}
                {!! Form::file('image',['class' => 'form-control']) !!}
                {!! Form::label('','Current Image:') !!}<br>
                {!! HTML::image('images/'.$banners['image'],null,['width' => '310','height' => '180','style=margin-left:100px:']) !!}<br><br>
                {!! Form::submit('Save',['class' => 'btn btn-success']) !!}
                {!! Form::button('Cancel',['id' => 'cancel', 'class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        </div>

    </body>
</html>

<script>
    
$(document).ready(function(){
    
   $(document).on("click","#cancel",function(){
       
      window.location=("http://localhost/webservice/public/Banners");
       
   });
    
});


</script>


