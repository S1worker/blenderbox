@empty( !$section['dynamic_downloads_list'] )
  <!-- Dynamic Download Course -->
  <div class="dynamic__downloads {{ $section['dynamic_downloads_border_top'] }} {{ $section['dynamic_downloads_border_bottom'] }}" data-nav-scroll id="{{ $section['id_section'] }}">

    <!-- Title -->
    <h3 class="dynamic__downloads-title">
      {{ $section['dynamic_downloads_title'] }}
    </h3>
    <!-- End Title -->

    <!-- List -->
    <div class="dynamic__downloads-list">

      @foreach( $section['dynamic_downloads_list'] as $item )

        <!-- Row -->
        <div class="row">

          <!-- Header -->
          <div class="dynamic__downloads-list--header">

            <div>

              <!-- Title -->
              <h3 class="dynamic__downloads-list--header---title">
                {{ $item['title'] }}
              </h3>
              <!-- Title -->

              <!-- SubTitle -->
              <h5 class="dynamic__downloads-list--header---subtitle">
                {{ $item['subtitle'] }}
              </h5>
              <!-- End SubTitle -->

              <!-- Introtext -->
              <p>
                {{ $item['text'] }}
              </p>
              <!-- End Introtext -->

            </div>

            <a href="{{ $item['link']['url'] }}" class="btn btn-download">
              {{ _e( 'Download Course Requirements' ) }}
            </a>

          </div>
          <!-- End Header -->

        @empty( !$item['list'] )

          <!-- Title -->
            <h4 class="dynamic__downloads-list--title">
              {{ _e( 'Course Requirements' ) }}
            </h4>
            <!-- End Title -->

            <!-- Content -->
            <div class="masonry-downloads dynamic__downloads-list--content">

              @foreach( $item['list'] as $subitem )

                <div class="grid-sizer"></div>

                <!-- SubList -->
                <div class="masonry-downloads-item col dynamic__downloads-sublist">

                  <!-- List -->
                  <div class="dynamic__downloads-sublist--list">

                    <!-- Header -->
                    <div class="dynamic__downloads-sublist--list---header">

                      <!-- Title -->
                      <h5 class="dynamic__downloads-sublist--list---header----title">
                        {{ $subitem['title'] }}
                      </h5>
                      <!-- End Title -->

                    </div>
                    <!-- End Header -->

                  @empty( !$subitem['subtitle'] )

                    <!-- Header -->
                      <div class="dynamic__downloads-sublist--list---text text text-size-14">

                        {!! $subitem['subtitle'] !!}

                      </div>
                      <!-- End Header -->

                  @endempty

                  @empty( !$subitem['text'] )

                    <!-- List -->
                      <ul class="accordion-downloads dynamic__accordion-list">

                        @foreach( $subitem['text'] as $accordion )

                          <li>

                            <!-- Title -->
                            <a href="" class="accordion-downloads-title dynamic__accordion-list--title">
                              <h4>{{ $accordion['title'] }}</h4>
                            </a>
                            <!-- End Title -->

                            <!-- Content -->
                            <div class="accordion-downloads-body dynamic__accordion-list--content text text-size-16">
                              {!! $accordion['text'] !!}
                            </div>
                            <!-- End Content -->

                          </li>

                        @endforeach

                      </ul>
                      <!-- End List -->

                    @endempty

                  </div>
                  <!-- End List -->

                </div>
                <!-- End SubList -->

              @endforeach

            </div>
            <!-- End Content -->

          @endempty

        </div>
        <!-- End Row -->

      @endforeach

    </div>
    <!-- End List -->

  </div>
  <!-- End Download Course -->
@endempty
