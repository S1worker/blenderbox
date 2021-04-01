@php

  $type = ['news', 'event'];

  if( !empty( $field['type'] ) ) :
      if( $field['type'] <> 'all' ) :
          $type = $field['type'];
      endif;
  endif;

  $news_events = (new \App\Controllers\BuildPage)->newsEvents([
    'post_type'       => $type,
    'posts_per_page'  => 3,
  ]);

@endphp

  @if($news_events)

  <!-- Component: News and Events -->
  <section class="news_events">

    <!-- Container -->
    <div class="container-fluid">

      <!-- Inner -->
      <div class="news_events__inner">

        <!-- Header -->
        <div class="news_events__head">

          <!-- Title -->
          <h3 class="news_events__title">
            {{ $field['title'] }}
          </h3>
          <!-- End Title -->

          @empty( !$field['link'] )
            <a
              href="{{ $field['link']['url'] }}"
              target="{{ $field['link']['target'] }}"
              class="btn btn-black-opacity arrow news_events__link"
            >
              {{ $field['link']['title'] }}
            </a>
          @endempty

        </div>
        <!-- End Header -->

        <!-- List -->
        <div class="news_events__list">
          @foreach($news_events as $item)
            @include('components.repeater._news_events_card', ['item' => $item])
          @endforeach
        </div>
        <!-- End List -->

      </div>
      <!-- Inner -->

    </div>
    <!-- End Container -->

  </section>
  <!-- End Component: News and Events -->

@endif
