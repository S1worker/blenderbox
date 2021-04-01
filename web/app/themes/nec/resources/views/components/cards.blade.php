<!-- Component: Cards -->
<section class="cards {{ $field['style'] }}">

  <!-- Container -->
  <div class="container-fluid">

    <!-- Inner -->
    <div class="cards__inner">

    @empty( !$field['title'] )
      <!-- Title -->
        <h3 class="cards__title">
          {{ $field['title'] }}
        </h3>
        <!-- End Title -->
    @endempty

    @empty( !$field['text'] )
      <!-- Title -->
        <div class="cards__text text text-size-18">
          {!! $field['text'] !!}
        </div>
        <!-- End Title -->
      @endempty

      <div class="cards__list">
        @foreach($field['cards'] as $item)
          <a
            href="{{ $item['link']['url'] }}"
            target="{{ $item['link']['target'] }}"
            class="cards__item {{ $field['style'] }}"
          >

            <img
              class="cards__item__image"
              src="{{ kama_thumb_src( 'w=400 &h=400 &attach_id=' . $item['image'] ) }}"
              title=""
              alt="{{ $site_name }}"
            >

            <div class="cards__item__info">

              <h2 class="cards__item__title">
                {{ $item['title'] }}
              </h2>

            @empty( !$item['text'] )
              <!-- Text -->
                <div class="cards__item__text text text-size-16">
                  {{ $item['text'] }}
                </div>
                <!-- End Text -->
              @endempty

              <p class="cards__item__link">{{ $item['link']['title'] }}</p>
            </div>
          </a>
        @endforeach
      </div>
    </div>
    <!-- End Inner -->

  </div>
  <!-- End Container -->

</section>
<!-- End Component: Cards -->
