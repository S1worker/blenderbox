{{--
  Template Name: Build Page
  Template Post Type: programs, page
--}}

@extends('layouts.app')

@section('content')
  @if(!empty($fields['content']))
    @foreach($fields['content'] as $field)
        @include('components.'.$field['acf_fc_layout'])
    @endforeach
  @endif
@endsection
