<!-- Dynamic Badges -->
<div class="dynamic__badges">

  <h5 class="dynamic__badges-title">
    {{ $section['title'] }}
  </h5>

  @empty( !$section['list'] )
    <ul class="dynamic__badges-list">
    @foreach( $section['list'] as $item )
      <li>
        <a href="{{ $item['link']['url'] }}">
          {{ $item['link']['title'] }}
        </a>
      </li>
    @endforeach
    </ul>
  @endempty

</div>
<!-- End Dynamic Badges -->
