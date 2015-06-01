@extends('cms.home')
@section('title')
<h2>Editor</h2>
@stop
@section('content')
<div class='main-container__content__info'>
    <div class="row">
        <div class="col-sm-9">
            <div class="form-group">
                <label for="edit-themes" class='form-title'>Edit Themes</label>
                {!! Form::open(array('url' => 'cms/editor/updateFile','method' => 'post')) !!}
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <textarea id='textarea' class="form-control editor-textarea" name="content" cols="100" rows="30"></textarea>
                <input id ='hidden' name ='hidden' type='hidden' value=''><br><br><br>
                <input id ='update' class="btn btn-add" type ="submit" value = "Update file" class = "btn btn-success">
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
                @foreach($parents as $parent)                <ul class=mtree>
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
    </div>
    <!-- MODAL -->
    {!! Form::open(array('id' => 'addFolderForm')) !!}
    <div class="modal fade" id="add-folder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content modal-content--changepassword">
                <div class="modal-header modal-header--changepassword">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add Folder</h4>
                </div>
                <div class="modal-body modal-body--changepassword">
                    <div class="form-group">
                        <label for="folder-name" class='form-title'>Folder Name</label>
                        <input name ='foldername' type="text" class="form-control" id="folder-name" placeholder="Enter folder name">
                        {!! Form::hidden('path',null,['id' => 'dataPath']) !!}
                        {!! Form::hidden('parent',null,['id' => 'dataParent']) !!}
                    </div>
                </div>
                <div class="modal-footer modal-footer--changepassword">
                    <button type="button" class="btn btn-add center-block" id='add-folder-action'>Add</button>
                </div>
            </div>
        </div>
    </div>
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

    $('.a').on('click', '', function (e) {
        var filename = this.id;
        $.get('../' + filename, function (data)//Remember, same domain
        {
            var _data = data;
            $('#textarea').val(data);
            $('#hidden').val(filename);
        });

    });

//    $(document).on('click', '#css', function () {
//        var name = prompt('Please enter the folder name:');
//        var path = $(this).attr('data-path');
//        var parent = $(this).attr('data-parent');
//        if (name !== null) {
//            $.ajax({
//                type: 'get',
//                url: 'editor/addFolder',
//                data: {name: name, path: path, parent: parent},
//                dataType: 'json',
//                success: (function (data) {
//                    location.reload();
//                })
//
//            });
//        }
//    });
//
//    $(document).on('click', '#site', function () {
//        var name = prompt('Please enter the folder name:');
//        var path = $(this).attr('data-path');
//        var parent = $(this).attr('data-parent');
//        if (name !== null) {
//            $.ajax({
//                type: 'get',
//                url: 'editor/addFolder',
//                data: {name: name, path: path, parent: parent},
//                dataType: 'json',
//                success: (function (data) {
//                    location.reload();
//                })
//
//            });
//        }
//    });

</script>
@stop