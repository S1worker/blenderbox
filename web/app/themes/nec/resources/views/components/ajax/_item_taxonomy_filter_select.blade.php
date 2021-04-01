<li>

  <a href="{{ get_the_permalink( $item->ID ) }}">

    <!-- Title Box -->
    <div>
      <p>{{ $item->post_title }}</p>
      <strong>
        @php
          $level = wp_get_object_terms( $item->ID, 'programs_level', array( 'fields' => 'names' ) );
        @endphp
        {{ implode(',', $level) }}
      </strong>
      <strong class="hide">
        @php
          $category = wp_get_object_terms( $item->ID, 'programs_cat', array( 'fields' => 'names' ) );
        @endphp
        {{ implode(',', $category) }}
      </strong>
      <strong>
        {{ get_field( 'place', $item->ID ) }}
      </strong>
      <span>{{ _e( 'See Details' ) }}</span>
    </div>
    <!-- End Title Box -->

    <!-- Image -->
    <img
      src="{{ kama_thumb_src( 'w=400 &h=540 &attach_id=' . get_post_thumbnail_id( $item->ID ) ) }}"
      alt="{{ $site_name }}"
      title="{{ $item->post_title }}"
    >
    <!-- End Image -->

  </a>

</li>
