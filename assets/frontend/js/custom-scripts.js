$(document).ready(function () {
  'use strict';

  //===== Menu Active =====//
  var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/") + 1);
  $("nav ul li a").each(function () {
    if ($(this).attr("href") == pgurl || $(this).attr("href") == '')
    $(this).parent('li').addClass("active").parent().parent().addClass("active").parent().parent().addClass("active");
  });

  //===== Menu Active =====//
  var pgurl = window.location.href.substr(window.location.href.lastIndexOf("/") + 1);
  $(".rsnp-mnu ul li a").each(function () {
    if ($(this).attr("href") == pgurl || $(this).attr("href") == '')
    $(this).parent('li').addClass("active").parent().parent().addClass("active-parent").parent().parent().addClass("active-parent");
  });

  //===== Width =====//
  var width = window.innerWidth;

  //===== Wow Animation Setting =====//
  if ($(".wow").length > 0) {
    var wow = new WOW({
      boxClass:     'wow',      // default
      animateClass: 'animated', // default
      offset:       0,          // default
      mobile:       true,       // default
      live:         true        // default
    }); 

    wow.init();
  }

  //===== Active =====//
  // $('.player .controls > div').live('click', function () {
  //   $(this).addClass('active');
  //   $('.player .controls > div').removeClass('active');
  //   return false;
  // });

  //===== Side Menu =====//
  $('.rspn-mnu-btn').on('click', function () {
    $('.rsnp-mnu').addClass('slidein');
    return false;
  });
  $('.rspn-mnu-cls').on('click', function () {
    $('.rsnp-mnu').removeClass('slidein');
  });
  $('.rsnp-mnu li.menu-item-has-children > a').on('click', function () {
    $(this).parent().siblings('li').children('ul').slideUp();
    $(this).parent().siblings('li').removeClass('active');
    $(this).parent().children('ul').slideToggle();
    $(this).parent().toggleClass('active');
    return false;
  });

  //===== Select =====//
  if ($('.slc-wrp > select').length > 0) {
    $('.slc-wrp > select').selectpicker();
  }

  //===== Touchspin =====//
  if ($('.qty').length > 0) {
    $('.qty').TouchSpin();
  } 

  //===== Sticky Sidebar =====//
  if(width > 991) {
    if ($('.post-detail-wrap > div.row > div').length > 0) {
      $('.post-detail-wrap > div.row > div').theiaStickySidebar({
        additionalMarginTop: 40,
        additionalMarginBottom: 40
      });
    }
  }

  //===== Counter Up =====//
  if ($.isFunction($.fn.counterUp)) {
    $('.counter').counterUp({
      delay: 10,
      time: 2000
    });
  }

  //===== Audio Player =====//
  if ($.isFunction($.fn.musicPlayer)) {
    $(".plyr").musicPlayer({
      elements: ['artwork', 'information', 'controls', 'progress', 'time', 'volume'], // ==> This will display in  the order it is inserted
      //elements: [ 'controls' , 'information', 'artwork', 'progress', 'time', 'volume' ],
      //controlElements: ['backward', 'play', 'forward', 'stop'],
      //timeElements: ['current', 'duration'],
      //timeSeparator: " : ", // ==> Only used if two elements in timeElements option
      //infoElements: [  'title', 'artist' ],

      //volume: 10,
      //autoPlay: true,
      //loop: true,
      
    });
  }

  //===== Progress Bar =====//
  if ($("#goal-prog1").length > 0) {
    $("#goal-prog1").waypoint(function(){
      $("#goal-prog1").circleProgress({
        value: 0.7,
        fill: {color: '#147736'},
        thickness: 5,
        emptyFill: '#fff',
        size: 100
      }).on('circle-animation-progress', function(event, progress) {
        $(this).find('span').html(Math.round(70 * progress) + '<i>%</i>');
      });
    }, { offset: '70%'})
  }

  //===== Progress Bar =====//
  if ($("#goal-prog2").length > 0) {
    $("#goal-prog2").waypoint(function(){
      $("#goal-prog2").circleProgress({
        value: 0.85,
        fill: {color: '#147736'},
        thickness: 5,
        emptyFill: '#fff',
        size: 100
      }).on('circle-animation-progress', function(event, progress) {
        $(this).find('span').html(Math.round(85 * progress) + '<i>%</i>');
      });
    }, { offset: '70%'})
  }

  //===== Progress Bar =====//
  if ($("#goal-prog3").length > 0) {
    $("#goal-prog3").circleProgress({
      value: 0.85,
      fill: {color: '#147736'},
      thickness: 5,
      emptyFill: '#fff',
      size: 110
    }).on('circle-animation-progress', function(event, progress) {
      $(this).find('span').html(Math.round(85 * progress) + '<i>%</i>');
    });
  }

  //===== Progress Bar =====//
  if ($("#goal-prog4").length > 0) {
    $("#goal-prog4").waypoint(function(){
      $("#goal-prog4").circleProgress({
      value: 0.7,
      fill: {color: '#147736'},
      thickness: 5,
      emptyFill: '#fff',
      size: 100
      }).on('circle-animation-progress', function(event, progress) {
        $(this).find('span').html(Math.round(70 * progress) + '<i>%</i>');
      });
    }, { offset: '70%'})
  }

  //===== Progress Bar =====//
  if ($("#goal-prog5").length > 0) {
    $("#goal-prog5").waypoint(function(){
      $("#goal-prog5").circleProgress({
        value: 0.85,
        fill: {color: '#147736'},
        thickness: 5,
        emptyFill: '#fff',
        size: 100
      }).on('circle-animation-progress', function(event, progress) {
        $(this).find('span').html(Math.round(85 * progress) + '<i>%</i>');
      });
    }, { offset: '70%'})
  }

  //===== Progress Bar =====//
  if ($("#goal-prog6").length > 0) {
    $("#goal-prog6").circleProgress({
      value: 0.85,
      fill: {color: '#147736'},
      thickness: 5,
      emptyFill: '#fff',
      size: 110
    }).on('circle-animation-progress', function(event, progress) {
      $(this).find('span').html(Math.round(85 * progress) + '<i>%</i>');
    });
  }

  //===== LightBox =====//
  if ($.isFunction($.fn.fancybox)) {
    $('[data-fancybox],[data-fancybox="gallery"]').fancybox({});
  }

  //===== Scrollbar =====//
  if ($('.rsnp-mnu').length > 0) {
    var ps = new PerfectScrollbar('.rsnp-mnu');
  }

  //===== Contact Form Validation =====//
  if($('#email-form').length){
    $('#submit').on('click',function(){
      var o = new Object();
      var form = '#email-form';
      var fname = $('#email-form .fname').val();
      var email = $('#email-form .email').val();
      if(fname == '' || email == '') {
        $('#email-form .response').html('<div class="failed alert alert-warning">Please fill the required fields.</div>');
        return false;
      }

      $.ajax({
        url:"sendemail.php",
        method:"POST",
        data: $(form).serialize(),
        beforeSend:function(){
          $('#email-form .response').html('<div class="text-info"><img src="assets/images/preloader.gif"> Loading...</div>');
        },
        success:function(data){
          $('form').trigger("reset");
          $('#email-form .response').fadeIn().html(data);
          setTimeout(function(){
            $('#email-form .response').fadeOut("slow");
          }, 5000);
        },
        error:function(){
          $('#email-form .response').fadeIn().html(data);
        }
      });
    });
  }
  
  if(width < 851) {
    
    //===== Responsive Carousel =====//
    if ($.isFunction($.fn.slick)) {
      $('.res-caro').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
        centerPadding: '0',
        focusOnSelect: true,
        responsive: [
        {
          breakpoint: 851,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            arrows: false,
          }
        },
        {
          breakpoint: 771,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            arrows: false,
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            centerMode: true,
            arrows: false,
            dots: false,
          }
        }
        ]
      });

      $('.res-caro2').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: true,
        arrows: false,
        centerPadding: '0',
        focusOnSelect: true,
        responsive: [
        {
          breakpoint: 851,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            arrows: false,
          }
        },
        {
          breakpoint: 770,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            arrows: false,
          }
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            infinite: true,
            centerMode: true,
            arrows: false,
            dots: false,
          }
        }
        ]
      });
    }
  }

  //===== Slick Carousel =====//
  if ($.isFunction($.fn.slick)) {

    //=== Featured Area Carousel ===//
    $('.feat-caro').slick({
      arrows: false,
      initialSlide: 0,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      fade: true,
      autoplay: false,
      autoplaySpeed: 6000,
      cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
      speed: 1500,
      draggable: true,
      dots: true,
      pauseOnDotsHover: true,
      pauseOnFocus: false,
      pauseOnHover: false,
      prevArrow:"<button type='button' class='slick-prev'><i class='fas fa-chevron-right'></i></button>",
      nextArrow:"<button type='button' class='slick-next'><i class='fas fa-chevron-left'></i></button>",
      responsive: [
      {
        breakpoint: 981,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 851,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 770,
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

    //=== Featured Area Carousel 2 ===//
    $('.feat-caro2').slick({
      arrows: false,
      initialSlide: 0,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      fade: true,
      autoplay: false,
      autoplaySpeed: 6000,
      cssEase: 'cubic-bezier(0.7, 0, 0.3, 1)',
      speed: 1500,
      draggable: true,
      dots: true,
      pauseOnDotsHover: true,
      pauseOnFocus: false,
      pauseOnHover: false,
      prevArrow:"<button type='button' class='slick-prev'><i class='fas fa-chevron-right'></i></button>",
      nextArrow:"<button type='button' class='slick-next'><i class='fas fa-chevron-left'></i></button>",
      responsive: [
      {
        breakpoint: 981,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 851,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 770,
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

    //=== Products Carousel ===//
    $('.prod-caro').slick({
      arrows: true,
      initialSlide: 0,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      fade: true,
      autoplay: false,
      autoplaySpeed: 5000,
      speed: 1000,
      draggable: true,
      dots: false,
      pauseOnDotsHover: true,
      pauseOnFocus: false,
      pauseOnHover: false,
      prevArrow:"<button type='button' class='slick-prev'><i class='fas fa-chevron-right'></i></button>",
      nextArrow:"<button type='button' class='slick-next'><i class='fas fa-chevron-left'></i></button>",
      responsive: [
      {
        breakpoint: 981,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 851,
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

    //====== Services Carousel =====//
    $('.serv-caro').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      centerPadding: '0',
      focusOnSelect: true,
      vertical: false,
      prevArrow:"<button type='button' class='slick-prev'><i class='fas fa-chevron-right'></i></button>",
      nextArrow:"<button type='button' class='slick-next'><i class='fas fa-chevron-left'></i></button>",
      responsive: [
      {
        breakpoint: 1605,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 1370,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 1210,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 851,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 770,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 580,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      ]
    });

    //====== Event Carousel =====//
    $('.event-caro').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      dots: false,
      arrows: true,
      centerPadding: '0',
      focusOnSelect: true,
      vertical: true,
      prevArrow:"<button type='button' class='slick-prev'><i class='fas fa-chevron-up'></i></button>",
      nextArrow:"<button type='button' class='slick-next'><i class='fas fa-chevron-down'></i></button>",
      responsive: [
      {
        breakpoint: 981,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          vertical: true,
          dots: false,
          arrows: true
        }
      },
      {
        breakpoint: 851,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          vertical: true,
          dots: false,
          arrows: true
        }
      },
      {
        breakpoint: 770,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          vertical: true,
          dots: false,
          arrows: true
        }
      },
      {
        breakpoint: 580,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          vertical: false,
          dots: true,
          arrows: false
        }
      }
      ]
    });

    //====== Course Carousel =====//
    $('.course-caro').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      centerPadding: '0',
      focusOnSelect: true,
      vertical: false,
      prevArrow:"<button type='button' class='slick-prev'><i class='fas fa-chevron-right'></i></button>",
      nextArrow:"<button type='button' class='slick-next'><i class='fas fa-chevron-left'></i></button>",
      responsive: [
      {
        breakpoint: 1605,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 1370,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 1210,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 851,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 770,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 500,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      ]
    });

    //====== Team Carousel 2 =====//
    $('.team-caro2').slick({
      slidesToShow: 6,
      slidesToScroll: 1,
      dots: false,
      arrows: true,
      centerPadding: '0',
      focusOnSelect: true,
      vertical: false,
      prevArrow:"<button type='button' class='slick-prev'><i class='fas fa-chevron-right'></i></button>",
      nextArrow:"<button type='button' class='slick-next'><i class='fas fa-chevron-left'></i></button>",
      responsive: [
      {
        breakpoint: 1605,
        settings: {
          slidesToShow: 6,
          slidesToScroll: 1,
          arrows: true,
        }
      },
      {
        breakpoint: 1370,
        settings: {
          slidesToShow: 6,
          slidesToScroll: 1,
          arrows: true,
        }
      },
      {
        breakpoint: 1030,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 1,
          arrows: true,
        }
      },
      {
        breakpoint: 981,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 1,
          arrows: true,
        }
      },
      {
        breakpoint: 851,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
          arrows: true,
        }
      },
      {
        breakpoint: 500,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: false,
          dots: false,
        }
      }
      ]
    });

    //===== Shop Detail Carousel =====//
    $('.shop-detail-caro').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      // slide: 'li',
      fade: false,
      asNavFor: '.shop-detail-nav-caro'
    });

    $('.shop-detail-nav-caro').slick({
      slidesToShow: 4,
      slidesToScroll: 1,
      asNavFor: '.shop-detail-caro',
      dots: false,
      arrows: true,
      // slide: 'li',
      centerMode: false,
      vertical: true,
      centerPadding: '0px',
      focusOnSelect: true,
      prevArrow:"<button type='button' class='slick-prev'><i class='fas fa-chevron-up'></i></button>",
      nextArrow:"<button type='button' class='slick-next'><i class='fas fa-chevron-down'></i></button>",
      responsive: [{
      breakpoint: 1200,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
          infinite: true,
        }
      },
      {
      breakpoint: 850,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: false,
          vertical: false,
        }
      },
      {
      breakpoint: 480,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: false
        }
      }]
    });

    //====== Post Carousel =====//
    $('.post-caro').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      dots: false,
      arrows: true,
      centerPadding: '0',
      focusOnSelect: true,
      vertical: false,
      prevArrow:"<button type='button' class='slick-prev'><i class='flaticon-arrow-pointing-to-left'></i></button>",
      nextArrow:"<button type='button' class='slick-next'><i class='flaticon-arrow-pointing-to-right'></i></button>",
      responsive: [
      {
        breakpoint: 1605,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1,
          arrows: true
        }
      },
      {
        breakpoint: 981,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: true
        }
      },
      {
        breakpoint: 851,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: true
        }
      },
      {
        breakpoint: 500,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
          dots: false
        }
      }
      ]
    });

  }

}); //===== Document Ready Ends =====//

//===== Window Load =====//
$(window).on('load',function () {
  'use strict';
  
  jQuery("#preloader").fadeOut(300);

});

//===== Sticky Header =====//
$(window).on('scroll',function () {
  'use strict';

  var menu_height = $('header').innerHeight();
  var scroll = $(window).scrollTop();
  if (scroll >= menu_height) {
    $('body').addClass('sticky');
  } else {
    $('body').removeClass('sticky');
  }

});//===== Window onScroll Ends =====//