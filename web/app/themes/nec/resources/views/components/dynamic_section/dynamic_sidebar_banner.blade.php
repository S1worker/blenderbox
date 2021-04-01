<!-- Dynamic Banner -->
<div class="dynamic__banner {{ $section['background'] }}">

  @empty( !$section['title'] )
    <!-- Title -->
    <h4 class="dynamic__banner-title">
      {{ $section['title'] }}
    </h4>
    <!-- End Title -->
  @endempty

  @empty( !$section['text'] )
    <!-- Text -->
    <div class="dynamic__banner-text text text-size-16">
      {!! $section['text'] !!}
    </div>
    <!-- End Text -->
  @endempty

  @empty( !$section['elements'] )

    <!-- Footer -->
    <div class="dynamic__banner-footer">

      @foreach( $section['elements'] as $link )

        @if( 'link' == $link['acf_fc_layout'] )

          @include( 'components.global_elements.link', ['field' => $link] )

        @endif

      @endforeach

    </div>
    <!-- End Footer -->

  @endempty

</div>
<!-- End Dynamic Banner -->
