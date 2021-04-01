<!-- Dynamic Slider -->
<div class="dynamic__slider" data-nav-scroll id="{{ $section['id_section'] }}">

  @empty( !$section['dynamic_slider_title'] )
    <!-- Title -->
    <h2 class="dynamic__slider-title">
      {{ $section['dynamic_slider_title'] }}
    </h2>
    <!-- End Title -->
  @endempty

  @empty( !$section['dynamic_slider_list'] )
    <!-- Swiper -->
    <div class="swiper-container dynamic__slider-swiper">

      <!-- wrapper -->
      <div class="swiper-wrapper">

        @foreach( $section['dynamic_slider_list'] as $slide )

        <!-- Slide -->
        <div class="swiper-slide">

          <!-- Slide > Figure -->
          <figure class="dynamic__slider-swiper--image">

            <img
              src="{{ $slide['dynamic_slider_list_image'] }}"
              alt="{{ $site_name }}"
              title="{{ $slide['dynamic_slider_list_caption'] }}"
            >

            @empty( !$slide['dynamic_slider_list_caption'] )
              <figcaption>
                {{ $slide['dynamic_slider_list_caption'] }}
              </figcaption>
            @endempty

          </figure>
          <!-- End Slide > Figure -->

        </div>
        <!-- End Slide -->
        @endforeach

      </div>
      <!-- end wrapper -->

    </div>
    <!-- End Swiper -->
  @endempty

  <!-- pagination -->
  <div class="swiper-pagination"></div>
  <!-- end pagination -->

  <!-- nav button -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
  <!-- end nav button -->

</div>
<!-- End Dynamic Slider -->
