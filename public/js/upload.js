
function $id(id) {
	return document.getElementById(id);
}


function Output(msg) {
	var m = $id("messages");
	m.innerHTML = msg + m.innerHTML;
}

if (window.File && window.FileList && window.FileReader) {
	Init();
}

function Init() {

	var fileselect = $id("fileselect"),
		filedrag = $id("filedrag"),
		submitbutton = $id("submitbutton");

	fileselect.addEventListener("change", FileSelectHandler, false);

	var xhr = new XMLHttpRequest();
	if (xhr.upload) {
	
		filedrag.addEventListener("dragover", FileDragHover, false);
		filedrag.addEventListener("dragleave", FileDragHover, false);
		filedrag.addEventListener("drop", FileSelectHandler, false);
		filedrag.style.display = "block";
		
	}

}

function FileDragHover(e) {
	e.stopPropagation();
	e.preventDefault();
	e.target.className = (e.type == "dragover" ? "hover" : "");
}

function readURL2(input,lengthfile) {
    //if (input.files && input.files[0]) {
        for ( var x=0; x < lengthfile; x++){
            (function(file) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    
                    var uploadphotocontainer = $("<div>",{class:"main-container__content__info__photo__uploaded-photo-container uploaded-photo-container-multiple hide-before"});
                    /*var i = $("<i>",{class:"fa fa-times-circle show delete-multiple"});*/
                    var image = $("<img>",{id:"blah", src:e.target.result, alt:"your image"}).css("display","inline");
                    $(uploadphotocontainer).append(image) 
                    $('.uploadfiles-multiple').append(uploadphotocontainer);
                    //$('').append(uploadphotocontainer);
                }
                reader.readAsDataURL(input.files[x]);
            })(input.files[x]);
        }
   // }
}

function FileSelectHandler(e) {
    $('.uploadfiles-multiple .main-container__content__info__photo__uploaded-photo-container').each(function(){
        $(this).remove();
    });
    
	FileDragHover(e);
    
    readURL2(fileselect,fileselect.files.length);
  
	var files = e.target.files || e.dataTransfer.files;

	var form = document.getElementById('upload');
	var formData = new FormData();
	for (var i = 0, f; f = files[i]; i++) {
		
		  filename = f.name;
		  var ext =  filename.split('.').pop();

		  if(formats.indexOf(ext) < 0)
		  {
		  	alert("file type error");
		  }
		  else
		  {
		  		filesize = f.size;
		    	filesize = filesize/1024/1024;
		    	if(filesize > default_size)
		    	{
		    		alert("cant upload file size is over "+default_size+"MB");
		    		break;
		    	}
		    	else
		    	{
			      	formData.append('fileselect[]',f); 
					ParseFile(f);
					formData.append('file', f);		    		
		    	}
		  }
		
	}
	$('[name=_token').val();
	var xhr = new XMLHttpRequest();
	xhr.open('POST', form.action,true);
	xhr.onload = function () {
    if (xhr.status === 200) {
      console.log("ok");
    } else {
      console.log('Error');
    }
  };
  	formData.append("_token", $('[name=_token').val());
	xhr.send(formData);

	}

function ParseFile(file) {

	Output(
		"<p>File information: <strong>" + file.name +
		"</strong> type: <strong>" + file.type +
		"</strong> size: <strong>" + file.size +
		"</strong> bytes</p>"
	);
	
}