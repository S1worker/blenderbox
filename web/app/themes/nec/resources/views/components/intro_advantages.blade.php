@empty( !$field['advantages'] )

  <!-- Component: Intro Advantages -->
  <section class="intro_advantages">

    <!-- Container -->
    <div class="container-fluid">

      <!-- Container -->
      <div class="intro_advantages__container">

        <!-- List -->
        <ul class="intro_advantages__list">

          @foreach( $field['advantages'] as $item )

            <li>

              <!-- Icon -->
              <div class="intro_advantages__list-icon">

                <img
                  src="{{ $item['icon'] }}"
                  alt=""
                  title=""
                  class="svg"
                >

              </div>
              <!-- End Icon -->

              <!-- Title -->
              <h4 class="intro_advantages__list-title">

                {{ $item['title'] }}

              </h4>
              <!-- End Title -->

              <!-- Text -->
              <div class="intro_advantages__list-text text text-size-18">
                {!! $item['text'] !!}
              </div>
              <!-- End Text -->

            </li>

          @endforeach

        </ul>
        <!-- End List -->

      </div>
      <!-- End Container -->

    </div>
    <!-- End Container -->

  </section>
  <!-- END Component: Intro Advantages -->

@endempty
