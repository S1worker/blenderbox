<!-- Dynamic Contact -->
<div class="dynamic__contact {{ $section['dynamic_contacts_border_top'] }} {{ $section['dynamic_contacts_border_top'] }}" data-nav-scroll id="{{ $section['id_section'] }}">

  @empty( !$section['dynamic_contacts_title'] )
    <!-- Title -->
    <h5 class="dynamic__contact-title">
      {!! $section['dynamic_contacts_title'] !!}
    </h5>
    <!-- End Title -->
  @endempty

  <!-- Container -->
  <div class="dynamic__contact-container">

    <!-- Photo -->
    <div class="dynamic__contact-container--photo @empty( $section['dynamic_contacts_image'] ) none @endempty">
      @empty( !$section['dynamic_contacts_image'] )
        <img
          src="{{ kama_thumb_src( 'w=120 &h=120 &attach_id=' . $section['dynamic_contacts_image'] ) }}"
          alt="{{ $site_name }}"
          title="{!! $section['dynamic_contacts_title'] !!}"
        >
      @endempty
    </div>
    <!-- End Photo -->

    <!-- Inner -->
    <div class="dynamic__contact-container--inner">

      @empty( !$section['dynamic_contacts_name'] )
        <!-- Name -->
        <h6 class="dynamic__contact-container--inner---name">
          {{ $section['dynamic_contacts_name'] }}
        </h6>
        <!-- End Name -->
      @endempty

      @empty( !$section['dynamic_contacts_text'] )
        <!-- Text -->
        <div class="dynamic__contact-container--inner---text text text-size-16">
          <i>{{ $section['dynamic_contacts_text'] }}</i>
        </div>
        <!-- End Text -->
      @endempty

      @empty( !$section['dynamic_contacts_place'] )
        <!-- Place -->
        <div class="dynamic__contact-container--inner---place text text-size-16">
          {{ $section['dynamic_contacts_place'] }}
        </div>
        <!-- End Place -->
      @endempty

      @empty( !$section['dynamic_contacts_email'] || !$section['dynamic_contacts_phone'] )
        <!-- Footer -->
        <div class="dynamic__contact-container--inner---footer">

          @empty( !$section['dynamic_contacts_email'] )
            <a href="mailto:{{ $section['dynamic_contacts_email'] }}" class="email">
              {{ $section['dynamic_contacts_email'] }}
            </a>
          @endempty

          @empty( !$section['dynamic_contacts_phone'] )
            <a href="tel:{{ $section['dynamic_contacts_phone'] }}" class="phone">
              {{ $section['dynamic_contacts_phone'] }}
            </a>
          @endempty

        </div>
        <!-- End Footer -->
      @endempty


    </div>
    <!-- End Inner -->

  </div>
  <!-- End Container -->



</div>
<!-- End Dynamic Contact -->
