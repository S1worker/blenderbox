<!-- Component: Quote Slider -->
<section class="quote_slider">

  <!-- Container -->
  <div class="container-fluid">

    <!-- Inner -->
    <div class="quote_slider__inner">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          @foreach($field['slide'] as $item)
            <div class="swiper-slide">
              <div class="swiper-slide__image-wrap">
                <img class="swiper-slide__image" src="{{ wp_get_attachment_image_url($item['image'], 'large') }}"
                     srcset="{{ wp_get_attachment_image_url($item['image'], 'full') }} 2x"
                     alt="{{ $site_name }}">
                <div class="swiper-pagination"></div>
              </div>
              <div class="swiper-slide__info">
                <h3 class="swiper-slide__title">{{ $item['title'] }}</h3>


                {{-- Flexible Content --}}
                @empty( !$item['elements'] )

                  {{-- Foreach Flexible Content --}}
                  @foreach( $item['elements'] as $element )

                    {{-- Blockquote --}}
                    @if( 'blockquote' == $element['acf_fc_layout'] )

                      @include( 'components.global_elements.blockquote', ['field' => $element] )

                    @endif
                    {{-- End Blockquote --}}

                  @endforeach
                  {{-- End Foreach Flexible Content --}}

                @endempty
                {{-- End Flexible Content --}}

                <a href="{{ $item['link']['url'] }}" target="{{ $item['link']['target'] }}" class="swiper-slide__link">
                  {{ $item['link']['title'] }}
                </a>

              </div>
            </div>
          @endforeach
        </div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </div>
    <!-- End Inner -->

  </div>
  <!-- End Container -->

</section>
<!-- End Component: Quote Slider -->
