<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#fileModal">
  Add Media
</button>

<div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Insert Media</h4>
      </div>
      <div class="modal-body">
        
          <div role="tabpanel">

            <!-- Nav tabs -->
            <ul id="myTab" class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#upload_file" aria-controls="upload_file" role="tab" data-toggle="tab">Upload Files</a></li>
              <li role="presentation"><a href="#media_library" aria-controls="media_library" role="tab" data-toggle="tab">Media Library</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="upload_file">

                  {!! Form::open(array('id'=>'upload', 'files'=>true)) !!}

                    <div class="control-group">
                      <div class="controls">
                      {!! Form::file('fileselect[]', array('multiple'=>true,'id'=>'fileselect')) !!}
                    <div id="filedrag">or drop files here</div>
                     </div>
                  </div>

                  {!! Form::close() !!}


              </div>
              <div role="tabpanel" class="tab-pane" id="media_library">

                  <div class="img_wrapper">
                          
                  </div>
              </div>
            </div>

          </div>



      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="insert">Insert File</button>
      </div>
    </div>
  </div>
</div>



<script>

$(document).ready(function(){

  populateImgLibrary();

  $('#insert').on('click',function(){
  var selected = new Array();
    $("input:checkbox[name=cbfiles]:checked").each(function() {
         selected.push($(this).val());
    });
    

 $.ajax({
        type: 'POST',
        url: '{!! URL::route("gallery") !!}',
        data: {'selected':selected},
        dataType:'json',
        success: (function(data){
          console.log(data);
          str="";
            for(x in data[0])
            {  var str ="";
                str +="<a href='#'><img src='../"+ data[0][x]['image_path']  +"'";
                if((data[0][x]['alternative_text']) != "null"){
                str +="alt = '"+data[0][x]['alternative_text']+"'";
                }
                str +="/></a>";
              CKEDITOR.instances['Editor1'].insertHtml(str);
            //  str += "<a href='#'><img src='../"+ data[0][x]['image_path']  +"' style='height:100px;width:100px' alt = '"+data[0][x]['alternative_text']+"'/></a>";;
            }  
            $('#fileModal').modal("hide");  
           // insertIntoCkeditor(str);    
        })
      });


  });

});

function insertIntoCkeditor(str){
    CKEDITOR.instances['Editor1'].insertText(str);
}

function DoneUpload() {
  populateImgLibrary();
  $('#myTab a[href="#media_library"]').tab('show');
}

function populateImgLibrary()
{
  $('.img_wrapper').empty();
  str ="";
  $.post(
    '{!! URL::route("getAll") !!}',
    {
        "_token": $( this ).find( 'input[name=_token]' ).val()
    },
    function( data ) {
      for(x in data[0])
      {
      str +='<div class="div_img">'
      str +='<input type="checkbox" name="cbfiles" value="'+ data[0][x]['image_id'] +'"><img class="_img" src="../' + data[0][x]['image_path'] + '" style="height:100px;width:100px"/></input>'
      str +='</div>'
      }
      $('.img_wrapper').append(str);
    },
      'json'
  );
}

function FileSelectHandler(e) {

  FileDragHover(e);

  var files = e.target.files || e.dataTransfer.files;

  var form = document.getElementById('upload');
  var formData = new FormData();
  for (var i = 0, f; f = files[i]; i++) {

    formData.append('fileselect[]',f); 
    formData.append('file', f);
  }
  $('[name=_token').val();
  var xhr = new XMLHttpRequest();
  xhr.open('POST', '{!! URL::route("media.store") !!}',true);
  xhr.onload = function () {
    if (xhr.status === 200) {
      DoneUpload();
    } else {
      console.log('Error');
    }
  };
    formData.append("_token", $('[name=_token').val());
  xhr.send(formData);
}

</script>

{!! HTML::script('js/upload_tool.js') !!}