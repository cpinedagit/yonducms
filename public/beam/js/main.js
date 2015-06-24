setTimeout(function(){
    $('.schedule__list.slick-vertical .slick-slide').each(function(){
        $(this).click(function(){
            var element = $(this);
            $('.schedule__list--active').removeClass('schedule__list--active');
            element.addClass('schedule__list--active');
        })
    })
   /* $(".slick-next,.slick-prev").click(function(){
        $('.schedule__list--active').removeClass('schedule__list--active');
    });*/
    
    var repetitionclick=0;
    $('.thumbnails .slick-slide').each(function(){
    
        $(this).on('click',function(){
            $('.modal-wrapper').fadeIn();
            $('body').addClass('adjustment-div');
            if(repetitionclick === 0){
                 $('.modal-slider').slick({
                      dots: false,
                      infinite: true,
                      speed: 300,
                      slidesToShow: 1,
                      centerMode: true,
                      adaptiveHeight: true
                  });
                repetitionclick++;
            }
            var eq=$(this).attr('data-slick-index');
            $('.modal-slider').slick('slickGoTo', parseInt(eq))
        });
    });
    
    $('.modal-close').click(function(){
        $(this).closest('.modal-wrapper').fadeOut();
        $('body').removeClass('adjustment-div');
    });
    
    /*$('.accordion-updates').on('show.bs.collapse', function () {
        $('.accordion-updates .panel-heading')
    })*/
    
    $('.accordion-updates .collapse').each(function(){
        $(this).on('show.bs.collapse', function () {
            $(this).prev().addClass('active');
        });
        $(this).on('hide.bs.collapse', function () {
            $(this).prev().removeClass('active');
        });
    });
    
    $('.contact-us-address-list li a').each(function(){
        $(this).click(function(){
            var element = this;
            var target = $(this).attr('data-target');
            $('.contact-us-address-list li.active').removeClass('active');
            
            $('.map-holder').removeClass('active');
            setTimeout(function(){
                 $('div[data-place="'+target+'"]').addClass('active');
                $(element).parent().addClass('active');
            },200);
           
        });   
    });
        
        $('a[data-toggle="modal"]').each(function(){
            $(this).on('click',function(){
                var target='#'+$(this).attr('data-target');
                $(target).fadeIn();
            });
        });
    
    $('.sched-main-time__day__dropdown').change(function(){
        var val=$(this).val();
        
        $('.sched-main-time__time__sched__list.active').removeClass('active');
        setTimeout(function(){
            $('#'+val).addClass('active');
        },200)
    })
    
    var d = new Date();
    var n = d.getDay() - 1;
    $(".sched-main-time__day__dropdown").prop('selectedIndex', n);
    setTimeout(function(){
         var val=$(".sched-main-time__day__dropdown").val();
        
        $('.sched-main-time__time__sched__list.active').removeClass('active');
        setTimeout(function(){
            $('#'+val).addClass('active');
        },200)
    },200);
   
        
   
},500);

