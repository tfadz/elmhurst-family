var premierFunctions = (function($) {

  var init = function() {
    sliders();
    mobileMenu();
  },

  sliders = function() {
      $('.team-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: false,
        arrows: true,
        dots: false,
        cssEase: 'ease-in-out',
        speed: 350,
        infinite: true,
        prevArrow: $(".prev-slide"),
        nextArrow: $(".next-slide"),
        responsive: [

          {
            breakpoint: 767,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
            }
          },
        ]
      });
      
      var $heroslider = $('.hero-slider');

      $heroslider.slick({
        autoplay: true,
        autoplaySpeed: 9600,
        arrows: false,
        dots: true,
        centerMode: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        centerPadding: '0',
        cssEase: 'ease',
        speed: 1800,
        fade: true,
        infinite: true,
        pauseOnFocus: false,
        pauseOnHover: false

      });
      
  },
  
  mobileMenu = function() {
    $('.hamburger-box').click(function (e) {
      e.preventDefault();
      $(this).toggleClass('active');
      $(this).find('.hamburger').toggleClass('active');
      $('.nav-modal').toggleClass('active');
      $('.menu-mobile').toggleClass('show');
    });

    $('li.menu-item-has-children').click(function (e) {
      $(this).find('.sub-menu').toggle();
    });
  }
  
  
  AOS.init({
  	  offset: 300,
  	  once: false,
  	  duration: 600,
  	  easing: 'ease-in-out',
  	  delay: 150,
  	  disable: 'mobile'
  	})

return {
  init:init
};

})(jQuery);

jQuery(document).ready(premierFunctions.init );

