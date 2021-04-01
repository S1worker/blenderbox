export default {
  init() {
    // JavaScript to be fired on all pages
  },
  finalize() {


    /**
     * Open Nav Mobile Left Sidebar
     */
    $(document).on('click', '.openNavSection', function(e){

      $(this).toggleClass('active');
      $(this).parent().find('ul').toggleClass('open');
      e.preventDefault();

    });


    $('.top-header__search').on('click', function (e) {
      e.preventDefault();
      $(this).addClass('top-header__search--active');
    });

    /**
     * Replace all SVG images with inline SVG
     */
    jQuery('img.svg').each(function(){
      const $img = jQuery(this);
      const imgID = $img.attr('id');
      const imgClass = $img.attr('class');
      const imgURL = $img.attr('src');

      jQuery.get(imgURL, function(data) {
        // Get the SVG tag, ignore the rest
        let $svg = jQuery(data).find('svg');

        // Add replaced image ID to the new SVG
        if(typeof imgID !== 'undefined') {
          $svg = $svg.attr('id', imgID);
        }
        // Add replaced image classes to the new SVG
        if(typeof imgClass !== 'undefined') {
          $svg = $svg.attr('class', imgClass+' replaced-svg');
        }

        // Remove any invalid XML tags as per http://validator.w3.org
        $svg = $svg.removeAttr('xmlns:a');

        // Check if the viewport is set, if the viewport is not set the SVG wont't scale.
        if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
          $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
        }

        // Replace image with new SVG
        $img.replaceWith($svg);

      }, 'xml');

    });


    $(document).on('click', '.closeFloatingSection', function(){
      $('.floating_section').remove();
    });

    let userScrolled = false;
    const refreshspeed = 1000 / 10;

    $(window).on('scroll', function () {
      userScrolled = true;
    }).scroll();

    function isOnScreen(x) {
      if (x.length) {
        var top_of_element = x.offset().top;
        var bottom_of_screen = $(window).scrollTop() + window.innerHeight;
        return bottom_of_screen > top_of_element;
      }
    }

    executeOnScroll();

    function executeOnScroll() {
      $('.fadein, .animated').each(function () {
        if (isOnScreen($(this))) {
          $(this).addClass('onscreen');
        }
      });
    }

    function checkIfScrolled() {
      if (userScrolled) {
        window.requestAnimationFrame(executeOnScroll);
        userScrolled = false;
      }
    }

    setInterval(checkIfScrolled, refreshspeed);

    $(document).on('click', '.to_top__link', function (e){
      e.preventDefault();
      $('html, body').animate({scrollTop: 0}, 1000);
    });
  },
};
