(function ($)
  { "use strict"
  
/* 1. Proloder
    $(window).on('load', function () {
      $('#preloader-active').delay(450).fadeOut('slow');
      $('body').delay(450).css({
        'overflow': 'visible'
      });
    });


/* 2. slick Nav */
// mobile_menu
    var menu = $('ul#navigation');
    if(menu.length){
      menu.slicknav({
        prependTo: ".mobile_menu",
        closedSymbol: '+',
        openedSymbol:'-'
      });
    }


/* 9. data-background */
    $("[data-background]").each(function () {
      $(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
      });


/* 10. WOW active */
    new WOW().init();

/* 11. Datepicker */
    


// 12 Pop Up Img
    var popUp = $('.single_gallery_part, .img-pop-up');
      if(popUp.length){
        popUp.magnificPopup({
          type: 'image',
          gallery:{
            enabled:true
          }
        });
      }

// Remove clas
  $('.close-icon').click(function(){
    $('.extra-inofo-bar').removeClass('info-open');
  })

// Modal Activation
    $('.search-switch').on('click', function () {
      $('.search-model-box').fadeIn(400);
    });

    $('.search-close-btn').on('click', function () {
      $('.search-model-box').fadeOut(400, function () {
          $('#search-input').val('');
      });
    });


})(jQuery);
