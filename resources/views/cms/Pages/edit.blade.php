@extends('cms.home')
@section('content')
{!! Form::model($pages,array('method'=>'PUT','url'=>'cms/pages/'.$pages['id'],'files'=>'true')) !!}
<div class="main-container__content__reminder">
    <i class="fa fa-exclamation-circle"></i>
    <small>Reminder: Fields with asterisk(*) are required.</small>
</div>
<!-- 
    Choose color using these classes:
     1. alert-success
     2. alert-info
     3. alert-warning
     4. alert-danger

     then use "open" class to show the alert
-->

<!--<div class="alert alert-danger alert-danger--login show" role="alert">
    Invalid Username/Password
     sample list of errors
    <div class="error-list">
        <h5><strong>Message:</strong> </h5>
        <ul>
            <li>Invalid Username/Password</li>
            <li>Invalid Username/Password</li>
        </ul>
    </div>
</div>-->
<div class='main-container__content__info'>
    <div class="row">
        <div class="col-sm-9">
            <div class="form-group">
                <label for="page-title" class='form-title'>Edit Page *</label>
                {!! Form::text('title', $pages['title'],['class' => 'form-control', 'placeholder' => 'Enter title here']) !!}
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="page-title" class='form-title'>Parent Page *</label>  
                        <input name ='hideParent' type='hidden' value='{!! $getParent !!}'>
                        <select name ="parent" class='form-control'>
                            <option disabled selected value='{!! $getParent !!}'>{!! $getParent !!}</option>
                            @foreach($getAllPages as $pages)
                            <option value="{{ $pages->id }}">{!! $pages->title !!}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="form-group no-margin-bottom">
                        <label for="page-url" class='form-title'>URL Key</label>
                        <div class="form-inline">
                            <div class="form-group" id ="nonEditableUrl">
                                <label>{!! URL::to('/site')!!}/</label>
                                <input type="text" name ="slug" class="form-control textbox--editable" value="{!! $pages['slug'] !!}" id="texturlkey" disabled>
                                <button id="edit" type="button" class="btn btn-reset">Edit</button>
                            </div>
                            <div class="form-group" id="editableUrl">
                                <label>{!! URL::to('/site')!!}/</label>
                                <input type="text" name="slug" class="form-control" value="{!! $pages['slug'] !!}" id="texturlkey">
                                <button id="cancel" type="button" class="btn btn-reset">cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <table id="example" class="table table-striped table--banner">
                            <thead>
                                <tr>
                                    <th>Banner</th>
                                    <th>ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($banners as $banner)
                                <tr>
                                    <td>{{ $banner->title}}</td>
                                    <td>{{ $banner->id}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td><em>Sample format:</em></td>
                                    <td>
                                        <em>
                                            <?php
                                            $str = "" . "?php " . "echo banner(n)" . " ?" . "";
                                            ?>
                                            {{ '<'.$str.'>' }}
                                        </em>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="editor1" class='form-title'>Content *</label>
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
                <!--                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked> Include Widget
                                    </label>
                                </div>-->
                <div class="main-container__content__info__options__action-holder btn-holder">
                    <button class="btn btn-reset" onclick = "cancel()">Cancel</button>
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
