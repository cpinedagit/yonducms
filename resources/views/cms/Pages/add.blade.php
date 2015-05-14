@extends('cms.home')
@section('content')
<body>
    <ul class="nav nav-pills nav-tabs">
        <li role="presentation">{!! HTML::link('cms/editor', 'Code Editor') !!}</li>
        <li role="presentation">{!! HTML::link('cms/image','Images') !!}</li>
        <li role="presentation">{!! HTML::link('cms/banners','Banner Management') !!}</li> 
        <li role="presentation" class='active'>{!! HTML::link('cms/pages','Page Management') !!}</li> 
    </ul>
    <div id ='border'>
        {!! Form::open(array('url' => 'cms/pages', 'method' => 'post')) !!}
        {!! Form::text('page',null,['name' => 'title','class' => 'form-control','placeholder' => 'Enter title here']) !!}
        {!! Form::textarea('editor1',null,['cols' => '100','rows' => '10']) !!}
        {!! Form::submit('Publish',['class' => 'btn btn-default marginTop']) !!}
        {!! Form::close() !!}
    </div>
</body>
</html>
{!! HTML::script('js/jquery.js') !!}
{!! HTML::script('js/bootstrap.min.js') !!}
{!! HTML::script('ckeditor/ckeditor.js') !!}
@stop


