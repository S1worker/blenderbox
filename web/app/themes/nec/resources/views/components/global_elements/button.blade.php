<a
  href="{{ $field['link'] }}"
  class="btn btn-{{ $field['style'] }} @empty( !$field['icon'] ) {{ $field['icon'] }} @endempty @isset( $custom_class ) {{ $custom_class }} @endisset"
>
  {{ $field['title'] }}
</a>
