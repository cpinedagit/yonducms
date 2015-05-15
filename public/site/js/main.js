/******** TOGGLE NAVIGATION *********/
$('#togglenav').click(function(){
   $('.masthead-nav').toggleClass('open'); 
});




/******** MINIFY HEADER WHEN SCROLL *********/
$(window).scroll(function(){
    var window_top = $(window).scrollTop();
    console.log(window_top)
  /*  $('.masthead--custom').height()*/
   if(window_top >= 60){
        $('.masthead--custom').addClass('minified');
    }else if(window_top === 0){
      $('.masthead--custom').removeClass('minified');                  
    }
                                        
});
