<!-- Component: Featured Content -->
<section class="featured_content {{ $field['text_position'] }}">

  <!-- Container -->
  <div class="container-fluid">

    <!-- Inner -->
    <div class="featured_content__inner">

      <!-- Image -->
      <div class="featured_content__image-wrap">
        <div class="featured_content__image animated" style="background-image: url({{ wp_get_attachment_image_url($field['image'], 'full') }})"></div>
        @if($field['image_text'])
          <div class="featured_content__animated-text animated">{!! $field['image_text'] !!}</div>
        @endif
      </div>
      <!-- End Image -->

      <!-- Info -->
      <div class="featured_content__info">
        @if($field['subtitle'])
          <p class="featured_content__subtitle">{{ $field['subtitle'] }}</p>
        @endif
        <h2 class="h1 featured_content__title">
          {{ $field['title'] }}
        </h2>
        <div class="featured_content__text">{!! $field['text'] !!}</div>

        {{-- Flexible Content --}}
        @empty( !$field['elements'] )

        <!-- Buttons -->
          <div class="featured_content__buttons">

            @foreach( $field['elements'] as $link )

              @if( 'link' == $link['acf_fc_layout'] )

                @include( 'components.global_elements.link', ['field' => $link, 'custom_class' => 'featured_content__buttons__item'] )

              @endif

            @endforeach

          </div>
          <!-- End Buttons -->

        @endempty
        {{-- End Flexible Content --}}

      </div>
      <!-- End Info -->

    </div>
    <!-- End Inner -->

  </div>
  <!-- End Container -->

</section>
<!-- End Component: Featured Content -->
