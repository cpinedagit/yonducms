@extends('cms.home')
@section('content')
<div class="col-md-12">
    <h2>Edit Page</h2>
    {!! Form::model($pages,array('method'=>'PUT','url'=>'cms/pages/'.$pages['id'],'files'=>'true')) 	!!}
    {!! Form::label('name', 'Title:') !!} 
    {!! Form::text('title', $pages['title'],['class' => 'form-control Nform-control']) !!}          
    {!! Form::label('parent', 'Parent:') !!} 
    <select class='form-control Nform-control'>
        <option>page1</option>
        <option>page 2</option>        
    </select>
    {!! Form::label('url', 'Url:') !!} 
    {!! Form::textarea('url', $pages['url'],['cols' => '1000', 'rows' => '1','class' => 'form-control Tform-control']) !!}          
    {!! Form::label('table','Banner list:') !!}
    <table border='1' class="tableBanner">
        <tr>
            <th>banner</th>
            <th>id</th>
        </tr>
        @foreach($banners as $banner)
        <tr>
            <td>{{ $banner->title}}</td>
            <td>{{ $banner->id}}</td>
        </tr>
        @endforeach
        <tr>
            <td><i>Sample format :</i></td>
            <td>
                 <!--echo htmlspecialchars("");-->
                <?php
                $str = "" . "?php " . "echo banner(n)" . " ?" . "";
                ?>
                {!! Form::text('sample','<'.$str.'>') !!}
            </td>
        </tr>
    </table>    
</div>
<div class="marginTop">
    {!! Form::textarea('Editor1',$pages['content'],['cols' => '100','rows' => '100','class' => 'ckeditor','id' => 'Editor1']) !!}
</div>

<div class="marginTop">
    {!! Form::submit('Save',['class' => 'btn btn-success']) !!}
    {!! Form::button('Cancel',['onclick' => 'cancel()', 'class' => 'btn btn-danger']) !!}
</div>
{!! Form::close() !!}
<script>
    function cancel() {
        window.location = ('http://localhost/Web/cms/pages');
    }
</script>
@include('cms.media.media_tool')
@stop
