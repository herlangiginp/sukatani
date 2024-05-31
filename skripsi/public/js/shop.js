(function ($) {
    'use strict';
    /*Product Details*/
    var productDetails = function () {
        $('.product-image-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: false,
            asNavFor: '.slider-nav-thumbnails',
        });

        $('.slider-nav-thumbnails').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.product-image-slider',
            dots: false,
            focusOnSelect: true,   
            prevArrow: '<button type="button" class="slick-prev"><i class="bi bi-caret-left-square-fill btn-lg"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="bi bi-caret-right-square-fill btn-lg"></i></button>'
        });

        // Remove active class from all thumbnail slides
        $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');

        // Set active class to first thumbnail slides
        $('.slider-nav-thumbnails .slick-slide').eq(0).addClass('slick-active');

        // On before slide change match active thumbnail to current slide
        $('.product-image-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            var mySlideNumber = nextSlide;
            $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');
            $('.slider-nav-thumbnails .slick-slide').eq(mySlideNumber).addClass('slick-active');
        });

        $('.product-image-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            var img = $(slick.$slides[nextSlide]).find("img");
            $('.zoomWindowContainer,.zoomContainer').remove();
            $(img).elevateZoom({
                zoomType: "inner",
                cursor: "crosshair",
                zoomWindowFadeIn: 500,
                zoomWindowFadeOut: 750
            });
        });
        //Elevate Zoom
        if ( $(".product-image-slider").length ) {
            $('.product-image-slider .slick-active img').elevateZoom({
                zoomType: "inner",
                cursor: "crosshair",
                zoomWindowFadeIn: 500,
                zoomWindowFadeOut: 750
            });
        }
        //Filter color/Size
        $('.list-filter').each(function () {
            $(this).find('a').on('click', function (event) {
                event.preventDefault();
                $(this).parent().siblings().removeClass('active');
                $(this).parent().toggleClass('active');
                $(this).parents('.attr-detail').find('.current-size').text($(this).text());
                $(this).parents('.attr-detail').find('.current-color').text($(this).attr('data-color'));
            });
        });
        //Qty Up-Down
        function incrementValue(e) {
            e.preventDefault();
            var fieldName = $(e.target).data('field');
            var parent = $(e.target).closest('div');
            var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);
    
            if (!isNaN(currentVal) && currentVal <= 10) {
                parent.find('input[name=' + fieldName + ']').val(currentVal + 1);
            } else {
                parent.find('input[name=' + fieldName + ']').val(0);
            }
        }
    
        function decrementValue(e) {
            e.preventDefault();
            var fieldName = $(e.target).data('field');
            var parent = $(e.target).closest('div');
            var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);
    
            if (!isNaN(currentVal) && currentVal > 0) {
                parent.find('input[name=' + fieldName + ']').val(currentVal - 1);
            } else {
                parent.find('input[name=' + fieldName + ']').val(0);
            }
        }
    
        $('.input-group').on('click', '.plus', function(e) {
            incrementValue(e); 
            var fieldName = $(e.target).data('field');
            var parent = $(e.target).closest('div');
            var currentVal = parseInt(parent.find('input[name=' + fieldName + ']').val(), 10);

            if (!isNaN(currentVal) && currentVal <= 10) {
                parent.find('input[name=' + fieldName + ']').val(currentVal);
            } else {
                parent.find('input[name=' + fieldName + ']').val(0);
            }
        });
    
        $('.input-group').on('click', '.minus', function(e) {
            decrementValue(e);
        });

    
    };
    /* WOW active */
    new WOW().init();

    //Load functions
    $(document).ready(function () {
        productDetails();
    });

})(jQuery);



  //Qty Up-Down
  $('.detail-qty').each(function () {
    var qtyval = parseInt($(this).find('.qty-val').text(), 10);
    $('.qty-up').on('click', function (event) {
        event.preventDefault();
        qtyval = qtyval + 1;
        $(this).prev().text(qtyval);
    });
    $('.qty-down').on('click', function (event) {
        event.preventDefault();
        qtyval = qtyval - 1;
        if (qtyval > 1) {
            $(this).next().text(qtyval);
        } else {
            qtyval = 1;
            $(this).next().text(qtyval);
        }
    });
});