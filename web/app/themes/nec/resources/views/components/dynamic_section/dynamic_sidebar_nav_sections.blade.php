<!-- Dynamic Nav Sections -->
<div class="dynamic__navsections">

  @empty( !$section['title'] )

    <!-- Title -->
    <h5 class="dynamic__navsections-title">
      {{ $section['title'] }}
    </h5>
    <!-- End Title -->

    <!-- Mobile Btn -->
    <button type="button" class="dynamic__navsections-btnmobile openNavSection">
      <span>
        <i></i>
        <i></i>
        <i></i>
      </span>
      <h6>{{ $section['title'] }}</h6>
    </button>
    <!-- End Mobile Btn -->

  @endempty

  @empty( !$section['list'] )
    <!-- List -->
      <ul class="dynamic__navsections-list">
        @php
          $i = 0;
        @endphp
        @foreach( $section['list'] as $item )
        <li class="@if( $i == 0 ) active @endif">
          <a href="#{{ $item['title'] }}">{{ $item['title'] }}</a>
        </li>
        @php $i++ @endphp
        @endforeach
      </ul>
    <!-- End List -->
  @endempty

</div>
<!-- End Dynamic Nav Sections -->
