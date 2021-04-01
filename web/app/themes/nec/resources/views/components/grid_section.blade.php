<!-- Component: Grid Section -->
<section class="grid_section">

  <!-- Container -->
  <div class="container-fluid">

    <!-- Inner -->
    <div class="grid_section__inner">

      <!-- Inner > Container -->
      <div class="grid_section__container">

      @empty( !$field['title'] )
        <!-- Title -->
          <h3 class="grid_section__title @empty( !$field['text'] ) has-text @endempty">
            {{ $field['title'] }}
          </h3>
          <!-- End Title -->
      @endempty

      @empty( !$field['text'] )
        <!-- Text -->
          <div class="grid_section__text text text-size-18">
            {{ $field['text'] }}
          </div>
          <!-- End Text -->
      @endempty

      @if( count($field['list']) )
        <!-- List -->
          <ul class="grid_section__list column-{{ $field['column'] }}">

            @foreach ( $field['list'] as $item )
              <li>
                <a href="{{ $item['list_link']['url'] }}">

                  <!-- Title Box -->
                  <div>
                    <p class="h2">{{ $item['list_title'] }}</p>
                    <span>{{ $item['list_link']['title'] }}</span>
                  </div>
                  <!-- End Title Box -->

                  <img
                    src="{{ $item['list_image'] }}"
                    alt="{{ $site_name }}"
                    title="{{ $item['list_title'] }}"
                  >
                </a>
              </li>
            @endforeach

          </ul>
          <!-- End List -->
        @endif

      </div>
      <!-- End Inner > Container -->

    </div>
    <!-- End Inner -->

  </div>
  <!-- End Container -->

</section>
<!-- END Component: Grid Section -->
