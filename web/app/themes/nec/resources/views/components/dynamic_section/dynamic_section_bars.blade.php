<!-- Dynamic Bars -->
<div class="dynamic__bars {{ $section['dynamic_bars_border_top'] }} {{ $section['dynamic_bars_border_bottom'] }}">

  <!-- Title -->
  <h3 class="dynamic__bars-title">
    {{ $section['dynamic_bars_title'] }}
  </h3>
  <!-- End Title -->

  @empty( !$section['dynamic_bars_list'] )

    <!-- List -->
    <ul class="dynamic__bars-list">

      @foreach( $section['dynamic_bars_list'] as $item )

        <li>

          <!-- Inner -->
          <div class="dynamic__bars-list--inner">

            <!-- Title -->
            <h6 class="dynamic__bars-list--inner---title">
              {{ $item['title'] }}
            </h6>
            <!-- End Title -->

            <!-- SubTitle -->
            <div class="dynamic__bars-list--inner---subtitle text text-size-14">
              {{ $item['subtitle'] }}
            </div>
            <!-- End SubTitle -->

            <!-- SubTitle -->
            <div class="dynamic__bars-list--inner---bar">
              <span style="width: {{ $item['percent'] }}%"></span>
            </div>
            <!-- End SubTitle -->

          </div>
          <!-- End Inner -->

        </li>

      @endforeach

    </ul>
    <!-- End List -->

  @endempty

</div>
<!-- End Dynamic Bars -->
