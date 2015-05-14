@extends('cms.home')
@section('content')
<div class="border">
    <h2>Edit Page</h2>
    {!! Form::model($pages,array('method'=>'PUT','url'=>'cms/pages/'.$pages['id'],'files'=>'true')) 	!!}
    {!! Form::label('name', 'Title:') !!} 
    {!! Form::text('title', $pages['title'],['class' => 'form-control Nform-control']) !!}          
    {!! Form::label('url', 'Url:') !!} 
    {!! Form::textarea('url', $pages['url'],['cols' => '1000', 'rows' => '1','class' => 'form-control Tform-control']) !!}          
    <div class="marginTop">
        {!! Form::textarea('Editor1',$pages['content'],['cols' => '100','rows' => '100','class' => 'ckeditor','id' => 'Editor1']) !!}
    </div>
    <div id ="bannerList">
        <table class="tableBanner">
            <tr>
                <th>banner</th>
                <th>id</th>
            </tr>
            <tr>
                @foreach($banners as $banner)
                <td>{{ $banner->title}}</td>
                <td>{{ $banner->id}}</td>
                @endforeach
            </tr>
            <tr>
                <td><i>Sample format :</i></td>
                <td>
                    <i>
                        <?php
                        $str = ""."?php "."echo banner(n)"." ?"."";
                        echo $str;
                        ?>
                    </i>
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
<script>
    function cancel() {
        window.location = ('http://localhost/Web/cms/pages');
    }
</script>
@include('cms.media.media_tool')
@stop
