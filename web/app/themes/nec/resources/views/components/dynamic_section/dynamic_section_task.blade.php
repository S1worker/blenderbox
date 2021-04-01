<!-- Dynamic Task -->
<div class="dynamic__task {{ $section['dynamic_task_border_top'] }} {{ $section['dynamic_task_border_bottom'] }}" data-nav-scroll id="{{ $section['id_section'] }}">

  @empty( !$section['dynamic_task_title'] )
    <!-- Title -->
    <h3 class="dynamic__task-title">
      {{ $section['dynamic_task_title'] }}
    </h3>
    <!-- End Title -->
  @endempty

  @empty( !$section['dynamic_task_text'] )
    <!-- Text -->
    <div class="dynamic__task-text text text-size-18">
      {{ $section['dynamic_task_text'] }}
    </div>
    <!-- End Text -->
  @endempty

  @empty( !$section['dynamic_task_subtitle'] )
    <!-- Subtitle -->
    <h4 class="dynamic__task-subtitle">
      {{ $section['dynamic_task_subtitle'] }}
    </h4>
    <!-- End Subtitle -->
  @endempty

  @empty( !$section['dynamic_task_list'] )

    <!-- List -->
    <ul class="dynamic__task-list">

      @foreach( $section['dynamic_task_list'] as $item )
        <li>
          <!-- Item -->
          <div class="dynamic__task-list--item">

            <!-- Header -->
            <div class="dynamic__task-list--item---header text text-size-18">

              @empty( !$item['title'] )
                <span>
                  {{ $item['title'] }}
                </span>
              @endempty

              @empty( !$item['time'] )
                <p>
                  {{ $item['time'] }}
                </p>
              @endempty

              @empty( !$item['place'] )
                <p>
                  {{ $item['place'] }}
                </p>
              @endempty

            </div>
            <!-- End Header -->

            @empty( !$item['link'] )

              <!-- Footer -->
              <div class="dynamic__task-list--item---footer">
                <a href="{{ $item['link']['url'] }}" class="link arrow arrow-red">
                  {{ $item['link']['title'] }}
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
<!-- End Dynamic Task -->
