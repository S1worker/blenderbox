<article @php post_class(['newssingle']) @endphp>

  <!-- Intro -->
  <section class="newssingle__intro">

    <!-- Container -->
    <div class="container-fluid">

      <!-- Container -->
      <div class="newssingle__intro-container">

        <!-- Text -->
        <div class="newssingle__intro-text">

          <!-- Badge -->
          <div class="newssingle__intro-text--badge">
            {{ _e( 'news' ) }}
          </div>
          <!-- End Badge -->

          <!-- Title -->
        {{ the_title('<h1 class="newssingle__intro-text--title">', '</h1>') }}
        <!-- End Title -->

          <!-- Info -->
          <div class="newssingle__intro-text--info">

            @empty( !get_field( 'date', get_the_ID() ) )
              <span>{{ get_field( 'date', get_the_ID() ) }}</span>
            @endempty

            @empty( !get_field( 'place', get_the_ID() ) )
              <span>{{ get_field( 'place', get_the_ID() ) }}</span>
            @endempty

          </div>
          <!-- End Info -->

        @empty( !wp_get_post_tags( get_the_ID() ) )
          <!-- Tags -->
            <ul class="newssingle__intro-text--tags">

              @foreach( wp_get_post_tags( get_the_ID() ) as $tag )
                <li>
                  <a href="{{ get_tag_link( $tag->term_id ) }}">
                    {{ $tag->name }}
                  </a>
                </li>
              @endforeach

            </ul>
            <!-- End Tags -->
          @endempty

        </div>
        <!-- End Text -->

      @if( has_post_thumbnail() )
        <!-- Image -->
          <div class="newssingle__intro-image">
            <img
              src="{{ kama_thumb_src( 'w=490 &h=360' ) }}"
              alt="{{ $site_name }}"
              title="{{ get_the_title() }}"
            >
          </div>
          <!-- End Image -->
        @endif

      </div>
      <!-- End Container -->

    </div>
    <!-- End Container -->

  </section>
  <!-- End Intro -->

  <!-- Content -->
  <section class="newssingle__content">

    <!-- Container -->
    <div class="container-fluid">

      <!-- Container -->
      <div class="newssingle__content-container">

        <!-- Share -->
        <div class="newssingle__share">

          <!-- Share > Title -->
          <div class="newssingle__share-title">
            {{ _e( 'Share' ) }}
          </div>
          <!-- End Share > Title -->

          <!-- Share > List -->
          <ul class="newssingle__share-list">
            <li>
              <a href="http://facebook.com/" target="_blank">
                <img
                  src="@asset('images/social/ic_facebook.svg')"
                  alt=""
                  title=""
                  class="svg"
                >
              </a>
            </li>
            <li>
              <a href="https://www.instagram.com/" target="_blank">
                <img
                  src="@asset('images/social/ic_insta.svg')"
                  alt=""
                  title=""
                  class="svg"
                >
              </a>
            </li>
            <li>
              <a href="https://twitter.com/" target="_blank">
                <img
                  src="@asset('images/social/ic_twitter.svg')"
                  alt=""
                  title=""
                  class="svg"
                >
              </a>
            </li>
          </ul>
          <!-- End Share > List -->

        </div>
        <!-- End Share -->

        <!-- Border Top -->
        <div class="newssingle__content-border">

          <!-- Inner -->
          <div class="newssingle__content-inner">

            {{ the_content() }}

          </div>
          <!-- End Inner -->

        </div>
        <!-- End Border Top -->

      </div>
      <!-- End Container -->

    </div>
    <!-- End Container -->

  </section>
  <!-- End Content -->

  <!-- Related Records -->
  <div class="newssingle__related">
    @php
        $news_events = (new \App\Controllers\BuildPage)->newsEvents([
          'type'            => 'news',
          'posts_per_page'  => 3,
        ])
    @endphp

    @include( 'components/news_events', [
      'news_events' => $news_events,
      'field' => [
        'title' => 'Discover More News + Events',
        'link' => [
          'url'     => '',
          'target'  => '',
          'title'   => 'View All News + Events',
        ]
      ]
    ] )
  </div>
  <!-- End Related Records -->

</article>
