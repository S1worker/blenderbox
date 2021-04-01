<!-- Dynamic Task List -->
<div class="dynamic__task_list {{ $section['dynamic_task_list_border_top'] }} {{ $section['dynamic_task_list_border_bottom'] }}" data-nav-scroll id="{{ $section['id_section'] }}">

  @empty( !$section['dynamic_task_list_title'] )
    <!-- Title -->
    <h4 class="dynamic__task_list-title">
      {{ $section['dynamic_task_list_title'] }}
    </h4>
    <!-- End Title -->
  @endempty

  @empty( !$section['dynamic_task_list_list'] )
    <!-- List -->
    <ul class="dynamic__task_list-list taskMasonry">

      <li class="grid-sizer"></li>

      @foreach( $section['dynamic_task_list_list'] as $item )
        <li class="taskMasonry-item">

          <!-- Item -->
          <div class="dynamic__task_list-list--item">

            @empty( !$item['title'] )
              <!-- Title -->
              <h5 class="dynamic__task_list-list--item---title">
                {{ $item['title'] }}
              </h5>
              <!-- End Title -->
            @endempty

            @empty( !$item['text'] )
              <!-- Text -->
              <div class="dynamic__task_list-list--item---text text text-size-18">
                {{ $item['text'] }}
              </div>
              <!-- End Title -->
            @endempty

            @empty( !$item['subtitle'] )
              <!-- Sub Title -->
              <h6 class="dynamic__task_list-list--item---subtitle">
                {{ $item['subtitle'] }}
              </h6>
                <!-- End Sub Title -->
            @endempty

            @empty( !$item['list'] )
              <!-- List -->
              <ul class="dynamic__task_list-list--item---list text text-size-16">
                @foreach( $item['list'] as $subitem )
                  <li>
                    {{ $subitem['text'] }}
                  </li>
                @endforeach
              </ul>
              <!-- End List -->
            @endempty

            @empty( !$item['link'] )
              <!-- Footer -->
              <div class="dynamic__task_list-list--item---footer">
                <a href="{{ $item['url'] }}" class="link arrow arrow-red">
                  {{ $item['title'] }}
                </a>
              </div>
              <!-- End Footer -->
            @endempty

          </div>
          <!-- End Item -->

        </li>
      @endforeach

    </ul>
    <!-- End List -->
  @endempty

</div>
<!-- End Dynamic Task List -->
