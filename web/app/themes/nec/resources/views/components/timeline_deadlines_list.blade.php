<!-- Component: Timeline -->
<section class="timeline-deadlines">

  <!-- Container -->
  <div class="container-fluid">

    <div class="timeline-deadlines__inner">

      <h3 class="timeline-deadlines__title">
        {{ $field['title'] }}
      </h3>

      <ul class="timeline-deadlines__list">
        @foreach($field['list'] as $item)
          <li class="timeline-deadlines__item">

            <h4 class="timeline-deadlines__item__title">
              {{ $item['title'] }}
            </h4>

            <p class="timeline-deadlines__item__date text text-size-24">{{ $item['date'] }}</p>
            <div class="timeline-deadlines__item__buttons">
              <a href="{{ $item['link']['url'] }}" target="{{ $item['link']['target'] }}"
                 class="timeline-deadlines__item__link">{{ $item['link']['title'] }}</a>
            </div>
          </li>
        @endforeach
      </ul>
    </div>

  </div>
  <!-- End Container -->

</section>
<!-- End Component: Timeline -->
