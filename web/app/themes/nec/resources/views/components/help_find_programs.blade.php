<!-- Component: Find Programs -->
<section class="find_programs">

  <!-- Container -->
  <div class="container-fluid">

    <div class="find_programs__inner">

      <h3 class="find_programs__title">
        {{ $field['title'] }}
      </h3>

      <div class="find_programs__text">{{ $field['text'] }}</div>
      <form action="{{ $field['link']['url'] }}" method="GET" class="find_programs__form">
        @foreach($get_programs as $program)
          <label class="find_programs__item">
            <input type="checkbox" name="program[]" value="{{ $program->term_id }}">
            <span>{!! $program->name !!}</span>
          </label>
        @endforeach
        <div class="find_programs__submit">
          <button type="submit" class="link arrow arrow-red">{{ $field['link']['title'] }}</button>
        </div>
      </form>
      <div class="find_programs__help">{!! $field['help_text'] !!}</div>
    </div>

  </div>
  <!-- End Container -->

</section>
<!-- End Component: Find Programs -->
