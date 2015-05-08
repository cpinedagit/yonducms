 
/******* NAVIGATION TOGGLE BUTTON *******/
$('#nav-toggle').click(function(){
   $('.main-container__navigation-container').toggleClass('nav-hide');
    
    /** check if navigation container has no nav-hide class **/
    if(!$('.main-container__navigation-container').hasClass('nav-hide')){
        
        /** if yes, wait for 300 millisecons then fade in the navigation label **/
        setTimeout(function(){
           $('.main-container__navigation-container__navigation__nav-list > li > a > span').fadeIn(); 
        },150)
        
    }else{
        
        /** if no, hide the navigation label **/
        $('.main-container__navigation-container__navigation__nav-list > li > a > span').hide(); 
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
    
})