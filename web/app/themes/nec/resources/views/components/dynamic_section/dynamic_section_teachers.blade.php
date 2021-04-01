@empty( !$section['dynamic_teachers_list'] )
  <!-- Dynamic Download Course -->
  <div class="dynamic__teachers {{ $section['dynamic_teachers_border_top'] }} {{ $section['dynamic_teachers_border_bottom'] }}" data-nav-scroll id="{{ $section['id_section'] }}">

    <!-- Title -->
    <h3 class="dynamic__teachers-title">
      {{ $section['dynamic_teachers_title'] }}
    </h3>
    <!-- End Title -->

    <!-- List -->
    <ul class="dynamic__teachers-list">

      @foreach( $section['dynamic_teachers_list'] as $item )


        <li>

          <!-- Item -->
          <a href="{{ $item['link']['url'] }}" class="dynamic__teachers-list--item">

            @empty( !$item['image'] )
            <!-- Header -->
            <div class="dynamic__teachers-list--item---header">
              <img
                src="{{ kama_thumb_src( 'w=400 &h=300 &attach_id=' . $item['image'] ) }}"
                alt="{{ $site_name }}"
                title="{{ $item['title'] }}"
              >
            </div>
            <!-- End Header -->
            @endempty

            <!-- Content -->
            <div class="dynamic__teachers-list--item---content">

              <!-- Title -->
              <h4 class="dynamic__teachers-list--item---content----title">
                {{ $item['title'] }}
              </h4>
              <!-- End Title -->

              <!-- SubTitle -->
              <div class="text text-size-18">
                {{ $item['subtitle'] }}
              </div>
              <!-- End SubTitle -->

            </div>
            <!-- End Content -->

          </a>
          <!-- End Item -->

        </li>


      @endforeach

    </ul>
    <!-- End List -->

  </div>
  <!-- End Download Course -->
@endempty
