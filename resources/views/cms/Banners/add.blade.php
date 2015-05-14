@extends('cms.home')
@section('content')
<ul class="nav nav-pills nav-tabs">
    <li role="presentation">{!! HTML::link('cms/editor', 'Code Editor') !!}</li>
    <li role="presentation">{!! HTML::link('cms/image','Images') !!}</li>
    <li role="presentation"   class='active'>{!! HTML::link('cms/banners','Banner Management') !!}</li> 
    <li role="presentation">{!! HTML::link('cms/pages','Page Management') !!}</li>
</ul>
<div class="border">
    <h2>Add Banner</h2>           
    {!! Form::open(array('url'=> 'cms/banners', 'files' => 'true')) !!}            
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name',null,['class' => 'form-control Nform-control']) !!}     
    {!! Form::label('type', 'Type:') !!}
    {!! Form::select('type',array('Standard' => 'Standard', 'Advanced' => 'Advanced'), null, array('class' => 'form-control Nform-control')) !!}     
    {!! Form::submit('Save',['class'=> 'btn btn-default marginTop marginLeft']) !!}
    {!! Form::close() !!} 
</div>
{!! HTML::script('js/jquery.js') !!}
{!! HTML::script('js/bootstrap.min.js') !!}
@stop