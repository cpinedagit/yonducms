@extends('cms.home')
@section('content')
<div id ='border'>
    {!! Form::open(array('url' => 'cms/pages', 'method' => 'post')) !!}
    {!! Form::text('page',null,['name' => 'title','class' => 'form-control','placeholder' => 'Enter title here']) !!}
    {!! Form::textarea('Editor1',null,['cols' => '100','rows' => '10','class' => 'ckeditor']) !!}
    {!! Form::submit('Publish',['class' => 'btn btn-default marginTop']) !!}
    {!! Form::close() !!}
</div>
</html>
@stop


