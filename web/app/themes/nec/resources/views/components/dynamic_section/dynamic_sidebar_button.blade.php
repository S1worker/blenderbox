@empty( !$section['link'] )
<!-- Dynamic Button -->
<div class="dynamic__sidebar_button">

  <a href="{{ $section['link']['url'] }}" class="btn btn-red arrow">
    {{ $section['link']['title'] }}
  </a>

</div>
<!-- End Dynamic Button -->
@endempty
