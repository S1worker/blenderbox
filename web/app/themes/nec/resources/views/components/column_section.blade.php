<!-- Component: Column Section -->
<section class="column_section">

  <!-- Container -->
  <div class="container-fluid">

    <!-- Inner -->
    <div class="column_section__inner @if( empty( $field['column_image']['image'] ) ) fullwidth @endif">

      <!-- Cell -->
      <div class="column_section__cell column_section__text-{{ $field['column_text']['position'] }}">

        <!-- Text -->
        <div class="column_section__text">

        @empty( !$field['column_text']['title'] )
          <!-- Title -->
            <h3 class="column_section__title">
              {!! $field['column_text']['title'] !!}
            </h3>
            <!-- End Title -->
        @endempty

        @empty( !$field['column_text']['text'] )
          <!-- Title -->
            <div class="column_section__text">
              {!! $field['column_text']['text'] !!}
            </div>
            <!-- End Title -->
        @endempty

        @empty( !$field['column_text']['link'] )
          <!-- Title -->
            <a href="{{ $field['column_text']['link']['url'] }}" class="btn btn-arrow-right">
              {{ $field['column_text']['link']['title'] }}
            </a>
            <!-- End Title -->
          @endempty

        </div>
        <!-- End Text -->

      </div>
      <!-- End Cell -->

    @if( !empty( $field['column_image']['image'] ) )
      <!-- Cell -->
        <div class="column_section__cell column_section__image-{{ $field['column_image']['position'] }}">

          <!-- Image -->
          <div class="column_section__image">
            <img
              src="{{ $field['column_image']['image'] }}"
              alt="{{ $site_name }}"
              title=""
            >
          </div>
          <!-- End Image -->

        </div>
        <!-- End Cell -->
      @endif

    </div>
    <!-- End Inner -->

  </div>
  <!-- End Container -->

</section>
<!-- END Component: Column Section -->
