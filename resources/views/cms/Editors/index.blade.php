@extends('cms.home')
@section('content')
<body>
    <ul class="nav nav-pills nav-tabs">
        <li role="presentation" class='active'>{!! HTML::link('cms/editor', 'Code Editor') !!}</li>
        <li role="presentation">{!! HTML::link('cms/image','Images') !!}</li>
        <li role="presentation">{!! HTML::link('cms/banners','Banner Management') !!}</li> 
        <li role="presentation">{!! HTML::link('cms/pages','Page Management') !!}</li> 
    </ul>
    <div id="border">
        <!--<form id ='form' method="post" action = "editor/updateFile">-->  
        {!! Form::open(array('url' => 'cms/editor/updateFile','method' => 'post')) !!}
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <textarea id='textarea' name="content" cols="100" rows="30"></textarea>
        <input id ='hidden' name ='hidden' type='hidden' value=''>                
        <br>
        <br>
        <br>
        <input id ='update' class="btn btn-success" type ="submit" value = "update file" class = "btn btn-success">
        {!! Form::close() !!}
        <div id = 'listOfFiles'>               
            <table class="tableFiles">
                <tr>
                    <td>
                        <ul>    
                            <h3>JS FILES</h3>   
                            @foreach($jsFiles as $jsFiles)
                            <li>                           
                                <a href="#" class="a" data-ext ='{!! File::name($jsFiles) !!}' id ='{!! $jsFiles !!}'>{!! File::name($jsFiles) !!}.{!! File::extension($jsFiles) !!}</a>                                
                                <input id ="ext" type='hidden' value ="{!! File::extension($jsFiles) !!}">
                            </li><br> 
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>    
                            <h3>CSS FILES</h3>
                            @foreach($cssFiles as $cssFiles)
                            <li>                           
                                <a href='#' class="b" id ='{!! $cssFiles !!}'>{!! File::name($cssFiles) !!}.{!! File::extension($cssFiles) !!}</a>
                                <input id ="ext2" type='hidden' value ="{!! File::extension($cssFiles) !!}">
                            </li><br> 
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <ul>    
                            <h3>Other FILES</h3>
                            @foreach($otherFiles as $oth)
                            <li>                           
                                <a href='#' class="c" id ='{!! $oth !!}'>{!! File::name($oth) !!}.{!! File::extension($oth) !!}</a>                             
                                <input id ="ext3" type='hidden' value ="{!! File::extension($oth) !!}">

                            </li><br> 
                            @endforeach
                        </ul>
                    </td>
                </tr>
            </table>
            <br>
            <!--<form type ="post" action ="editor/aCddFile" enctype="multipart/form-data">-->
            {!! Form::open(array('action' => 'EditorController@addFile','files' => 'true', 'method' => 'post')) !!}
            <input style="float:right;"  type ="file" name ="file" title="upload file?"> 
            <input class="btn btn-info" style="float:right;margin-right: 10px" type ='submit' value ='upload file'>
            {!! Form::close() !!}
            <!--</form>-->
        </div>
    </div>
</body>

@stop
{!! HTML::script('js/jquery.js') !!}
<script>
    $(document).on('click', '.a', function (e) {
        var filename = this.id;
//        alert(filename);
        $.get('../../public/' + filename, function (data)//Remember, same domain
        {
            var _data = data;
            $('#textarea').val(data);
            $('#hidden').val(filename);
        });

    });

    $(document).on('click', '.b', function () {
        var filename = this.id;
        $.get('../../public/' + filename, function (data)//Remember, same domain
        {
            var _data = data;
            $('#textarea').val(data);
            $('#hidden').val(filename);
        });

    });

    $(document).on('click', '.c', function () {
        var filename = this.id;
        $.get('../../public/' + filename, function (data)//Remember, same domain
        {
            var _data = data;
            $('#textarea').val(data);
            $('#hidden').val(filename);
        });
    });
</script>