<!-- Component: Contacts -->
<section class="contacts_section">

  <!-- Container -->
  <div class="container-fluid">

    <!-- Container -->
    <div class="contacts_section__container">

      <!-- Inner -->
      <div class="contacts_section__container-inner {{ $field['border_top'] }} {{ $field['border_bottom'] }}">

      @empty( !$field['title'] )
        @php
          $h = ($field['title_style']) ? $field['title_style'] : 3;
        @endphp
        <!-- Title -->
          <h{{ $h }} class="contacts_section__title">
          {{ $field['title'] }}
          </h{{ $h }}>
          <!-- End Title -->
      @endempty

      @empty( !$field['columns'] )

        <!-- Container -->
          <div class="contacts_section__box">

            <!-- Columns -->
            <ul class="contacts_section__columns">
              @foreach( $field['columns'] as $column )
                <li>
                  <!-- Column -->
                  <div class="contacts_section__columns-column">

                  @empty( !$column['title'] )
                    <!-- Title -->
                      <h5 class="contacts_section__columns-column--title">
                        {{ $column['title'] }}
                      </h5>
                      <!-- End Title -->
                  @endempty

                  @empty( !$column['text'] )
                    <!-- Text -->
                      <div class="contacts_section__columns-column--text text text-size-18">
                        {!! $column['text'] !!}
                      </div>
                      <!-- End Text -->
                  @endempty

                  @empty( !$column['links'] )
                    <!-- Links -->
                      <ul class="contacts_section__columns-column--links">
                        @foreach( $column['links'] as $link )
                          <li>
                            <a href="{{ $link['type'] }}:{{ $link['text'] }}" class="{{ $link['type'] }}">
                              {{ $link['text'] }}
                            </a>
                          </li>
                        @endforeach
                      </ul>
                      <!-- End Links -->
                    @endempty

                  </div>
                  <!-- End Column -->
                </li>
              @endforeach
            </ul>
            <!-- End Columns -->

          </div>
          <!-- End Container -->

        @endempty

      </div>
      <!-- End Inner -->

    </div>
    <!-- End Container -->

  </div>
  <!-- End Container -->

</section>
<!-- END Component: Contacts -->
