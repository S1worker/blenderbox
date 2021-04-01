<!-- Component: Quick Links -->
<div class="quick_links">

  <!-- Container -->
  <div class="container-fluid">

    <!-- Container -->
    <div class="quick_links__container">

      <!-- Inner -->
      <div class="quick_links__container-inner {{ $field['border_top'] }} {{ $field['border_bottom'] }}">

      @empty( !$field['title'] )
        @php
          $h = ($field['title_style']) ? $field['title_style'] : 3;
        @endphp
        <!-- Title -->
          <h{{ $h }} class="quick_links__title">
          {{ $section['title'] }}
          </h{{ $h }}>
          <!-- End Title -->
      @endempty

      @empty( !$field['text'] )
        <!-- Text -->
          <div class="quick_links__text">
            {{ $field['text'] }}
          </div>
          <!-- End Text -->
      @endempty

      @empty( !$field['columns'] )
        <!-- List -->
          <ul class="quick_links__columns">

            @foreach( $field['columns'] as $column )
              <li>

                <!-- Item -->
                <div class="quick_links__columns-item">

                @empty( !$column['title'] )
                  <!-- Title -->
                    <h3 class="quick_links__columns-item--title">
                      {{ $column['title'] }}
                    </h3>
                    <!-- Title -->
                @endempty

                @empty( !$column['links'] )

                  <!-- Box -->
                    <div class="quick_links__columns-item--box">

                    @empty( !$column['subtitle'] )
                      <!-- Title -->
                        <h4 class="quick_links__columns-item--box---title">
                          {{ $column['subtitle'] }}
                        </h4>
                        <!-- Title -->
                    @endempty

                    <!-- List -->
                      <ul class="quick_links__columns-item--box---links text text-size-18">
                        @foreach( $column['links'] as $link )
                          <li>
                            <a href="{{ $link['link']['url'] }}">
                              {{ $link['link']['title'] }}
                            </a>
                          </li>
                        @endforeach
                      </ul>
                      <!-- End List -->

                    </div>
                    <!-- End Box -->

                  @endempty

                </div>
                <!-- End Item -->

              </li>
            @endforeach

          </ul>
          <!-- End List -->
        @endempty

      </div>
      <!-- End Inner -->

    </div>
    <!-- End Container -->

  </div>
  <!-- End Container -->

</div>
<!-- End Component: Quick Links -->

