setTimeout(function(){
    $('.schedule__list.slick-vertical .slick-slide').each(function(){
        $(this).click(function(){
            var element = $(this);
            $('.schedule__list--active').removeClass('schedule__list--active');
            element.addClass('schedule__list--active');
        })
    })
    $(".slick-next,.slick-prev").click(function(){
        $('.schedule__list--active').removeClass('schedule__list--active');
    });
},500);
