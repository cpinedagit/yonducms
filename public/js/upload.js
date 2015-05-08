
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

function FileSelectHandler(e) {

	FileDragHover(e);

	var files = e.target.files || e.dataTransfer.files;

	var form = document.getElementById('upload');
	var formData = new FormData();
	for (var i = 0, f; f = files[i]; i++) {

		formData.append('fileselect[]',f); 
		ParseFile(f);
		formData.append('file', f);
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