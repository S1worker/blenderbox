<!-- Dynamic Media -->
<div class="dynamic__media" data-nav-scroll id="{{ $section['id_section'] }}">

  @empty( !$section['dynamic_media_title'] )
    <!-- Title -->
    <h3 class="dynamic__media-title">
      {{ $section['dynamic_media_title'] }}
    </h3>
    <!-- End Title -->
  @endempty

  <!-- Media -->
  <div class="dynamic__media-row">

    @empty( !$section['dynamic_media_image'] )
      <!-- Image -->
      <div class="dynamic__media-row--left">
          <img
            src="{{ $section['dynamic_media_image'] }}"
            alt="{{ $site_name }}"
          >
      </div>
      <!-- End Image -->
    @endempty

    <!-- Body -->
    <div class="dynamic__media-row--right">

      <!-- text -->
      <div class="text text-size-18">
        {!! $section['dynamic_media_text'] !!}
      </div>
      <!-- end text -->

      @empty( !$section['dynamic_media_link'] )
        <div class="dynamic__media-row--right---footer">
          <a href="{{ $section['dynamic_media_link']['url'] }}" class="link arrow arrow-red">
            {{ $section['dynamic_media_link']['title'] }}
          </a>
        </div>
      @endempty

    </div>
    <!-- End Body -->

  </div>
  <!-- End Media -->

</div>
<!-- End Dynamic Media -->
