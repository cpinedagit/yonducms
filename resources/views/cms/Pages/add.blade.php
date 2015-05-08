<html>
    <head>
        <title>Page Management</title>
        <meta charset="utf-8">
        <script language="javascript" type="text/javascript">
            editAreaLoader.init({
                id: "textarea_1"		// textarea id
                , syntax: "css"			// syntax to be uses for highgliting
                , start_highlight: true		// to display with highlight mode on start-up
            });
        </script>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>
        <link rel="stylesheet" type="text/css" href="../public/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../public/css/mystyle.css">
        <script type="text/javascript" src ="../public/js/jquery.js"></script>  
        {!! HTML::script('ckeditor/ckeditor.js') !!}
    </head>
    <body>
        <ul class="nav nav-pills nav-tabs">
            <li role="presentation">{!! HTML::link('Editor', 'Code Editor') !!}</li>
            <li role="presentation">{!! HTML::link('Banners','Banners') !!}</li>
            <li role="presentation"  class='active'>{!! HTML::link('Pages','Page Management') !!}</li> 
            <li role="presentation">{!! HTML::link('frontEnd','Front End',['target' => '_blank']) !!}</li>      
        </ul>    
        <div id ='border'>
            {!! Form::open(array('url' => 'Pages', 'method' => 'post')) !!}
            @if(isset($id))
            <input name ='id' type ="hidden" value ='{!! ++$id !!}'>
            @endif
            {!! Form::text('page',null,['name' => 'title','class' => 'form-control','placeholder' => 'Enter title here']) !!}
            {!! Form::textarea('editor1',null,['cols' => '100','rows' => '10']) !!}
            {!! Form::submit('Publish',['class' => 'btn btn-default marginTop']) !!}
            {!! Form::close() !!}
        </div>
    </body>
</html>


<script>
            // Replace the <textarea id="editor1"> with an CKEditor instance.
            CKEDITOR.replace('editor1', {
                on: {
                    focus: onFocus,
                    blur: onBlur,
                    // Check for availability of corresponding plugins.
                    pluginsLoaded: function (evt) {
                        var doc = CKEDITOR.document, ed = evt.editor;
                        if (!ed.getCommand('bold'))
                            doc.getById('exec-bold').hide();
                        if (!ed.getCommand('link'))
                            doc.getById('exec-link').hide();
                    }
                }
            });



// The instanceReady event is fired, when an instance of CKEditor has finished
// its initialization.
            CKEDITOR.on('instanceReady', function (ev) {
                // Show the editor name and description in the browser status bar.
                document.getElementById('eMessage').innerHTML = 'Instance <code>' + ev.editor.name + '<\/code> loaded.';

                // Show this sample buttons.
                document.getElementById('eButtons').style.display = 'block';
            });

            function InsertHTML() {
                // Get the editor instance that we want to interact with.
                var editor = CKEDITOR.instances.editor1;
                var value = document.getElementById('htmlArea').value;

                // Check the active editing mode.
                if (editor.mode == 'wysiwyg')
                {
                    // Insert HTML code.
                    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertHtml
                    editor.insertHtml(value);
                }
                else
                    alert('You must be in WYSIWYG mode!');
            }

            function InsertText() {
                // Get the editor instance that we want to interact with.
                var editor = CKEDITOR.instances.editor1;
                var value = document.getElementById('txtArea').value;

                // Check the active editing mode.
                if (editor.mode == 'wysiwyg')
                {
                    // Insert as plain text.
                    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-insertText
                    editor.insertText(value);
                }
                else
                    alert('You must be in WYSIWYG mode!');
            }

            function SetContents() {
                // Get the editor instance that we want to interact with.
                var editor = CKEDITOR.instances.editor1;
                var value = document.getElementById('htmlArea').value;

                // Set editor contents (replace current contents).
                // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-setData
                editor.setData(value);
            }

            function GetContents() {
                // Get the editor instance that you want to interact with.
                var editor = CKEDITOR.instances.editor1;

                // Get editor contents
                // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-getData
                alert(editor.getData());
            }

            function ExecuteCommand(commandName) {
                // Get the editor instance that we want to interact with.
                var editor = CKEDITOR.instances.editor1;

                // Check the active editing mode.
                if (editor.mode == 'wysiwyg')
                {
                    // Execute the command.
                    // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-execCommand
                    editor.execCommand(commandName);
                }
                else
                    alert('You must be in WYSIWYG mode!');
            }

            function CheckDirty() {
                // Get the editor instance that we want to interact with.
                var editor = CKEDITOR.instances.editor1;
                // Checks whether the current editor contents present changes when compared
                // to the contents loaded into the editor at startup
                // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-checkDirty
                alert(editor.checkDirty());
            }

            function ResetDirty() {
                // Get the editor instance that we want to interact with.
                var editor = CKEDITOR.instances.editor1;
                // Resets the "dirty state" of the editor (see CheckDirty())
                // http://docs.ckeditor.com/#!/api/CKEDITOR.editor-method-resetDirty
                editor.resetDirty();
                alert('The "IsDirty" status has been reset');
            }

            function Focus() {
                CKEDITOR.instances.editor1.focus();
            }

            function onFocus() {
                document.getElementById('eMessage').innerHTML = '<b>' + this.name + ' is focused </b>';
            }

            function onBlur() {
                document.getElementById('eMessage').innerHTML = this.name + ' lost focus';
            }
</script>