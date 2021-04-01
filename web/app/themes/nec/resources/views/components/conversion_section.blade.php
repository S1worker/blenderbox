<!-- Component: Conversion Section -->
<section class="conversion_section">



    <!-- Inner -->
    <div class="conversion_section__inner">

      <!-- Container -->
      <div class="conversion_section__container" style="background-image: url({{$field['image']}})">

        <!-- Container -->
        <div class="container-fluid">

          <!-- Cell -->
          <div class="conversion_section__cell {{ $field['color'] }}">

          @empty( !$field['title'] )
            <!-- Title -->
              <h4 class="h1 conversion_section__cell-title">
                {{ $field['title'] }}
              </h4>
              <!-- End Title -->
          @endempty

          @empty( !$field['text'] )
            <!-- Text -->
              <div class="conversion_section__cell-text text text-size-24">
                {!! $field['text'] !!}
              </div>
              <!-- End Text -->
          @endempty

          {{-- Flexible Content --}}
          @empty( !$field['elements'] )

            {{-- Foreach Flexible Content --}}
            @foreach( $field['elements'] as $link )

              {{-- Button --}}
              @if( 'button' == $link['acf_fc_layout'] )
                <!-- Button -->
                  <div class="conversion_section__cell-footer">
                    @include( 'components.global_elements.button', ['field' => $link] )
                  </div>
                  <!-- End Button -->
                @endif
                {{-- End Button --}}

              @endforeach
              {{-- End Foreach Flexible Content --}}

            @endempty
            {{-- End Flexible Content --}}

          </div>
          <!-- End Cell -->

          @if($field['animated_text'])
          <!-- Animated Text -->
            <div class="conversion_section__anim animated">
              {!! $field['animated_text'] !!}
            </div>
            <!-- End Animated Text -->
          @endif

        </div>
        <!-- End Container -->


      </div>
      <!-- End Container -->

    </div>
    <!-- End Inner -->

</section>
<!-- END Component: Conversion Section -->
