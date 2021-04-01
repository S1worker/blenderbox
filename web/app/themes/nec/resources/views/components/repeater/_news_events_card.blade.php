<a class="news_events__item" href="{{get_post_permalink($item->ID)}}" target="_self">

  @if( has_post_thumbnail( $item->ID ) )
  <img
    class="news_events__item__image"
    src="{{ kama_thumb_src( 'w=400 &h=230 &attach_id=' . get_post_thumbnail_id($item->ID) ) }}"
    srcset="{{ get_the_post_thumbnail_url($item->ID, 'full') }} 2x, {{ get_the_post_thumbnail_url($item->ID, 'large') }} 1200w, {{ get_the_post_thumbnail_url($item->ID, 'medium') }} 800w"
    alt="{{ $site_name }}"
  >
  @endif

  <div class="news_events__item__info">
    <div class="news_events__item__post {{ $item->post_type }}">{{ $item->post_type }}</div>

    <h4 class="news_events__item__title">
      {{ $item->post_title }}
    </h4>

    <p class="news_events__item__date text text-size-18">{{ get_field('date', $item->ID) }}</p>
    <p class="news_events__item__place text text-size-18">{{ get_field('place', $item->ID) }}</p>
    <ul class="news_events__item__cats">

      @if( wp_get_post_tags($item->ID) )

        @foreach(wp_get_post_tags( $item->ID ) as $tag)
          <li class="news_events__item__cat">{{ $tag->name }}</li>
        @endforeach

      @endif

    </ul>
  </div>
</a>
