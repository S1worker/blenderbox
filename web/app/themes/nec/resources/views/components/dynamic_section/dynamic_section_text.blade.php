@empty( !$section['dynamic_text_content'] )
<!-- Dynamic Text -->
<div class="dynamic__text text @empty( !$section['dynamic_text_size'] ) text-size-{{ $section['dynamic_text_size'] }} @else text-size-18 @endempty {{ $section['dynamic_text_border_top'] }} {{ $section['dynamic_text_border_bottom'] }} {{ $section['dynamic_text_margin_bottom'] }}" data-nav-scroll id="{{ $section['id_section'] }}">

  <!-- Content -->
  <div class="dynamic__text-content">
    {!! $section['dynamic_text_content'] !!}
  </div>
  <!-- End Content -->

  @empty( !$section['dynamic_text_link'] )
    <!-- Footer -->
    <div class="dynamic__text-footer">
      <a href="{{ $section['dynamic_text_link']['url'] }}" class="link {{ $section['dynamic_text_link_style'] }} {{ $section['dynamic_text_link_icon'] }}">
        {{ $section['dynamic_text_link']['title'] }}
      </a>
    </div>
    <!-- End Footer -->
  @endempty

</div>
<!-- End Dynamic Text -->
@endempty
