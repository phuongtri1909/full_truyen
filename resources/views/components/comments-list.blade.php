{{-- Show pinned comments first --}}
@foreach($pinnedComments as $comment)
    @include('components.comments-item', ['comment' => $comment])
@endforeach

{{-- Show regular comments --}}
@foreach($regularComments as $comment)
    @include('components.comments-item', ['comment' => $comment])
@endforeach