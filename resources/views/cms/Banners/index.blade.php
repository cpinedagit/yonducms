
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
        <meta name="csrf-token" content="{{ csrf_token() }}" />
    </head>
    <body>
        <ul class="nav nav-pills nav-tabs">
            <li role="presentation">{!! HTML::link('Editor', 'Code Editor') !!}</li>
            <li role="presentation">{!! HTML::link('Image','Images') !!}</li>
            <li role="presentation"  class='active'>{!! HTML::link('Banners','Banner Management') !!}</li> 
            <li role="presentation">{!! HTML::link('Pages','Page Management') !!}</li> 
        </ul>
        <div class="border">
            <h2>Banners</h2>           
            <table border='1'>
                <thead>
                    <tr>
                        <th> ID</th>
                        <th> Title</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>                   
                    @foreach($banners as $banner)
                    <tr>
                        <td>{!! $banner->id !!}</td>
                        <td> {!! $banner->title !!}</td>
                        <td><a href="Banners/{{ $banner->id }}/edit" class="edit" id = "">edit</a> | <a href ="Image" onclick ="del({{ $banner->id }})">del</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <button id ='addBanner' type='button' class="btn btn-success">Add Banner</button>
        </div>

    </body>
</html>

<script>
            function del(id)
            {
            $.ajax({
            type:"DELETE",
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url:  'Banners' + "/" + id,
                    dataType: "json",
                    success:(function(data) {
                        
                    })
            });
            }

    $(document).ready(function(){

    $(document).on('click', '#addBanner', function(){

    window.location = ('addBanner');
    });
    });


</script>


