<div>
    @forelse($comments as $comment)
        <x-box.item :title="$comment->body" :color="'danger'" />
    @empty

    @endforelse

    
</div>
