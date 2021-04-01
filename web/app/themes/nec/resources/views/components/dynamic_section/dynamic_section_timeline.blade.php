<!-- Dynamic Timeline -->
<div class="dynamic__timeline {{ $section['dynamic_timeline_border_top'] }} {{ $section['dynamic_timeline_border_bottom'] }}" data-nav-scroll id="{{ $section['id_section'] }}">

  @empty( !$section['dynamic_timeline_title'] )
    @php
      $h = ($section['dynamic_timeline_title_style']) ? $section['dynamic_timeline_title_style'] : 3;
    @endphp
    <h{{ $h }} class="dynamic__timeline-title">
      {{ $section['dynamic_timeline_title'] }}
    </h{{ $h }}>
  @endempty


  @empty( !$section['dynamic_timeline_list'] )
  <!-- List -->
  <ul class="dynamic__timeline-list">

    @foreach( $section['dynamic_timeline_list'] as $item )
      <li>

        <!-- Title -->
        <div class="dynamic__timeline-list--title">
          <h5>
            {{ $item['title'] }}
          </h5>
        </div>
        <!-- End Title -->

        <!-- Title -->
        <div class="dynamic__timeline-list--text text text-size-18">
          {!! $item['text'] !!}
        </div>
        <!-- End Title -->

      </li>
    @endforeach

  </ul>
  <!-- End List -->
  @endempty

</div>
<!-- End Dynamic Timeline -->
