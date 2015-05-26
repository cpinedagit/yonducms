 
/******* NAVIGATION TOGGLE BUTTON *******/
$('#nav-toggle').click(function(){
   $('.main-container__navigation-container').toggleClass('nav-hide');
    /** check if navigation container has no nav-hide class **/
    if(!$('.main-container__navigation-container').hasClass('nav-hide')){
        /** if yes, wait for 300 millisecons then fade in the navigation label **/
        setTimeout(function(){
           $('.main-container__navigation-container__navigation__nav-list > li > a > span').fadeIn(); 
            $('.main-container__navigation-container__welcome__name').fadeIn(); 
        },150)
    }else{ 
        /** if no, hide the navigation label **/
        $('.main-container__navigation-container__navigation__nav-list > li > a > span').hide(); 
        $('.main-container__navigation-container__welcome__name').hide(); 
    }
   $('.open').removeClass('open');
});

/******* EXPAND SUBMENU *******/
$('.main-container__navigation-container__navigation__nav-list > li').each(function(){
    var lielement = $(this);
    lielement.click(function(event){    
        /** check if clicked target is a main menu ***/
        if(!$(event.target).closest('ul').hasClass('main-container__navigation-container__navigation__nav-list')){
             if(event.target.nodeName === "LI"){
                window.location = $(event.target).children('a').attr('href')
            }
        }
    }); 
});


/******* CHECK/UNCHECK CHECKBOX *******/
$('#selecctall').click(function(event) {  //on click 
    if(this.checked) { // check select status
        $('.table--data tr td:first-child input[type="checkbox"]').each(function() { //loop through each checkbox
            this.checked = true;  //select all checkboxes with class "checkbox1"               
        });
    }else{
        $('.table--data tr td:first-child input[type="checkbox"]').each(function() { //loop through each checkbox
            this.checked = false; //deselect all checkboxes with class "checkbox1"                       
        });         
    }
});
$('#selecctall-banner').click(function(event) {  //on click 
    if(this.checked) { // check select status
        $('.banner-content-list li input[type="checkbox"]').each(function() { //loop through each checkbox
            this.checked = true;  //select all checkboxes with class "checkbox1"               
        });
    }else{
        $('.banner-content-list li input[type="checkbox"]').each(function() { //loop through each checkbox
            this.checked = false; //deselect all checkboxes with class "checkbox1"                       
        });         
    }
});


/******* ACTION LIST *******/
$('.action>i').each(function(){
    $(this).click(function(){
        var element = $(this);
        
        if(element.parent().hasClass('open-action')){
           $('.action.open-action').removeClass('open-action');  
        }else{
            $('.action.open-action').removeClass('open-action');
        
            setTimeout(function(){
                element.parent('.action').toggleClass('open-action')
            },100)
        };
    });
});



/******* FILTER DROPDOWN *******/
$('.main-container__content__info__search__dropdown').change(function(){
    var choice = $(this).val();
    
    $('.main-container__content__info__search__option:visible').fadeOut(function(){
        $('#'+choice).fadeIn(function(){
            $('#'+choice).removeClass('hide')
        });
    });
})




/******* CHECK ALL SUB MODULES *******/
$('.editaccesscontrol__content__modules-list > li input[type="checkbox"]').change(function(e){
    e.stopPropagation();
    if(this.checked) { 
       $(this).parent('label').siblings('.sub-module_container').find('.sub-module_list > li input[type="checkbox"]').each(function(){
           $(this).prop('checked',true);
       });
    }else{
        $(this).parent('label').siblings('.sub-module_container').find('.sub-module_list > li input[type="checkbox"]').each(function(){
           $(this).prop('checked',false);
       });         
    }
});




/******* CHECK MAIN MODULES *******/
$('.sub-module_list > li input[type="checkbox"]').each(function(){
    $(this).change(function(e){
         e.stopPropagation();
        if(this.checked) { 
           $(this).parents('.sub-module_list').parent().siblings('label').find('input[type="checkbox"]').prop('checked',true);
        }else{
            if($(this).parents('.sub-module_list').find('input[type="checkbox"]:checked').length === 0){
                $(this).parents('.sub-module_list').parent().siblings('label').find('input[type="checkbox"]').prop('checked',false);   
            }
        }
    });
})


/******* UPLOAD PHOTO AND PREVIEW *******/
function readURL(input) {
    if (input.files && input.files[0]) {
        var extension = input.files[0].name.split('.').pop().toLowerCase();  //file extension from input file
        if (formats.indexOf(extension) > -1) {
            if(((input.files[0].size)/1024/1024) > default_size){
                
                alert("cant upload file size is over "+default_size+"MB");
                $('.upload-image-container__upload > .fa').hide().removeClass('show');
                $("#imgInp").val('').show().removeClass('hide');
                $('.file-type').text("");
                $('.file-size').text("");
                $('.file-dimension').text("");
            }
            else
            {
                 var reader = new FileReader();
                $('#blah').show();
                $('.upload-image-container__upload > .fa').show();
                reader.onload = function (e) {
                    $('#blah').attr('src', e.target.result);
                }
                $("#imgInp").hide();
                reader.readAsDataURL(input.files[0]);
            }
        }
        else
        {
            alert("file type error");
            $('.upload-image-container__upload > .fa').hide().removeClass('show');
            $("#imgInp").val('').show().removeClass('hide');
            $('.file-type').text("");
            $('.file-size').text("");
            $('.file-dimension').text("");

        }
    }
}

function readImage(file) {

    var reader = new FileReader();
    var image  = new Image();

    reader.readAsDataURL(file);  
    reader.onload = function(_file) {
        image.src    = _file.target.result;              // url.createObjectURL(file);
        image.onload = function() {
            var w = this.width,
                h = this.height,
                t = file.type.split('/')[1],                           // ext only: // file.type.split('/')[1],
                n = file.name,
                s = ((file.size/1024).toFixed(1)) +' kb';
                $('.file-type').text(t);
                $('.file-size').text(s);
                 $('#page-title').val(n);
                $('.file-dimension').text(w+'x'+h);
            console.log(w+'x'+h+' '+s+' '+t+' '+n);
        };
        image.onerror= function() {
            alert('Invalid file type: '+ file.type);
        };      
    };

}

$("#imgInp").change(function(){
    readURL(this);
    var F = this.files;
    if(F && F[0]) for(var i=0; i<F.length; i++){
        readImage( F[i] );
    }
});

$('#deleteimage').click(function(){
    $('#blah').attr('src','').hide().removeClass('show');
    $('.upload-image-container__upload > .fa').hide().removeClass('show');
    $("#imgInp").val('').show().removeClass('hide');
    $('.file-type').text("");
    $('.file-size').text("");
    $('.file-dimension').text("");
})
   
$('#editurlkey').click(function(){
    if($('#texturlkey').attr("disabled")){
        $('#texturlkey').toggleClass('textbox--editable').removeAttr("disabled");
        $('#editurlkey').text('Done');
    }else{
        $('#texturlkey').toggleClass('textbox--editable').attr("disabled",true);
        $('#editurlkey').text('Edit');
    }
    
});
