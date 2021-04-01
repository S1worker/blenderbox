<!-- Dynamic Video -->
<div class="dynamic__video" data-nav-scroll id="{{ $section['id_section'] }}">

  @empty( !$section['dynamic_video_title'] )
    <!-- Title -->
    <h3 class="dynamic__video-title">
      {{ $section['dynamic_video_title'] }}
    </h3>
    <!-- End Title -->
  @endempty

  @empty( !$section['dynamic_video_file'] )
    <!-- File -->
    <div class="dynamic__video-file video-player">
      <video
        controls=""
        poster="{{ $section['dynamic_video_image'] }}"
        src="{{ $section['dynamic_video_file'] }}"
      ></video>
    </div>
    <!-- End File -->
    @endempty

</div>
<!-- End Dynamic Video -->
