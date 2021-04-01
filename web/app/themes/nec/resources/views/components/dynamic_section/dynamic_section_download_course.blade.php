@empty( !$section['dynamic_downloads_catalog_id'] && !$section['dynamic_downloads_program_id'] )
  <!-- Dynamic Download Course -->
  <div class="dynamic__downloads {{ $section['dynamic_downloads_border_top'] }} {{ $section['dynamic_downloads_border_bottom'] }}" data-nav-scroll id="{{ $section['id_section'] }}">

    <!-- Title -->
    <h3 class="dynamic__downloads-title">
      {{ $section['dynamic_downloads_title'] }}
    </h3>
    <!-- End Title -->

    @php
     $programs = (new \App\Controllers\Helpers)->catalogPrograms( $section['dynamic_downloads_catalog_id'], $section['dynamic_downloads_program_id'] );
    @endphp

    @empty( !$programs )
    <!-- List -->
    <div class="dynamic__downloads-list">

        <!-- Row -->
        <div class="row">

          <!-- Header -->
          <div class="dynamic__downloads-list--header">

            <div>

              <!-- Title -->
              <h3 class="dynamic__downloads-list--header---title">
                {{ $programs->name }}
              </h3>
              <!-- Title -->

              <!-- SubTitle -->
              <h5 class="dynamic__downloads-list--header---subtitle">
                {{ _e( '20–23 Credits' ) }}
              </h5>
              <!-- End SubTitle -->

{{--              @empty( !$programs->description )--}}
{{--                <!-- Introtext -->--}}
{{--                {!! $programs->description !!}--}}
{{--                <!-- End Introtext -->--}}
{{--              @endempty--}}

            </div>

            <a href="#" class="btn btn-download">
              {{ _e( 'Download Course Requirements' ) }}
            </a>

          </div>
          <!-- End Header -->

        @empty( !$programs->cores )

          @foreach( $programs->cores as $cores )

            @if( count($cores->children) <> 0 )

              <!-- Title -->
              <h4 class="dynamic__downloads-list--title">
                {{ $cores->name }}
              </h4>
              <!-- End Title -->

              @empty( !$cores->description )
                <!-- Description -->
                <div class="dynamic__downloads-list--description">
                  {!! $cores->description !!}
                </div>
                <!-- End Description -->
              @endempty

              <!-- Content -->
              <div class="masonry-downloads dynamic__downloads-list--content">

                  @foreach( $cores->children as $subitem )

                    <div class="grid-sizer"></div>

                    <!-- SubList -->
                    <div class="masonry-downloads-item col dynamic__downloads-sublist">

                      <!-- List -->
                      <div class="dynamic__downloads-sublist--list">

                        <!-- Header -->
                        <div class="dynamic__downloads-sublist--list---header">

                          <!-- Title -->
                          <h5 class="dynamic__downloads-sublist--list---header----title">
                            {{ $subitem->name }}
                          </h5>
                          <!-- End Title -->

                        </div>
                        <!-- End Header -->

                        @empty( !$subitem->description )

                          <!-- Header -->
                          <div class="dynamic__downloads-sublist--list---text text text-size-14">

                            {!! $subitem->description !!}

                          </div>
                          <!-- End Header -->

                        @endempty

                        @empty( !$subitem->courses )

                          <!-- List -->
                          <ul class="accordion-downloads dynamic__accordion-list">

                            @foreach( $subitem->courses as $accordion )

                              <li>

                                <!-- Title -->
                                <a
                                  href="javascript:;"
                                  class="accordion-downloads-title dynamic__accordion-list--title"
                                  data-program="{{ $section['dynamic_downloads_catalog_id'] }}"
                                  data-course="{{ $accordion->id }}"
                                >
                                  <h4>{{ $accordion->title }}</h4>
                                </a>
                                <!-- End Title -->

                                <!-- Content -->
                                <div class="accordion-downloads-body dynamic__accordion-list--content text text-size-16"></div>
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

           @endif

          @endforeach

        @endempty

        </div>
        <!-- End Row -->

    </div>
    <!-- End List -->
    @endempty

  </div>
  <!-- End Download Course -->
@endempty
