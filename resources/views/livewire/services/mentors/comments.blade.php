<div>
    @forelse($comments as $comment)
        <x-box.mentor.comments.item :comment="$comment" />
    @empty

    @endforelse

    {{ $comments->links() }}
</div>
