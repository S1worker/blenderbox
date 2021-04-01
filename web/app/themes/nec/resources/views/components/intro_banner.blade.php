<!-- Component: Intro Banner -->
<section class="intro_banner">

  <!-- Container -->
  <div class="container-fluid">

    <!-- Inner -->
    <div class="intro_banner__inner {{ $field['text_position'] }}">

      <!-- Inner > Box -->
      <div class="intro_banner__inner-content">

      @empty( !$field['subtitle'] )
        <!-- Inner > Sub Titile -->
          <span class="intro_banner__subtitle">
        {{ $field['subtitle'] }}
      </span>
          <!-- End Inner > Sub Titile -->
      @endempty

      @empty( !$field['title'] )
        <!-- Inner > Titile -->
          <h1 class="intro_banner__title">
            {{ $field['title'] }}
          </h1>
          <!-- End Inner > Titile -->
      @endempty

      @empty( !$field['text'] )
        <!-- Inner > Text -->
          <div class="intro_banner__text">
            {!! $field['text'] !!}
          </div>
          <!-- End Inner > Text -->
      @endempty

      @empty( !$field['button_left'] && !$field['button_right'] )

        <!-- Footer -->
        <div class="intro_banner__footer">

            @empty( !$field['button_left'] )

              <a
                href="{{ $field['button_left']['url'] }}"
                class="btn btn-red arrow intro_banner__footer-btn"
              >
                {{ $field['button_left']['title'] }}
              </a>

            @endempty

            @empty( !$field['button_right'] )

              <a
                href="{{ $field['button_right']['url'] }}"
                class="btn btn-black-opacity arrow intro_banner__footer-btn"
              >
                {{ $field['button_right']['title'] }}
              </a>

            @endempty

          </div>
        <!-- End Footer -->

      @endempty

      @empty( !$field['text_small'] )
        <!-- Small Text -->
          <div class="intro_banner__text-small text text-size-14">
            {!! $field['text_small'] !!}
          </div>
          <!-- End Small Text -->
        @endempty

      </div>
      <!-- End Inner > Box -->

    </div>
    <!-- End Inner -->

  </div>
  <!-- End Container -->

  <!-- Background -->
  <div class="intro_banner__image" style="background-image: url({{$field['image']}})"></div>
  <!-- End Background -->

</section>
<!-- END Component: Intro Banner -->
