<!-- Dynamic Contacts -->
<div class="dynamic__contacts">

  @empty( !$section['title'] )
    <!-- Title -->
    <h4 class="dynamic__contacts-title">
      {{ $section['title'] }}
    </h4>
    <!-- End Title -->
  @endempty

  @empty( !$section['list'] )

    <!-- List -->
    <ul class="dynamic__contacts-list">

    @foreach( $section['list'] as $item )

      <li>

        @empty( !$item['title'] )

          <!-- Title -->
          <h6 class="dynamic__contacts-list--title">
            {{ $item['title'] }}
          </h6>
          <!-- End Title -->

        @endempty

        @empty( !$item['text'] )

          <!-- Text -->
          <div class="dynamic__contacts-list--text text- text-size-16">
            {!! $item['text'] !!}
          </div>
          <!-- End Text -->

        @endempty

      </li>

    @endforeach

    </ul>
    <!-- End List -->

  @endempty

</div>
<!-- End Dynamic Contacts -->
