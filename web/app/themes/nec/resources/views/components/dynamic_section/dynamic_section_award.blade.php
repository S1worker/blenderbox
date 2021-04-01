<!-- Dynamic Text -->
<div class="dynamic__award" data-nav-scroll id="{{ $section['id_section'] }}">

  @empty( !$section['dynamic_award_list'] )
  <!-- List -->
  <ul class="dynamic__award-list column-{{ $section['dynamic_award_column'] }}">

    @foreach( $section['dynamic_award_list'] as $column )
    <li>

      <!-- Card -->
      <div class="dynamic__award-list--card {{ $column['dynamic_award_list_background'] }}">

        <div>

          @empty( !$column['dynamic_award_list_title'] )
            <!-- Title -->
            <h2 class="dynamic__award-list--card---title">
              {!! $column['dynamic_award_list_title'] !!}
            </h2>
            <!-- End Title -->
          @endempty

          @empty( !$column['dynamic_award_list_text'] )
            <!-- Text -->
            <div class="dynamic__award-list--card---text text text-size-14">
              {!! $column['dynamic_award_list_text'] !!}
            </div>
            <!-- End Text -->
          @endempty

        </div>

      </div>
      <!-- End Card -->

    </li>
    @endforeach

  </ul>
  <!-- End List -->
  @endempty

</div>
<!-- End Dynamic Text -->
