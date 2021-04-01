<!-- Component: Home Banner -->
<section class="home_banner" style="background-image: url({{$field['image']}}); background-position: {{ $field['image_position'] }}">

  <!-- Container -->
  <div class="container-fluid">

    <!-- Inner -->
    <div class="home_banner__inner">

      <!-- Content -->
      <div class="home_banner__content" style="max-width:{{ $field['text_max_width'] }}px">

      <!-- Title
      <h1 class="home_banner__title">
        {{-- $field['title'] --}}
        </h1>
        End Title -->

        <!-- Text -->
        <div class="home_banner__text home_banner__text-{{ $field['text_color'] }} text text-size-{{ $field['text_size'] }}">
          {!! $field['text'] !!}
        </div>
        <!-- End Text -->

        <!-- Footer -->
        <div class="home_banner__footer">

          @empty( !$field['button_left'] )

            <a
              href="{{ $field['button_left']['url'] }}"
              class="btn btn-red arrow home_banner__footer__button"
            >
              {{ $field['button_left']['title'] }}
            </a>

          @endempty

          @empty( !$field['button_right'] )

            <a
              href="{{ $field['button_right']['url'] }}"
              class="btn btn-white-opacity arrow home_banner__footer__button"
            >
              {{ $field['button_right']['title'] }}
            </a>

          @endempty

        </div>
        <!-- End Footer -->

      </div>
      <!-- End Content -->

    </div>
    <!-- End Inner -->

  </div>
  <!-- End Container -->

</section>
<!-- End Component: Home Banner -->
