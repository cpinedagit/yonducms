
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
            <li role="presentation">{!! HTML::link('Banners','Banner Management') !!}</li>            
            <li role="presentation"  class='active'>{!! HTML::link('Pages','Page Management') !!}</li> 
        </ul>
        <div class="border">
            <h2>Pages</h2>           
            <table border='1'>
                <thead>
                    <tr>
                        <th> TITLE</th>      
                        <th> DATE PUBLISHED</th>
                        <th> ACTION</th>
                    </tr>
                </thead>
                <tbody>    
                    @foreach($pages as $page)
                    <tr>
                   
                        <td>{!! $page['title'] !!}</td>
                        <td><?php echo  date('M d ,Y', strtotime($page['created_at'])); ?></td>
                        <td><a href ="Pages/{!! $page['id'] !!}/edit">edit</a><a href ="#" onclick = ""></a> | <a target ='_blank' href ="page/{!! $page['id'] !!}/{!! $page['banner'] !!}">preview</a></td>
                    </tr>
                    @endforeach                
                </tbody>
            </table>
            <button id ='addPage' type='button' class="btn btn-success">Add Page</button>
        </div>
    </body>
</html>

<script>

    function del(id)
    {
        $.ajax({
            type: "DELETE",
            url: 'Banners' + "/" + id,
            dataType: "json",
            success: (function (data) {
                window.location('Banners');
            })
        });
    }

    $(document).ready(function () {

        $(document).on('click', '#addPage', function () {

            window.location = ('addPage');
        });
    });


</script>


