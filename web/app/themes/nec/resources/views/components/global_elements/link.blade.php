<a
  href="{{ $field['link'] }}"
  class="link link-{{ $field['style'] }} @empty( !$field['icon'] ) {{ $field['icon'] }} @endempty @isset( $custom_class ) {{ $custom_class }} @endisset"
>
  {{ $field['title'] }}
</a>
