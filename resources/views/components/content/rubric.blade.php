<div class="p-4">
    <h3>{{ $rubric->title }}</h3>
    <h6>{{ $rubric->description }}</h6>
    <hr />
    <div class="m-4">
        
        @forelse ($bodies as $body)
        <div class="row text-center">

            <div class="col bg-danger p-3 text-light border border-white">{{ $body->item_title }}</div>
            @forelse ($body->cells as $cell)
            <div class="col bg-{{ isset($cell->pass) ? 'success' : 'secondary' }} p-3 text-light border border-white">
                <small>{{ $cell->title }}</small>
                <br />
                <strong>{{ $cell->score }}</strong>
            </div>

            @empty

            @endforelse
        </div>
        @empty

        @endforelse
    </div>
</div>