<blockquote class="blockquote">
  {!! $field['text'] !!}

  @empty( !$field['footer_title'] || !$field['footer_text'] )
  <cite>
    @empty( !$field['footer_title'] )
    <strong>{{ $field['footer_title'] }}</strong>
    @endempty
    @empty( !$field['footer_text'] )
    {{ $field['footer_text'] }}
    @endempty
  </cite>
  @endempty

</blockquote>
