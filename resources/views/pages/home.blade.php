@extends('layouts.app')
@section('title', 'Trang chủ - Web đọc truyện online miễn phí')
@section('description', '')
@section('keyword', '')


@section('content')
    <section class="pt-5 container-md">
        @include('components.list_story_home')
        @include('components.list_story_new')
        @include('components.list_story_full')
    </section>
   
@endsection

@push('styles')
  
@endpush

@push('scripts')

@endpush
