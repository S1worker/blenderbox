<!-- Dynamic Quick Links -->
<div class="dynamic__quicklinks {{ $section['dynamic_quick_links_border_top'] }} {{ $section['dynamic_quick_links_border_bottom'] }}" data-nav-scroll id="{{ $section['id_section'] }}">

  @empty( !$section['dynamic_quick_links_title'] )
    <!-- Title -->
    <h3 class="dynamic__quicklinks-title">
      {{ $section['dynamic_quick_links_title'] }}
    </h3>
    <!-- End Title -->
  @endempty

  @empty( !$section['dynamic_quick_links_list'] )

    <!-- Row -->
    <div class="dynamic__quicklinks-row @empty( !$section['dynamic_quick_links_image'] ) has-image @endempty">

      @empty( !$section['dynamic_quick_links_image'] )

        <!-- Image -->
        <div class="dynamic__quicklinks-image">
          <img
            src="{{ kama_thumb_src( 'w=400 &h=400 &attach_id=' . $section['dynamic_quick_links_image'] ) }}"
            alt="{{ $site_name }}"
            title="{{ $site_name }}"
          >
        </div>
        <!-- End Image -->

      @endempty

      <!-- Col -->
      <div class="dynamic__quicklinks-col">

        <!-- Container -->
        <div class="dynamic__quicklinks-container">

        @empty( !$section['dynamic_quick_links_subtitle'] )
          <!-- Title -->
            <h4 class="dynamic__quicklinks-subtitle">
              {{ $section['dynamic_quick_links_subtitle'] }}
            </h4>
            <!-- End Title -->
        @endempty

        <!-- List -->
          <ul class="dynamic__quicklinks-list">

            @foreach( $section['dynamic_quick_links_list'] as $item )

              <li>

                <!-- Item -->
                <a href="{{ $item['link']['url'] }}" class="dynamic__quicklinks-list--item text text-size-18">
            <span>
              {{ $item['link']['title'] }}
            </span>
                </a>
                <!-- End Item -->

              </li>

            @endforeach

          </ul>
          <!-- End List -->

        </div>
        <!-- End Container -->

      </div>
      <!-- End Col -->

    </div>
    <!-- End Row -->



  @endempty



</div>
<!-- End Quick Links -->

