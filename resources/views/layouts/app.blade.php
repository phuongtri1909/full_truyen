@include('layouts.partials.header')

<div class="">
    @push('scripts')
        <script>
            showSavedToast();
        </script>
    @endpush
    @include('components.toast')
    @include('components.toast-main')
    
    @yield('content')
    @include('components.top_button')
</div>

@include('layouts.partials.footer')
