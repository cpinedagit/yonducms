@extends('cms.home')
@section('content')
<body>
    <ul class="nav nav-pills nav-tabs">
        <li role="presentation">{!! HTML::link('cms/editor', 'Code Editor') !!}</li>
        <li role="presentation">{!! HTML::link('cms/image','Images') !!}</li>
        <li role="presentation">{!! HTML::link('cms/banners','Banner Management') !!}</li> 
        <li role="presentation" class='active'>{!! HTML::link('cms/pages','Page Management') !!}</li> 
    </ul>
    <div class="border">
        <h2>Edit Page</h2>
        {!! Form::model($pages,array('method'=>'PUT','url'=>'cms/pages/'.$pages['id'],'files'=>'true')) 	!!}
        {!! Form::label('name', 'Title:') !!} 
        {!! Form::text('title', $pages['title'],['class' => 'form-control Nform-control']) !!}          
        {!! Form::label('url', 'Url:') !!} 
        {!! Form::textarea('url', $pages['url'],['cols' => '1000', 'rows' => '1','class' => 'form-control Tform-control']) !!}          
        <div class="marginTop">
            {!! Form::textarea('editor1',$pages['content'],['cols' => '100','rows' => '100','class' => 'editor1']) !!}
        </div>
        <div id ="bannerList">
            <table class="tableBanner">
                <tr>
                    <th>banner</th>
                    <th>id</th>
                </tr>
                <tr>
                    <td>banner 1</td>
                    <td>1</td>
                </tr>
                <tr>
                    <td><i>Format :</i></td>
                    <td>
                        <i><?php
                        $str = 'banner(n)';
                        echo $str;
                        ?></i>
                    </td>
                </tr>
            </table>

        </div>
        <div class="marginTop">
            {!! Form::submit('Save',['class' => 'btn btn-success']) !!}
            {!! Form::button('Cancel',['onclick' => 'cancel()', 'class' => 'btn btn-danger']) !!}
        </div>
        {!! Form::close() !!}
    </div>
    {!! HTML::script('js/jquery.js') !!}
    {!! HTML::script('ckeditor/ckeditor.js') !!}
    <script>
        function cancel() {
            window.location = ('http://localhost/lwebservice_2/public/cms/pages');
        }
    </script>

    @stop