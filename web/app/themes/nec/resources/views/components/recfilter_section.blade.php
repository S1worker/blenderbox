<!-- Component: Records Filter Section -->
<section class="recfilter_section">

  <!-- Container -->
  <div class="container-fluid">

    <!-- Inner -->
    <div class="recfilter_section__inner filterNewsEvent">

      @empty( !$field['filter'] )
        <form action="" method="post" class="filterNewsEventForm">
          <input type="hidden" name="action" value="newsEvents">
          <input type="hidden" name="posts_per_page" value="{{ $field['limit'] }}">
          <!-- Filter Panel -->
          <div class="recfilter_section__filter">

          @php

            if( $field['filter'] ) :
              $news_cat       = null; // Category News
              $event_cat      = null; // Category Events
              $places         = null; // Place
              $column_filter  = 0;    // Column Filter

              foreach ( $field['filter'] as $filter ) :

                if( 'cat_news' == $filter ) :
                  $news_cat   = $build->getCategories(['taxonomy' => 'news_cat', 'type' => 'news', 'hide_empty' => false]);
                  $column_filter++;
                endif;

                if( 'cat_events' == $filter ) :
                  $event_cat  = $build->getCategories(['taxonomy' => 'event_cat','type' => 'event', 'hide_empty' => false]);
                  $column_filter++;
                endif;

                if( 'place' == $filter ) :
                  $places     = $build->newsEvents(['posts_per_page' => '-1']);
                  $places_arr = [];
                  $column_filter++;
                endif;

              endforeach;

            endif;

          @endphp

          <!-- List -->
            <ul class="recfilter_section__filter-list column-{{ $column_filter }}">

              @empty( !$event_cat )
                <li>
                  <select name="event" class="js-select" style="width: 100%">
                    <option value="0">{{ _e( 'Event Type' ) }}</option>
                    @foreach( $event_cat as $item )
                      <option value="{{ $item->term_id }}">{{ $item->name }}</option>
                    @endforeach
                  </select>
                </li>
              @endempty

              @empty( !$news_cat )
                <li>
                  <select name="news" class="js-select" style="width: 100%">
                    <option value="0">{{ _e( 'News Type' ) }}</option>
                    @foreach( $news_cat as $item )
                      <option value="{{ $item->term_id }}">{{ $item->name }}</option>
                    @endforeach
                  </select>
                </li>
              @endempty

              @empty( !$places )
                <li>
                  <select name="place" class="js-select" style="width: 100%">
                    <option value="0">{{ _e( 'Campus' ) }}</option>

                    @foreach( $places as $item )

                      @php
                        $places_title = get_field('place', $item->ID);
                      @endphp

                      @if ( !array_key_exists($places_title, $places_arr) )

                        @php
                          $places_arr[$places_title] = $places_title;
                        @endphp

                        <option value="{{ $places_title }}">{{ $places_title }}</option>
                      @endif

                    @endforeach

                  </select>
                </li>
              @endempty

            </ul>
            <!-- End List -->

          </div>
          <!-- End Filter Panel -->
        </form>
      @endempty

      @empty( !$field['type'] )
        <div class="resultAjax">

          @if( $field['month'] )
            <div class="filterNewsEventFormMonth">
              @include('components.repeater._recfilter_month')
            </div>
        @endif

        <!-- Records -->
          <div class="recfilter_section__records">

          @php

            $args = [
              'posts_per_page'  => ($field['limit']) ? $field['limit'] : 10,
              'post_type'       => $field['type'],
            ];

            if( $field['month'] ) :
              $today = getdate();
              $args['date_query'] = [
                'monthnum' => $today['mon'],
              ];
            endif;

            $items = $build->newsEvents($args);

          @endphp

          <!-- List -->
            <div class="recfilter_section__list newsevent-masonry">
            @empty( $items )

              <!-- No Results -->
                <div class="recfilter_section__records-empty">
                  {{ _e('No records were found for your search. Try changing the request.') }}
                </div>
                <!-- End No Results -->

              @else

                <div class="grid-sizer"></div>

                @empty( !$field['banner']['banner_status'] )
                <!-- Banner -->
                  <div class="recfilter_section__list-item recfilter_section__list-item--banner item {{ $field['banner']['banner_background'] }}">

                    <!-- Container -->
                    <div class="recfilter_section__list-item--banner---container">

                      @empty( !$field['banner']['banner_title'] )
                        <h5 class="recfilter_section__list-item--banner---title">
                          {{ $field['banner']['banner_title'] }}
                        </h5>
                      @endempty

                      @empty( !$field['banner']['banner_text'] )
                        <div class="recfilter_section__list-item--banner---text">
                          {{ $field['banner']['banner_text'] }}
                        </div>
                      @endempty

                      @empty( !$field['banner']['banner_link'] )
                        <div class="recfilter_section__list-item--banner---link">
                          <a href="{{ $field['banner']['banner_link']['url'] }}">
                            {{ $field['banner']['banner_link']['title'] }}
                          </a>
                        </div>
                      @endempty

                    </div>
                    <!-- End Container -->

                  </div>
                  <!-- End Banner -->
                @endempty

                @foreach( $items as $item )
                  <div class="recfilter_section__list-item item">

                    @include('components.repeater._news_events_card', ['item' => $item])

                  </div>
                @endforeach

              @endempty
            </div>
            <!-- End List -->

          </div>
          <!-- End Records -->

        </div>
      @endempty

    </div>
    <!-- End Inner -->

  </div>
  <!-- End Container -->

</section>
<!-- END Component: Records Filter Section -->
