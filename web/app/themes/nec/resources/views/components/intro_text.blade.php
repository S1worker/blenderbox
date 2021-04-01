<!-- Component: Intro Text -->
<section class="intro_text">

  <!-- Container -->
  <div class="container-fluid">

    <!-- Inner -->
    <div class="intro_text__inner @empty( !$field['image'] ) has-image @endempty">

      <!-- Text -->
      <div class="intro_text__inner-text">

      @if( $field['bradcrumb'] )

        <!-- Breadcrumbs -->
        {{ \App\Controllers\Helpers::breadcrumbs(['separator' => ' / ']) }}
        <!-- End Breadcrumbs -->

      @endif

      @empty( !$field['title'] )
        <!-- Title -->
          <h1 class="h2 intro_text__title">
            {{ $field['title'] }}
          </h1>
          <!-- End Title -->
      @endempty

      @empty( !$field['text'] )
        <!-- Text -->
          <div class="intro_text__text text text-size-24">
            {!! $field['text'] !!}
          </div>
          <!-- End Text -->
        @endempty

      </div>
      <!-- End Text -->

    @empty( !$field['image'] )
      <!-- Image -->
        <div class="intro_text__inner-image">
          <img
            src="{{ kama_thumb_src( 'w=500 &h=400 &attach_id=' . $field['image'] ) }}"
            alt="{{ $site_name }}"
            title="{{ $field['title'] }}"
          >
        </div>
        <!-- End Image -->
      @endempty

    </div>
    <!-- End Inner -->

  </div>
  <!-- End Container -->

</section>
<!-- END Component: Intro Text -->
