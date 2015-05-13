 
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
       
         
        /*element.toggleClass('show');
        element.siblings('.action-list').toggleClass('show');*/
    });
});
    
