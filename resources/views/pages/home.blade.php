@extends('layouts.app')
@section('title', 'Trang chủ - Web đọc truyện online miễn phí')
@section('description', '')
@section('keyword', '')


@section('content')
    <section class="container-md">
        @include('components.list_story_home', ['list_story' => $hotStories])
        @include('components.list_story_new',['newStories' => $newStories])
        @include('components.list_story_full',['completedStories' => $completedStories])
    </section>
   
@endsection

@push('styles')
  
@endpush

@push('scripts')

@endpush
