@forelse($chapters as $chapter)
    <a href="{{ route('chapter', $chapter->slug) }}" class="list-group-item list-group-item-action">
        Chương {{ $chapter->number }}: {{ $chapter->title }}
    </a>
@empty
    <div class="p-3 text-center text-muted">Không tìm thấy kết quả</div>
@endforelse