@extends('cms.home')
@section('title')
<h2>Editor</h2>
@stop
@section('content')
 <div class="alert alert-success hidden" role="alert">File has been saved. <div class="glyphicon glyphicon-remove" id="close-symbol"> </div> </div>

<div class='main-container__content__info'>
    <div class="row">
        <div class="col-sm-9">
            <div class="form-group">
                <label for="edit-themes" class='form-title'>Edit Themes</label>
                {!! Form::open(array('url' => 'cms/editor/updateFile','method' => 'post')) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <article></article>
                <input name ='content' type='hidden' value=''>
                <input id ='hidden' name ='hidden' type='hidden' value=''> <br/>
                <input id ='update' class="btn btn-add" type="button" value="Update File" class="btn btn-success">
                {!! Form::close() !!}
            </div>
        </div>
        <div class="col-sm-3">
            <div class="main-container__content__info__photo main-container__content__info__photo--editor">
                {!! Form::open(array('files' => 'true', 'method' => 'POST', 'url' => 'cms/editor/addEditorFile')) !!}
                <div class="form-group editor-action-holder">      

                    <select name="" id="folder-selector" class="form-control ">
                        <option value="" disabled selected>Select Main Folder</option>
                        @foreach($parents as $parent)
                        <option value ="{{ $parent->id }}">{!! $parent->name !!}</option>
                        @endforeach
                    </select>


                    @foreach($parents as $parent)
                    <select name="path_{{$parent->id}}" id="{{ $parent->id }}" class="form-control folder-drop">
                        <option value="{{ $parent->path }}">root/</option>
                        @foreach(children($parent->id) as $child)
                        <option value="{{ $child->path }}">{!! $child->name !!}</option>
                        @endforeach
                    </select>
                    @endforeach


                    <input type="file" name='file' id="added-file" class="folder-drop">
                    <input type="submit" class="btn btn-add center-block folder-drop" id="add-file" value="Upload File">
                </div>
                {!! Form::close() !!}
                @foreach($parents as $parent)          
                      <ul class=mtree>
                    <li class="has-submenu" data-folder='js'>
                        <a href="#">{{ $parent->name}} </a>
                        <button type="button" class="btn fa fa-plus pull-right btn-add-folder" data-path ='{{ $parent->path }}' data-parent='{{$parent->id}}' data-toggle="modal" data-target="#add-folder"></button>
                        <ul>
                            <?php $folderFiles = File::files($parent->path) ?> 
                            @foreach($folderFiles as $files)
                            <li>                           
                                <a class="a" data-ext ='{!! File::name($files) !!}' id ='{!! $files !!}' style="cursor: pointer;">{!! File::name($files) !!}.{!! File::extension($files) !!}</a>                                
                                <input id ="ext" type='hidden' value ="{!! File::extension($files) !!}">
                            </li>
                            @endforeach
                            <?php $directories = File::directories($parent->path); ?>
                            @foreach($directories as $dir)
                            @if(File::isDirectory($dir))
                            <li class="has-submenu" data-folder='plugins'><a href="#">{!! basename($dir) !!}</a>
                                <?php $files = File::files($parent->path . '/' . basename($dir)); ?>
                                <ul>
                                    @foreach($files as $file)
                                    <li style="margin-left:10px;">                           
                                        <a class="a" id ='{!! $file !!}' style='cursor: pointer;'>{!! File::name($file) !!}.{!! File::extension($file) !!}</a>
                                        <input id ="ext2" type='hidden' value ="{!! File::extension($file) !!}">
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </li>
                </ul>
                @endforeach
            </div>
    </div>
                       
    <div class="modal fade" id="add-folder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-content--changepassword">
                <div class="modal-header modal-header--changepassword">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Folder</h4>
                </div>
        <div class="modal-dialog">
            <div class="modal-content modal-content--changepassword">
                <div class="modal-header modal-header--changepassword">
                    <h4 class="modal-title" id="myModalLabel">Add Folder</h4>
                </div>
                    <div class="tab-content">
                            <div class="form-group">
                                <label for="folder-name" class='form-title'>Folder Name</label>
                                <input name ='foldername' type="text" class="form-control" id="folder-name" placeholder="Enter folder name">
                                {!! Form::hidden('path',null,['id' => 'dataPath']) !!}
                                {!! Form::hidden('parent',null,['id' => 'dataParent']) !!}
                                <button type="button" class="btn btn-add center-block" id='add-folder-action'>Add</button>
            </div>
        </div>
                            <div class="form-group">
                                {!! Form::file('') !!}
                                {!! Form::text('path') !!}
    </div>   
                        </div>
</div>
{!! Form::open(array('action' => 'EditorController@addFile','files' => 'true', 'method' => 'post')) !!}
<select name ="path" style ="margin-left:700px;margin-top:20px;width:300px;" class="form-control">
        </div>
</select>
    {!! Form::close() !!} 
</div>
<script>

    $(document).on("click", '.btn-add-folder', function () {
        var parent = $(this).attr('data-parent');
        var path = $(this).attr('data-path');
        $('#dataParent').val(parent);
        $('#dataPath').val(path);
    });

    $(document).on('click', '#add-folder-action', function () {
        var form = $('form#addFolderForm').serialize();
        $.ajax({
            type: 'get',
            url: 'editor/addFolder',
            data: form,
            dataType: 'json',
            success: (function (data) {
                location.reload();
            })

        });
    });

    //Intialize the CodeMirror
    $('document').ready(function(){

        var code_mirror = CodeMirror(document.body.getElementsByTagName("article")[0], {
                  value: "Welcome to {{ env('APP_TITLE') }} editor!",
                  lineNumbers: true,
                  mode: "javascript",
                  keyMap: "sublime",
                  autoCloseBrackets: true,
                  matchBrackets: true,
                  showCursorWhenSelecting: true,
                  theme: "monokai"
        });


        $('.a').on('click', '', function (e) {
            $('.alert-success').addClass('hidden');
            var filename = this.id;
            
            $.ajax({
                    type:'POST',
                    url: "{{ URL().'/cms/editor/readFile' }}",
                    data: {
                        '_token':   $('[name=_token]').val(),
                        'file_dir': filename 
                    },
                    dataType: 'json',
                    success: function (data) {
                        var value='';
                        for(x in data)
                            value += data[x]; 

                        code_mirror.setValue(value); //Set code_mirror value
                        $('#hidden').val(filename); //Set file name to form
                        $('.form-title').html("Edit Themes: "+filename); //Set file name in the editor header
                    },error: function () { 
                        // if error occured
                        alert("Error: try again");
                    }
            });
        });

        //Update file using AJAX
        $('#update').on('click', function(){
            $.ajax({
                    type: 'POST',
                    url: "{{ URL().'/cms/editor/updateFile' }}",
                    data: {
                            'hidden': $('#hidden').val(), 
                            '_token': $('[name=_token]').val(),
                            'content': code_mirror.getValue()
                    },
                    success: function () {
                         $('.alert-success').removeClass('hidden');
                    },error: function () { 
                        // if error occured
                        alert("Error: try again");
                    }
            });
        }); 
    });   

    //Close message alert when click close
    $('#close-symbol').on('click', function(){
        $('.alert-success').addClass('hidden');
    });

</script>
@stop