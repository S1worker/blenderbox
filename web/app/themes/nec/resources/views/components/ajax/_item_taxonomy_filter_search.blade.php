<li>

    @if( $type == 'category' )
      <a
        href="{{ get_category_link($item->term_id) }}"
        data-id="{{ $item->term_id }}"
        class="filterTaxonomySearchResultCat"
      >
        <!-- Title -->
        <div class="title full">
          {{ $item->name }}
        </div>
        <!-- End Title -->
      </a>
    @elseif( $type == 'post' )
      <a href="{{ get_the_permalink($item->ID) }}">

        <!-- Title -->
        <div class="title ">
          {{ $item->post_title }}
        </div>
        <!-- End Title -->

        <!-- Level -->
        <div class="level">
          @php
            //$level = wp_get_object_terms( $item->ID, 'programs_level', array( 'fields' => 'names' ) );
          @endphp
          {{ get_field( 'level_knowledge', $item->ID ) }}
        </div>
        <!-- End Level -->

        <!-- Category -->
        <div class="category">
          @php
            $category = wp_get_object_terms( $item->ID, 'programs_cat', array( 'fields' => 'names' ) );
          @endphp
          {{ implode(',', $category) }}
        </div>
        <!-- End Category -->

        <!-- Link -->
        <div class="link">
          {{ _e( 'See Details' ) }}
        </div>
        <!-- End Link -->
      </a>
    @endif



</li>
