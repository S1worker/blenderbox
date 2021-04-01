<!-- Dynamic Links -->
<div class="dynamic__links" data-nav-scroll id="{{ $section['id_section'] }}">

  @empty( !$section['dynamic_links_title'] )
    <!-- Title -->
    <h2 class="dynamic__links-title">
      {{ $section['dynamic_links_title'] }}
    </h2>
    <!-- End Title -->
  @endempty

  @empty( !$section['dynamic_links_list'] )
  <!-- List -->
  <ul class="dynamic__links-list column-{{ $section['dynamic_links_column'] }}">

    @foreach( $section['dynamic_links_list'] as $column )
    <li>

      <!-- Card -->
      <div class="dynamic__links-list--card">

        @empty( !$column['dynamic_list_list_title'] )
          <!-- Title -->
          <h3 class="dynamic__links-list--card---title">
            {!! $column['dynamic_list_list_title'] !!}
          </h3>
          <!-- End Title -->
        @endempty

        @empty( !$column['dynamic_links_list_row'] )

          <!-- List -->
          <ul>
            @foreach( $column['dynamic_links_list_row'] as $row )
            <li>
              <a href="{{ $row['dynamic_links_list_row_link']['url'] }}">
                <span>{{ $row['dynamic_links_list_row_link']['title'] }}</span>
              </a>
            </li>
            @endforeach
          </ul>
          <!-- End List -->

        @endempty

      </div>
      <!-- End Card -->

    </li>
    @endforeach

  </ul>
  <!-- End List -->
  @endempty

</div>
<!-- End Dynamic Links -->
