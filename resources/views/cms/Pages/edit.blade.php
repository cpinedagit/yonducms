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
    <div id ='nonEditableUrl'>
        {!! Form::label('url', 'Url:') !!} 
        {!! URL::to('/site')!!}/{!! $pages['slug'] !!} | <a href='#' id='edit'>edit</a><br><br>          
    </div>
    <div id ='editableUrl'>
        {!! Form::label('url', 'Url:') !!} 
        {!! URL::to('/site')!!}{!! Form::text('url',$pages['slug'],['cols' => '1000', 'rows' => '1','id' => 'slug']) !!} | <a href='#' id='cancel'>cancel</a><br><br>          
    </div>
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
    $('#editableUrl').hide();
    $(document).on("click", "#edit", function (e) {

        $('#editableUrl').show();
        $('#nonEditableUrl').hide();
        $('#slug').focus();
        $('#slug').focusTextToEnd();
        e.stopPropagation();
    });
    
    $(document).on("dblclick", "#nonEditableUrl", function () {
        $('#editableUrl').show();
        $('#nonEditableUrl').hide();
        $('#slug').focus();
    });
    
    $(document).on("click", "#cancel", function () {
        $('#editableUrl').hide();
        $('#nonEditableUrl').show();
    });
    
    function cancel() {
        window.location = ("{!!URL::to('/')!!}" + "/cms/pages");
    }
    
    function focusTextToEnd() {
        this.focus();
        var $thisVal = this.val();
        this.val('').val($thisVal);
        return this;
    }
</script>
@include('cms.media.media_tool')
@stop
