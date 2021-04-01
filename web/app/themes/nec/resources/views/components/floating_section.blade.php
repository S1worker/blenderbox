<!-- Component: Floating Section -->
<div class="floating_section {{ $field['position'] }} {{ $field['position_type'] }} {{ $field['color'] }}">

  <!-- Close Section -->
  <a href="#close" class="floating_section__close closeFloatingSection">Close</a>
  <!-- End Close Section -->

  @empty( !$field['title'] )
    <!-- Title -->
    <h4 class="floating_section__title">
      {{ $field['title'] }}
    </h4>
    <!-- End Title -->
  @endempty

  @if( count($field['link']) )
    <!-- Title -->
    <a href="{{ $field['link']['url'] }}" class="link link-white arrow floating_section__link">
      {{ $field['link']['title'] }}
    </a>
    <!-- End Title -->
  @endif

</div>
<!-- END Component: Floating Section -->
