import Swiper from 'swiper/bundle';
import 'blockUI';
import 'select2';
import Masonry from 'masonry-layout';

export default {
  init() {

  },
  finalize() {


    /**
     * Grid Task
     * @Masonry
     */
    if( $('.taskMasonry').length ) {

      $( '.taskMasonry' ).each(function(index) {

        var $elem = 'masonry-task-' + index;

        $(this).addClass($elem);

        var $masonry = '.' + $elem;

        var $grid = {};

        $grid[index] = new Masonry($masonry, {
          percentPosition   :   true,
          itemSelector      :   '.taskMasonry-item',
          gutter            :   0,
          transitionDuration:   0,
          columnWidth       :   '.grid-sizer',
        });

        $(window).on('load resize', function(){
          $grid[index].reloadItems();
          $grid[index].layout();
        });

      });

    }


    /**
     * Header
     * @type {{init: init}}
     */
    let Header = function () {

      /**
       * Install
       * @param data
       * @constructor
       */
      let Install = function () {

        /**
         * Mobile Menu
         * @click
         * Slinky Menu
         *
         */
        $(document).on('click', '#headerSlinky > li.header__menu__item--submenu:not(.active) > a', function(e) {

          $(this).parent().addClass('active');
          $(this).parent().parent().find('li:not(.active)').addClass('hide');
          $('.header__mob .hideSlinky').addClass('hide');

          e.preventDefault();
        });

        /**
         * Mobile Menu
         * @click
         * Slinky Menu
         */
        $(document).on('click', '#headerSlinky > li.header__menu__item--submenu.active > a', function(e) {

          $(this).parent().removeClass('active');
          $(this).parent().parent().parent().find('li.hide').removeClass('hide');
          $('.header__mob .hideSlinky').removeClass('hide');

          e.preventDefault();
        });

        /**
         * Menu Mobile Header
         * @click
         * Small Menu Accordion
         */
        $(document).on('click', '.header__mob .top-header__menu__item--submenu > a', function(e) {

          $(this).parent().toggleClass('active');
          e.preventDefault();

        });

        /**
         * Menu Mobile Header
         * @click
         */
        $(document).on('click', '#header__burger', function(e) {

          $('body')
            .toggleClass('menu__active')
            .toggleClass('no-scroll');

          e.preventDefault();
        });

      }

      /**
       * @return
       */
      return {
        init: function () {
          Install();
        },
      };
    }();

    /**
     * Init Header
     */
    Header.init();

    /**
     * GlobalElements
     * @type {{init: init}}
     */
    let GlobalElements = function () {

      /**
       * Accordion
       * @param data
       * @constructor
       */
      let Accordion = function () {

        /**
         * Accordion
         * @click
         */
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
       * Breadcrumbs
       * @param data
       * @constructor
       */
      let Breadcrumbs = function () {

        /**
         * breadcrumbs
         * @length
         * @each
         */
        if( $('.breadcrumbs').length ) {

          $( '.breadcrumbs li' ).each(function() {

            if( $(this).find('ul').length ) {

              $(this).addClass('breadcrumbs__dropdown');

            }

          });

          /**
           * Hide Breadcrumbs DropDown
           * @mouseup
           */
          $(document).mouseup(function (e) {

            const container = $('.breadcrumbs__dropdown');

            if ( container.has(e.target).length === 0 ) {

              container.removeClass('active');

            }

          });

        }

        /**
         * Breadcrumbs
         * @click
         */
        $(document).on('click', '.breadcrumbs__dropdown > a', function(e){

          $(this).parent().toggleClass('active');

          e.preventDefault();

        });

      }


      let Downloads = function () {



      }

      /**
       * @return
       */
      return {
        init: function () {
          Accordion();
          Breadcrumbs();
          Downloads();
        },
      };
    }();

    /**
     * Init GlobalElements
     */
    GlobalElements.init();

    /**
     * Swiper Quote
     */
    if ($('.quote_slider').length > 0) {
      new Swiper('.quote_slider .swiper-container', {
        slidesPerView   : 1,
        spaceBetween    : 0,
        loop            : true,
        effect          :'fade',
        speed           : 800,
        pagination      : {
          el            : '.swiper-pagination',
          clickable     : true,
          type          : 'bullets',
        },
        navigation: {
          nextEl        : '.swiper-button-next',
          prevEl        : '.swiper-button-prev',
        },
      });
    }

    /**
     * Swiper Dynamic Content
     */
    if ($('.dynamic__slider').length > 0) {
      new Swiper('.dynamic__slider .swiper-container', {
        slidesPerView : 1,
        spaceBetween  : 0,
        loop          : true,
        effect          :'fade',
        speed           : 800,
        pagination: {
          el          : '.dynamic__slider .swiper-pagination',
          clickable   : true,
          type        : 'bullets',
        },
        navigation: {
          nextEl      : '.dynamic__slider .swiper-button-next',
          prevEl      : '.dynamic__slider .swiper-button-prev',
        },
      });
    }

    /**
     * Select2
     * Normal
     */
    if( $('.js-select').length ) {

      $('.js-select').select2({
        minimumResultsForSearch :   Infinity,
        containerCssClass       :   'select2-lg',
      });

      $('.js-select-md').select2({
        minimumResultsForSearch :   Infinity,
        containerCssClass       :   'select2-md',
      });

      $('.js-select-sm').select2({
        minimumResultsForSearch :   Infinity,
        containerCssClass       :   'select2-sm',
      });

    }











    /**
     * Masonry News and Event
     */
    if($('.newsevent-masonry').length){

      var $grid = new Masonry('.newsevent-masonry', {
        percentPosition   :   true,
        itemSelector      :   '.item',
        gutter            :   0,
        transitionDuration:   0,
        columnWidth       :   '.grid-sizer',
      });
      $grid.reloadItems();
      $grid.layout();

      setTimeout(function () {

        $grid.reloadItems();
        $grid.layout();

      }, 100);

      $(window).on('resize', function(){
        $grid.reloadItems();
        $grid.layout();
      });

    }

    /**
     * Play Button Video
     */
    if($('.video-player').length) {

      /**
       * Insert Button
       */
      $( '.video-player' ).each(function() {

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

    /********************************************************************
     * Filter Ajax Component
     * News and Events
     * @type {{init: init}}
     */
    let FilterNewsEventAjax = function () {

      /**
       * const
       * @type {{overlayCSS: {background: string, opacity: number}, message: string}}
       */
      const loader = {message : '', overlayCSS : {background : '#fff', opacity : 0.6}};

      /**
       * Ajax
       * @param container
       * @param data
       * @constructor
       */
      let Ajax = function (data = '') {

        /**
         *
         * @type {jQuery|HTMLElement}
         */
        const $container_result   = $('.filterNewsEvent .resultAjax'),                  //Container
              $container_items    = $container_result.find('.recfilter_section__list'), //Container Items
              $month_panel        = $('.filterNewsEventFormMonth'),                     //Panel Month
              $form               = $('.filterNewsEventForm');                          //Form

        /**
         * Data
         * @type {string}
         */
          data += $form.serialize() + '&month=' + $('.filterNewsEventFormDate').val();

        $.ajax( {
          beforeSend  :   function(){
            $container_result.block(loader);
          },
          data        :   data,
          dataType    :   'json',
          method      :   'POST',
          complete    :   function(){
            $container_result.unblock();
          },
          success     :   function( data ){

            if( data.success === false ) {
              $('.newsevent-masonry').addClass('recfilter_section__list-empty');
            } else {
              $('.newsevent-masonry').removeClass('recfilter_section__list-empty');
            }

            /**
             * Items
             */

              /**
               * Html
               */
              $container_items.html(data.data.html).ready(function () {

                let grid = new Masonry('.newsevent-masonry');
                grid.reloadItems();
                setTimeout(function () {
                  grid = new Masonry('.newsevent-masonry', {
                    percentPosition   :   true,
                    itemSelector      :   '.item',
                    isInitLayout      :   true,
                    gutter            :   0,
                    transitionDuration:   0,
                    columnWidth       :   '.grid-sizer',
                  });
                }, 200)

              });

              /**
               * Masonry
               */
                $(window).trigger('resize');

            /**
             * Month Panel
             */
            $month_panel.html(data.data.month);

          },
          url         :   window.nec.ajax_url,
        } );
      }

      /**
       * News and Event
       * @constructor
       */
      let NewsEvent = function () {

        /**
         * Select
         * @change
         */
        $(document).on('change', '.filterNewsEvent select', function(){

          Ajax();

        });

        /**
         * Next or Prev Month
         * @click
         */
        $(document).on('click', '.filterNewsEventMonth', function(){

          const month = $(this).data( 'month' );

          $('.filterNewsEventFormDate').val( month );

          Ajax('month_custom=' + month + '&');

        });

      }

      /**
       * @return
       */
      return {
        init: function () {
          NewsEvent();
        },
      };
    }();

    /**
     * Init Filter Ajax
     */
    FilterNewsEventAjax.init();

    /**
     * Filter Ajax Component
     * Taxonomy
     * @type {{init: init}}
     */
    let FilterTaxonomyAjax = function () {

      /**
       * const
       * @type {{overlayCSS: {background: string, opacity: number}, message: string}}
       */
      const loader = {message : '', overlayCSS : {background : '#fff', opacity : 0.6}};

      /**
       * Ajax
       * @param container
       * @param data
       * @constructor
       */
      let Ajax = function (data = '', type = 'post') {

        /**
         *
         * @type {jQuery|HTMLElement}
         */
        const $container          = $('.resultTaxonomyAjax'),
              $container_result   = $('.resultTaxonomyAjaxPost'),
              $form               = $('.filterTaxonomy');

        /**
         * Data
         * @type {string}
         */
        data += $form.serialize() + '&level=' + $('[name=select_level]').val() + '&place=' + $('[name=select_place]').val() + '&' + '&type=' + type;

        $.ajax( {
          beforeSend  :   function(){

            if(type == 'post')
              $container.block(loader);

          },
          data        :   data,
          dataType    :   'json',
          method      :   'POST',
          complete    :   function(){

            if(type == 'post') {
              $container.unblock();
            }else{
              $('.taxfilter_section__filter-list--input').removeClass('active');
            }

          },
          success     :   function( data ){

            /**
             * Search
             */
            if(type == 'search') {

              $('.filterTaxonomySearchResultTax').html(data.data.html);

              return false;
            }

            /**
             * Check Badges
             */
            checkSelectedBadges();

            /**
             * Html
             */
            $container_result.html(data.data.html).ready(function () { });


          },
          url         :   window.nec.ajax_url,
        } );
      }

      /**
       * Select Multiple
       * @constructor
       */
      let Select = function () {

        /**
         *
         */
        $.fn.select2.amd.require([
            'select2/selection/single',
            'select2/selection/placeholder',
            'select2/dropdown',
            'select2/dropdown/attachBody',
            'select2/utils',
          ],
          function (SingleSelection, Placeholder, Dropdown, AttachBody, Utils) {

            var SelectionAdapter = Utils.Decorate(
              SingleSelection,
              Placeholder
            );

            $( '.js-select-checkbox' ).each(function() {
              var $select     = $(this),
                placeholder = $(this).data('placeholder');

              $select.select2({
                placeholder       :   placeholder,
                selectionAdapter  :   SelectionAdapter,
                closeOnSelect     :   false,
                dropdownParent    :   $select.parent(),
                templateResult    :   function (data) {

                  if (!data.id) { return data.text; }

                  var $res = $('<div></div>');


                  $res.text(data.text);
                  $res.addClass('wrap');

                  $res.attr('data-name', data.text.trim());
                  $res.attr('data-id', data.id.trim());

                  return $res;
                },
                templateSelection: function (data) {

                  if (!data.id) {
                    return data.text;
                  }

                  var selected  = ($select.val() || []).length;
                  var total     = $('option', $select).length;

                  return placeholder + ' (' + selected + ' of ' + total + ')';

                },
              })

            });

          }
        );

        /**
         * Add Badges
         * @click
         */
        $(document).on('click', '.select2-results__option', function() {

          var id    = $(this).find('.wrap').data('id'),
              name  = $(this).find('.wrap').data('name');

          if( !$(this).hasClass('select2-results__option--selected') ) {

            $('.filterTaxonomyBadges').find('[data-id="'+id+'"]').remove();

          }else{

            $('.filterTaxonomyBadges').append(
              '<li data-type="sellect" data-id="'+id+'" data-name="'+name.trim()+'">' +
              '<a href="#remove-'+id+'">'+name.trim()+'</a>' +
              '</li>'
            );

          }

          /**
           * Return Ajax
           */
          Ajax();

        });

      }

      /**
       * Search Input
       * @constructor
       */
      let Search = function () {

        /**
         * @click
         */
        $(document).on('click', '.filterTaxonomySearchResultCat', function(e){
          e.preventDefault();

          /**
           * const
           * @type {jQuery|HTMLElement}
           */
          const $this       =   $(this),
                id          =   $this.data('id'),
                name        =   $this.text().trim(),
                $inp_cat    =   $('.filterTaxonomy input[name=category]'),
                def_value   =   $inp_cat.val();

          /**
           *
           */

          if( $('.filterTaxonomyPanel [data-id=' + id + ']').length ) {

            $inp_cat.val(function(index, value) {
              return value.replace( id + ',', '' );
            });

            $('.filterTaxonomyPanel [data-id=' + id + ']').remove();

          }else{

            $('.filterTaxonomyBadges').append(
              '<li data-type="category" data-id="'+id+'" data-name="'+name+'">' +
              '<a href="#remove-'+id+'">'+name+'</a>' +
              '</li>'
            );

            $inp_cat.val( def_value + id + ',' );

          }

          /**
           * Return Ajax
           */
          Ajax();

          /**
           * Check Badges
           */
          checkSelectedBadges();

        });

        /**
         * @focus
         */
        $(document).on('focus', '.filterTaxonomySearch', function(){

          $('.filterTaxonomySearchResult').addClass('open');

        });

        /**
         * @focusout
         */
        $(document).on('focusout', '.filterTaxonomySearch', function(){

        });

        /**
         * @keyup
         */
        $(document).on('keyup', '.filterTaxonomySearch', function(){
          const $this = $(this),
                value = $this.val();

          if( value.length ) {
            $this.parent().addClass('active');
            $('.filterTaxonomySearchResultDefault').hide();
            $('.filterTaxonomySearchResultTax').show();
          }else{
            $this.parent().removeClass('active');
            $('.filterTaxonomySearchResultDefault').show();
            $('.filterTaxonomySearchResultTax').hide();
          }

          /**
           * Return Ajax
           */
          Ajax('', 'search');

        });

        /**
         * Search Section Group
         * @mouseup
         */
        $(document).mouseup(function (e){

          var div = $('.filterTaxonomySearchGroup');

          if (!div.is(e.target)
            && div.has(e.target).length === 0) {
            $('.filterTaxonomySearchResultDefault').show();
            $('.filterTaxonomySearchResultTax').html('');
            $('.filterTaxonomySearchResult').removeClass('open');
            $('.filterTaxonomySearch').val('');
          }

        });

      }

      /**
       * Panel
       * @constructor
       */
      let Panel = function () {

        /**
         * Remove Badges
         * @click
         */
        $(document).on('click', '.filterTaxonomyBadges a', function(e){

          var $elem   =   $(this).parent(),
              id      =   $elem.data('id'),
              type    =   $elem.data('type');

          $('.js-select-checkbox option[value="' + id + '"]').prop('selected', false);
          $('.js-select-checkbox').trigger('change');

          $(this).parent().remove();

          /**
           * Replace Category
           */
          if( type === 'category' ) {
            $('.filterTaxonomy input[name=category]').val(function(index, value) {
              return value.replace( id + ',', '' );
            });
          }

          /**
           * Return Ajax
           */
          Ajax();

          /**
           * preventDefault
           */
          e.preventDefault();

        });

        /**
         * Clear All Filters
         * @click
         */
        $(document).on('click', '.filterTaxonomyClear', function(){

          /**
           *
           */
          $('.js-select-checkbox').val(null).trigger('change');
          $('.filterTaxonomyBadges').html('');

          /**
           * Check Badges
           */
          checkSelectedBadges();

        });

        /**
         * View List
         * @click
         */
        $(document).on('click', '.filterTaxonomyView', function(){

          $(this).toggleClass('grid');

          $('.resultTaxonomyAjaxList').toggleClass('table');

        });

      };

      /**
       * Check Badges
       */
      let checkSelectedBadges = function () {
        const $container    = $('.filterTaxonomyPanel'),
              $elem         = $container.find('li');

        if( $elem.length ) {
          $container.removeClass('hidden');

          $('.resultTaxonomyAjaxCat').hide();
          $('.resultTaxonomyAjaxPost').show();

        }else{
          $container.addClass('hidden');

          $('.resultTaxonomyAjaxCat').show();
          $('.resultTaxonomyAjaxPost').html('').hide();

        }
      };

      /**
       * Mobile
       * @constructor
       */
      let Mobile = function () {

        /**
         * Mobile Filter Open
         * @click
         */
        $(document).on('click', '.filterTaxonomyMobileBtn', function(e){

          $('body').toggleClass('no-scroll');
          $('.filterTaxonomyMobilePopup').toggleClass('active');

          e.preventDefault();
        });


      }

      /**
       * @return
       */
      return {
        init: function () {
          Select();
          Search();
          Panel();
          Mobile();
        },
      };
    }();
    /**
     * Init Filter Ajax
     */
    FilterTaxonomyAjax.init();


  },
};
