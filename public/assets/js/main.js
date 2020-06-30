(function ($) {
"use strict";

/*------------------------------------
    01. Sticky Menu
-------------------------------------- */
    var windows = $(window);
    var stick = $(".header-sticky");
	windows.on('scroll',function() {
		var scroll = windows.scrollTop();
		if (scroll < 245) {
			stick.removeClass("sticky");
		}else{
			stick.addClass("sticky");
		}
	});

/*------------------------------------
    02. Last 2 li child add class
-------------------------------------- */
    $('ul.menu>li').slice(-2).addClass('last-elements');

/*------------------------------------
    03. jQuery MeanMenu
-------------------------------------- */
	$('.main-menu nav').meanmenu({
		meanScreenWidth: "991",
		meanMenuContainer: '.mobile-menu'
	});

/*-------------------------------------
    04. MagnificPopup
--------------------------------------- */


    $('.img-popup').magnificPopup({
        type: 'image',
        gallery:{
            enabled:true
        }
    });
     $('.video-popup').magnificPopup({
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        zoom: {
            enabled: true,
        }
    });

/*---------------------------------
    05. Countdown
----------------------------------- */
    $('[data-countdown]').each(function() {
        var $this = $(this), finalDate = $(this).data('countdown');
        $this.countdown(finalDate, function(event) {
        $this.html(event.strftime('<div class="count-column"><div class="cdown days">Days<span class="counting">%-D</span></div></div><div class="count-column"><div class="cdown hours">Hours<span class="counting">%-H</span></div></div><div class="count-column"><div class="cdown minutes">Minutes<span class="counting">%M</span></div></div><div class="count-column"><div class="cdown seconds">Seconds<span class="counting">%S</span></div></div>'));
        });
    });

/*----------------------------------------
    06. Owl Carousel
---------------------------------------- */
/*----------------------------------------
    Slider Carousel
---------------------------------------- */
    $('.slider-wrapper').owlCarousel({
        loop:true,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 2500,
        items:1,
        nav:true,
        navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
        dots:false
    });
/*----------------------------------------
    Event Carousel
---------------------------------------- */
    $('.events-carousel').owlCarousel({
        loop:true,
        items:2,
        nav:false,
        navText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsive:{
            0:{
                items:1
            },
            480:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            },
            1200:{
                items:3
            }
        }
    });
/*----------------------------------------
    Testimonial Carousel
---------------------------------------- */
    $(".testimonial-owl").owlCarousel({
        loop:true,
        animateOut: 'slideOutDown',
        animateIn: 'slideInLeft',
        smartSpeed: 2500,
        items:1,
        dots: true,
        dotsData: true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
/*----------------------------------------
    Gallery Carousel
---------------------------------------- */
    $('.gallery-carousel').owlCarousel({
        loop:true,
        items:4,
        nav:true,
        navText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
        responsive:{
            0:{
                items:1
            },
            480:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            },
            1200:{
                items:4
            }
        }
    });

/*-----------------------------------------
    07. Counter Up
------------------------------------------ */
    $('.counter').counterUp({
        delay: 70,
        time: 8000
    });

/*------------------------------------------
    08. ScrollUp
------------------------------------------- */
	$.scrollUp({
        scrollText: '<i class="fa fa-long-arrow-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });

/*------------------------------------------
    09. Wow js
-------------------------------------------- */
    new WOW().init();

})(jQuery);
unction validform() {

    var a = document.forms["my-form"]["full-name"].value;
    var b = document.forms["my-form"]["email-address"].value;
    var c = document.forms["my-form"]["username"].value;
    var d = document.forms["my-form"]["permanent-address"].value;
    var e = document.forms["my-form"]["nid-number"].value;

    if (a==null || a=="")
    {
        alert("Please Enter Your Full Name");
        return false;
    }else if (b==null || b=="")
    {
        alert("Please Enter Your Email Address");
        return false;
    }else if (c==null || c=="")
    {
        alert("Please Enter Your Username");
        return false;
    }else if (d==null || d=="")
    {
        alert("Please Enter Your Permanent Address");
        return false;
    }else if (e==null || e=="")
    {
        alert("Please Enter Your NID Number");
        return false;
    }

}
