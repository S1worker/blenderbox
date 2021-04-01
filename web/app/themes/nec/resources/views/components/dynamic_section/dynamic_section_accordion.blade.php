<!-- Dynamic Accordion -->
<div class="dynamic__accordion {{ $section['dynamic_accordion_border_top'] }} {{ $section['dynamic_accordion_border_bottom'] }}" data-nav-scroll id="{{ $section['id_section'] }}">

  @empty( !$section['dynamic_accordion_title'] )
    @php
      $h = ($section['dynamic_accordion_title_style']) ? $section['dynamic_accordion_title_style'] : 3;
    @endphp
    <!-- Title -->
    <h{{ $h }} class="dynamic__accordion-title">
      {{ $section['dynamic_accordion_title'] }}
    </h{{ $h }}>
    <!-- End Title -->
  @endempty

  @empty( !$section['dynamic_accordion_list'] )
  <!-- List -->
  <ul class="accordion dynamic__accordion-list">

    @foreach( $section['dynamic_accordion_list'] as $item )
      <li>

        <!-- Title -->
        <a href="" class="accordion-title dynamic__accordion-list--title">
          <h4>{{ $item['title'] }}</h4>
        </a>
        <!-- End Title -->

        <!-- Content -->
        <div class="accordion-body dynamic__accordion-list--content text text-size-18">
          {!! $item['text'] !!}
        </div>
        <!-- End Content -->

      </li>
    @endforeach

  </ul>
  <!-- End List -->
  @endempty

</div>
<!-- End Dynamic Accordion -->
