@empty( !$field['content'] )
  <!-- Component: Dinamic Section -->
  <section class="dynamic__section @if( $field['content_fix'] ) fix @endif @if( $field['border_top'] ) border-top @endif">

    @php
      $sidebar_width = null;
    @endphp

      <!-- Container -->
      <div class="container-fluid">

        <!-- container -->
        <div class="dynamic__section-container">

          <!-- Box -->
          <div class="dynamic__section-container--box">

          @if( $field['sidebar_active'] )
            @php
              $sidebar_width = (!empty($field['sidebar_width'])) ? $field['sidebar_width'] : 300;
              $sidebar_width .= 'px';
            @endphp
            <!-- Sidebar -->
              <div class="dynamic__section-sidebar sidebar-left" style="width:{{ $sidebar_width }}">

                @empty( !$field['sidebar_content'] )

                  @foreach( $field['sidebar_content'] as $section )

                    @include( 'components.dynamic_section.' . $section['acf_fc_layout'], compact('section') )

                  @endforeach

                @endempty

              </div>
              <!-- End Sidebar -->
          @endif

          <!-- Inner -->
            <div class="dynamic__section-inner @if( $field['sidebar_active'] ) sidebar-right @endif" @if( $sidebar_width ) style="width:calc(100% - {{ $sidebar_width }})" @endif>

              @foreach( $field['content'] as $section )

                @include( 'components.dynamic_section.' . $section['acf_fc_layout'], compact('section') )

              @endforeach

            </div>
            <!-- End Inner -->

          </div>
          <!-- End Box -->

        </div>
        <!-- end container -->

      </div>
      <!-- End Container -->

  </section>
  <!-- End Component: Dinamic Section -->
@endempty
