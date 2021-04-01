<!-- Month Panel -->
<div class="recfilter_section__month">

  <!-- List -->
  <ul>

    <li>
      <a
        href="#prev-month"
        class="recfilter_section__month-left filterNewsEventMonth"
        data-month="@isset( $month_prev ) {{ $month_prev  }}@else{{ date('Y-m-d', strtotime('-1 month', strtotime(date('Y-m-d')))) }}@endisset"
      >
        <span>{{ _e( 'Previous Month' ) }}</span>
      </a>
    </li>

    <li>
      <div class="recfilter_section__month-center">
        <span>@isset( $month ) {{ date('F Y', strtotime($month)) }} @else {{ date('F Y') }} @endisset</span>
        <input type="hidden" name="month" value="@isset( $month ){{ $month  }}@else{{ date('Y-m-d H:i:s') }}@endisset" class="filterNewsEventFormDate">
      </div>
    </li>

    <li>
      <a
        href="#next-month"
        class="recfilter_section__month-right filterNewsEventMonth"
        data-month="@isset( $month_next ){{ $month_next  }}@else{{ date('Y-m-d', strtotime('+1 month', strtotime(date('Y-m-d')))) }}@endisset"
      >
        <span>{{ _e( 'Next Month' ) }}</span>
      </a>
    </li>

  </ul>
  <!-- End List -->

</div>
<!-- End Month Panel -->
