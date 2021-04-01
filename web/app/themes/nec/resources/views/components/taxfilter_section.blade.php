<!-- Component: Taxonomy Filter Section -->
<section class="taxfilter_section">

  <!-- Container -->
  <div class="container-fluid">

    <!-- Inner -->
    <div class="taxfilter_section__inner">

      <!-- Btn Mobile -->
      <div class="taxfilter_section__mobile-btn filterTaxonomyMobileBtn">
        {{ _e( 'Filter' ) }}
      </div>
      <!-- End Btn Mobile -->

      <!-- Content Mobile -->
      <div class="taxfilter_section__mobile-content filterTaxonomyMobilePopup">

        <!-- Mobile Return -->
        <div class="taxfilter_section__mobile-content--return filterTaxonomyMobileBtn">
          {{ _e( 'See Results' ) }}
        </div>
        <!-- End Mobile Return -->

      @empty( !$field['filter'] )

        <!-- Form -->
          <form action="" method="post" class="filterTaxonomy">

            <input type="hidden" name="action" value="taxonomyFilter">
            <input type="hidden" name="category" value="">
            <input type="hidden" name="posts_per_page" value="{{ $field['limit'] }}">

            <!-- Filter -->
            <div class="taxfilter_section__filter">

              <!-- Filter > List -->
              <div class="taxfilter_section__filter-list">

                <!-- Input Group -->
                <div class="taxfilter_section__filter-list--input filterTaxonomySearchGroup">

                  <!-- Input -->
                  <input
                    type="text"
                    value=""
                    name="search"
                    placeholder="{{ _e( 'Academic Program Name' ) }}"
                    class="filterTaxonomySearch"
                    autocomplete="off"
                  >
                  <!-- End Input -->

                  <!-- Submit -->
                  <button type="submit">
                    <img
                      src="@asset('images/ic_search.svg')"
                      alt="{{ $site_name }}"
                      title=""
                      class="svg"
                    >
                  </button>
                  <!-- End Submit -->

                  <!-- Result -->
                  <div class="taxfilter_section__filter-list--input---result filterTaxonomySearchResult">

                    <!-- list -->
                    <ul class="filterTaxonomySearchResultDefault">
                      @foreach( $build->getCategories(['taxonomy' => 'programs_cat', 'hide_empty' => false]) as $cat )
                        <li>
                          <a
                            href="{{ get_category_link( $cat->term_id ) }}"
                            data-id="{{ $cat->term_id }}"
                            class="filterTaxonomySearchResultCat"
                          >
                            {{ $cat->name }}
                          </a>
                        </li>
                      @endforeach
                    </ul>
                    <!-- end list -->

                    <!-- Ajax Result -->
                    <div class="taxfilter_section__filter-list--input---table filterTaxonomySearchResultTax"></div>
                    <!-- End Ajax Result -->

                  </div>
                  <!-- End Result -->

                </div>
                <!-- End Input Group -->

                <!-- Select -->
                <div class="taxfilter_section__filter-list--select">

                  <!-- Row -->
                  <div class="taxfilter_section__filter-list--select---row">

                    <!-- Col -->
                    <div class="col">

                      <select
                        class="js-select-checkbox"
                        multiple="multiple"
                        style="width: 100%"
                        data-placeholder="{{ _e( 'Program Level' ) }}"
                        name="select_level"
                      >
                        @foreach( $build->getCategories(['taxonomy' => 'programs_level', 'hide_empty' => true]) as $level )
                          <option value="{{ $level->term_id }}" data-badge="" data-value="{{ $level->term_id }}">
                            {{ $level->name }}
                          </option>
                        @endforeach
                      </select>

                    </div>
                    <!-- End Col -->

                    <!-- Col -->
                    <div class="col">

                      <select
                        class="js-select-checkbox"
                        multiple="multiple"
                        style="width: 100%"
                        data-placeholder="{{ _e( 'Campus' ) }}"
                        name="select_place"
                      >
                        @php
                          $places     = $build->newsEvents(['post_type' => 'programs', 'posts_per_page' => '-1']);
                          $places_arr = [];
                        @endphp

                        @foreach( $places as $item )

                          @php
                            $places_title = get_field('place', $item->ID);
                          @endphp

                          @if ( !array_key_exists($places_title, $places_arr) )

                            @php
                              $places_arr[$places_title] = $places_title;
                            @endphp

                            <option value="{{ $places_title }}" data-badge="" data-value="{{ $places_title }}">{{ $places_title }}</option>

                          @endif

                        @endforeach

                      </select>

                    </div>
                    <!-- End Col -->

                  </div>
                  <!-- End Row -->

                </div>
                <!-- End Select -->

              </div>
              <!-- End Filter > List -->

            </div>
            <!-- End Filter -->

          </form>
          <!-- End Form -->

          <!-- Panel -->
          <div class="taxfilter_section__panel hidden filterTaxonomyPanel">

            <!-- Badges -->
            <div class="taxfilter_section__panel-badges">

              <!-- List -->
              <ul class="filterTaxonomyBadges"></ul>
              <!-- End List -->

            </div>
            <!-- End Badges -->

            <!-- Controls -->
            <div class="taxfilter_section__panel-controls">

              <!-- Links -->
              <div>
                <a href="#clear" class="filterTaxonomyClear">
                  {{ _e( 'Clear All Filters' ) }}
                </a>
                <a href="#grid" class="filterTaxonomyView taxfilter_section__panel-controls--view">
                  {{ _e( 'View as Grid' ) }}
                </a>
              </div>
              <!-- End Links -->

            </div>
            <!-- End Controls -->

          </div>
          <!-- End Panel -->

        @endempty

      </div>
      <!-- End Content Mobile -->

    @empty( !$field['type'] )

      <!-- Ajax -->
        <div class="taxfilter_section__ajax resultTaxonomyAjax">

          <!-- Category List -->
          <ul class="resultTaxonomyAjaxCat grid_section__list grid_section__list-cat column-3">

            @foreach( $build->getCategories(['taxonomy' => 'programs_cat', 'hide_empty' => false]) as $cat )
              <li>
                <a href="{{ get_category_link( $cat->term_id ) }}">

                  <!-- Title Box -->
                  <div>
                    <p>{{ $cat->name }}</p>
                    <strong>{{ $cat->count }} Programs</strong>
                    <strong>{{ _e( 'On Campus + Online' ) }}</strong>
                    <span>{{ _e( 'See All Programs' ) }}</span>
                  </div>
                  <!-- End Title Box -->

                  @php
                    $image = get_field('category_image', 'programs_cat_' . $cat->term_id);
                  @endphp
                  <img
                    src="{{ kama_thumb_src( 'w=400 &h=540 &attach_id=' . $image['ID'] ) }}"
                    alt="{{ $site_name }}"
                    title="{{ $cat->name }}"
                  >
                </a>
              </li>
            @endforeach
          </ul>
          <!-- End Category List -->

          <!-- Post List -->
          <div class="resultTaxonomyAjaxPost">

          </div>
          <!-- End Post List -->

        </div>
        <!-- End Ajax -->

      @endempty

    </div>
    <!-- End Inner -->

  </div>
  <!-- End Container -->

</section>
<!-- END Component: Records Filter Section -->
