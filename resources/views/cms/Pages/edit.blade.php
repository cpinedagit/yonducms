@extends('cms.home')
@section('content')
{!! Form::model($pages,array('method'=>'PUT','url'=>'cms/pages/'.$pages['id'],'files'=>'true')) !!}
<div class='main-container__content__title'>
    <h2>Pages</h2>
</div>
<div class="main-container__content__breadcrumbs">
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li><a href="#">Pages</a></li>
        <li class="active">Edit</li>
    </ol>
</div>
<div class="main-container__content__reminder">
    <i class="fa fa-exclamation-circle"></i>
    <small>Reminder: Fields with asterisk(*) are required.</small>
</div>
<div class='main-container__content__info'>
    <div class="row">
        <div class="col-sm-9">
            <div class="form-group">
                <label for="page-title" class='form-title'>Edit Page *</label>
                {!! Form::text('title', $pages['title'],['class' => 'form-control Nform-control', 'placeholder' => 'Enter title here']) !!} 
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="page-title" class='form-title'>Parent Page *</label>
                        <select class='form-control'>
                            <option>page1</option>
                            <option>page 2</option>        
                        </select>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="page-url" class='form-title'>URL Key</label>
                        <div id ='nonEditableUrl'>
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

                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="Editor1" class='form-title'>Content *</label>
                       {!! Form::textarea('Editor1',$pages['content'],['cols' => '100','rows' => '100','class' => 'ckeditor','id' => 'Editor1']) !!}
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="main-container__content__info__options">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" checked> Publish Page
                    </label>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" checked> Include Widget
                    </label>
                </div>
                <div class="main-container__content__info__options__action-holder btn-holder">
                    <button class="btn btn-reset" onclick = "cancel()">Reset</button>
                    <input type="submit" class="btn btn-add" value="Save">
                </div>
            </div>
        </div>

    </div>
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
