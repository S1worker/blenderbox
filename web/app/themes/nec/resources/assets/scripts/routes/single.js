import Masonry from 'masonry-layout';

export default {
  init() {
    // JavaScript to be fired on the about us page
  },
  finalize() {

    /**
     * Masonry Downloads
     * @click
     */
    if( $('.masonry-downloads').length ) {

      /**
       *
       */
      $( '.masonry-downloads' ).each(function(index) {

        var $elem = 'masonry-downloads-' + index;

        $(this).addClass($elem);

        var $masonry = '.' + $elem;

        /**
         * Grid
         */
        var $grid = {};

        $grid[index] = new Masonry($masonry, {
          percentPosition   :   true,
          itemSelector      :   '.masonry-downloads-item',
          gutter            :   0,
          transitionDuration:   0,
          columnWidth       :   '.grid-sizer',
        });

        /**
         * Load and Resize
         */
        $(window).on('load resize', function () {
          $grid[index].reloadItems();
          $grid[index].layout();
        });

        /**
         * Accordion
         * @click
         */
        $(document).on('click', $masonry + ' .accordion-downloads-title', function(e){

          const $li         = $(this).parent(),
                $html       = $li.find('.accordion-downloads-body'),
                program_ID  = $(this).data('program'),
                course_ID   = $(this).data('course');

          if( $li.hasClass('active') ) {

            $($masonry + ' .accordion-downloads').find('.active').removeClass('active');

          }else{

            $($masonry + ' .accordion-downloads').find('.active').removeClass('active');
            $li.addClass('active');

            if( !$html.html().length ) {

              $.ajax( {
                beforeSend  :   function(){
                  $li.block({message : '', overlayCSS : {background : '#fff', opacity : 0.6}});
                },
                data        :   {
                  action      :   'courses',
                  program_id  :   program_ID,
                  course_id   :   course_ID,
                },
                dataType    :   'json',
                method      :   'POST',
                complete    :   function(){
                  $li.unblock();
                },
                success     :   function( data ){

                  $html.html(data.data.html);

                  $grid[index].reloadItems();
                  $grid[index].layout();

                },
                url         :   window.nec.ajax_url,
              } );

            }

          }

          /**
           * Masonry reinit
           */
          if (typeof $grid[index] !== 'undefined') {
            $grid[index].reloadItems();
            $grid[index].layout();
          }

          /**
           *
           */
          e.preventDefault();

        });

      });

    }

    /**
     * Accordion
     * @click
     */
    if( $('.accordion').length ) {

      $(document).on('click', '.accordion-title', function(e){

        const $li = $(this).parent();

        if( $li.hasClass('active') ) {

          $('.accordion').find('.active').removeClass('active');

        }else{

          $('.accordion').find('.active').removeClass('active');
          $li.addClass('active');

        }

        e.preventDefault();

      });

    }

    /**
     * Play Button
     */
    if($('.newssingle__content .wp-block-video').length) {

      /**
       * Insert Button
       */
      $( '.newssingle__content .wp-block-video' ).each(function() {

        $(this).append($('<a href="#play" class="btn-video-play"></a>'));

      });

      /**
       * Click Button Play
       */
      $(document).on('click', '.btn-video-play', function(){

        const video = $(this).parent().find('video');

        if(video.get(0).paused){

          video.get(0).play();
          $(this).fadeOut();

        }else{

          video.get(0).pause();
          $(this).fadeIn();

        }

      });

    }

  },
};
