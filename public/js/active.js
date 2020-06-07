(function ($) {
    'use strict';



    // Masonary Gallery Active Code
    if ($.fn.imagesLoaded) {
        $('.fplus-portfolio').imagesLoaded(function () {
            // filter items on button click
            $('.portfolio-menu').on('click', 'button', function () {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({
                    filter: filterValue
                });
            });
            // init Isotope
            var $grid = $('.fplus-portfolio').isotope({
                itemSelector: '.single_gallery_item',
                percentPosition: true,
                masonry: {
                    columnWidth: '.single_gallery_item'
                }
            });
        });
    }

    $('#nav-icon').on('click', function () {
        $(this).toggleClass('open');
        $('.fplus-menu-area').toggleClass('menu-open');
    });













    // :: 6.0 PreventDefault a Click
    $("a[href='#']").on('click', function ($) {
        $.preventDefault();
    });

    // :: 9.0 wow Active Code


    // :: 10.0 matchHeight Active JS
    if ($.fn.matchHeight) {
        $('.item').matchHeight();
    }

    var $window = $(window);


})(jQuery);