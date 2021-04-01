<!-- Dynamic Menu -->
<div class="dynamic__menu">

  <h5 class="dynamic__menu-title">
    {{ $section['title'] }}
  </h5>

  @empty( !$section['menu'] )
    <ul class="dynamic__menu-list">
    @foreach( $section['menu'] as $item )
      <li>
        <a href="{{ $item['menu_link']['url'] }}">{{ $item['menu_link']['title'] }}</a>
      </li>
    @endforeach
    </ul>
  @endempty

</div>
<!-- End Dynamic Menu -->
