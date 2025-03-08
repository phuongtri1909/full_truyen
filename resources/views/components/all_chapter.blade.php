@push('styles')
    <style>
        @media (min-width: 768px) {
            .w-md-auto {
                width: auto !important;
            }
        }
    </style>
@endpush

<section id="all-chapter">
    <div class="container">
        <div class="section-title d-flex justify-content-between align-items-center">
            <h5>DANH SÁCH CHƯƠNG</h5>

        </div>
         
        <div class="d-block d-md-flex align-items-center mb-3">
            <x-pagination :paginator="$chapters" />
        </div>

        <div class="list-chapter">
            <div id="chapters-container">
                @include('components.chapter-items', ['chapters' => $chapters])
            </div>
        </div>

        <div class="d-block d-md-flex align-items-center mb-3">
            <x-pagination :paginator="$chapters" />
        </div>
    </div>
</section>

@push('scripts')
   
@endpush
