

(function ($) {
    // USE STRICT
    "use strict";

        /*[ Slick1 ]
        ===========================================================*/
        var itemSlick1 = $('.slick1').find('.item-slick1');
        var action1 = [];
        var action2 = [];
        var action3 = [];
        var cap1Slide1 = [];
        var cap2Slide1 = [];
        var btnSlide1 = [];

        for(var i=0; i<itemSlick1.length; i++) {
          cap1Slide1[i] = $(itemSlick1[i]).find('.caption1-slide1');
          cap2Slide1[i] = $(itemSlick1[i]).find('.caption2-slide1');
          btnSlide1[i] = $(itemSlick1[i]).find('.wrap-btn-slide1');
        }


        $('.slick1').on('init', function(){

            action1[0] = setTimeout(function(){
                $(cap1Slide1[0]).addClass($(cap1Slide1[0]).data('appear') + ' visible-true');
            },200);

            action2[0] = setTimeout(function(){
                $(cap2Slide1[0]).addClass($(cap2Slide1[0]).data('appear') + ' visible-true');
            },1000);

            action3[0] = setTimeout(function(){
                $(btnSlide1[0]).addClass($(btnSlide1)[0].data('appear') + ' visible-true');
            },1800);              
        });




        $('.testimonials').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
                rtl:true,
            fade: false,
            dots: false,
            appendDots: $('.wrap-testimonials'),
            dotsClass:'slick1-dots',
            infinite: true,
            autoplay: true,
            autoplaySpeed: 6000,
            arrows: true,
            appendArrows: $('.wrap-testimonials'),
            prevArrow:'<button class="arrow-slick1 prev-slick1"><i class="fa  fa-angle-left" aria-hidden="true"></i></button>',
            nextArrow:'<button class="arrow-slick1 next-slick1"><i class="fa  fa-angle-right" aria-hidden="true"></i></button>',  
                });


        $('.testimonials').slick({
            rtl:true,
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            adaptiveHeight: true,
        });

       


        $('.slick1').on('afterChange', function(event, slick, currentSlide){ 
            for(var i=0; i<itemSlick1.length; i++) {

              clearTimeout(action1[i]);
              clearTimeout(action2[i]);
              clearTimeout(action3[i]);


              $(cap1Slide1[i]).removeClass($(cap1Slide1[i]).data('appear') + ' visible-true');
              $(cap2Slide1[i]).removeClass($(cap2Slide1[i]).data('appear') + ' visible-true');
              $(btnSlide1[i]).removeClass($(btnSlide1[i]).data('appear') + ' visible-true');

            }

            action1[currentSlide] = setTimeout(function(){
                $(cap1Slide1[currentSlide]).addClass($(cap1Slide1[currentSlide]).data('appear') + ' visible-true');
            },200);

            action2[currentSlide] = setTimeout(function(){
                $(cap2Slide1[currentSlide]).addClass($(cap2Slide1[currentSlide]).data('appear') + ' visible-true');
            },1000);

            action3[currentSlide] = setTimeout(function(){
                $(btnSlide1[currentSlide]).addClass($(btnSlide1)[currentSlide].data('appear') + ' visible-true');
            },1800);            
        });



      
         /*[ Slick4 ]
        ===========================================================*/
        $('.slick4').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            autoplay: false,
            autoplaySpeed: 6000,
            adaptiveHeight: true,
            arrows: true,
            rtl:true,
            appendArrows: $('.wrap-slick4'),
            prevArrow:'<button class="arrow-slick2 prev-slick2"><i class="fa  fa-angle-left" aria-hidden="true"></i></button>',
            nextArrow:'<button class="arrow-slick2 next-slick2"><i class="fa  fa-angle-right" aria-hidden="true"></i></button>',  
            responsive: [
                {
                  breakpoint: 1200,
                  settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                  }
                },
                {
                  breakpoint: 992,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                  }
                },
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 576,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
            ]    
        });

          /*[ Slick5 ]
        ===========================================================*/
        $('.slick5').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            autoplay: false,
            autoplaySpeed: 6000,
            adaptiveHeight: true,
            arrows: true,
            rtl:true,
            appendArrows: $('.wrap-slick5'),
            prevArrow:'<button class="arrow-slick2 prev-slick2"><i class="fa  fa-arrow-left" aria-hidden="true"></i></button>',
            nextArrow:'<button class="arrow-slick2 next-slick2"><i class="fa  fa-arrow-right" aria-hidden="true"></i></button>',  
            responsive: [
                {
                  breakpoint: 1200,
                  settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4
                  }
                },
                {
                  breakpoint: 992,
                  settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                  }
                },
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                  }
                },
                {
                  breakpoint: 576,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
            ]    
        });



         /*[ Slick5 ]
        ===========================================================*/
        $('.slick7').slick({
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            autoplay: false,
            autoplaySpeed: 6000,
            adaptiveHeight: true,
            arrows: true,
            rtl:true,
            appendArrows: $('.wrap-slick7'),
            prevArrow:'<button class="arrow-slick2 prev-slick2"><i class="fa  fa-arrow-left" aria-hidden="true"></i></button>',
            nextArrow:'<button class="arrow-slick2 next-slick2"><i class="fa  fa-arrow-right" aria-hidden="true"></i></button>',  
            responsive: [
                {
                  breakpoint: 1200,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                },
                {
                  breakpoint: 992,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                },
                {
                  breakpoint: 768,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                },
                {
                  breakpoint: 576,
                  settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                  }
                }
            ]    
        });


        




         $('.slick6').slick({
            slidesToShow: 5,
            slidesToScroll: 5,
            infinite: true,
            autoplay: false,
            autoplaySpeed: 6000,
            arrows: true,
            appendArrows: $('.wrap-slick6'),
            prevArrow:'<button class="arrow-slick2 prev-slick2"><i class="fa  fa-angle-left" aria-hidden="true"></i></button>',
            nextArrow:'<button class="arrow-slick2 next-slick2"><i class="fa  fa-angle-right" aria-hidden="true"></i></button>'
            });


   $(".center").slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay:true,
        arrows:true,
        centerMode:true,
        arrows: true,
            appendArrows: $('.main-slider'),
            prevArrow:'<button class="arrow-slick2 prev-slick2"><i class="ti-arrow-left" aria-hidden="true"></i></button>',
            nextArrow:'<button class="arrow-slick2 next-slick2"><i class="ti-arrow-right" aria-hidden="true"></i></button>'
       
      });
      
})(jQuery);

