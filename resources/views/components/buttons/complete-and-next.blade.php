<div>
    @if($workout->is_completed == 0)
    <a href="{{ route('completedAndNext', ['workout' => $workout->id]) }}" class="btn btn-success btn-sm btn-icon-split mr-2">
        <span class="icon text-white-50">
            <i class="fas fa-check"></i>
        </span>
        <span class="text">{{ __("Complete And Next") }}</span>
    </a>
    @else
    <a class="btn btn-success disabled btn-sm btn-icon-split mr-2">
        <span class="icon text-white-50">
            <i class="fas fa-check"></i>
        </span>
        <span class="text">{{ __("Complete And Next") }}</span>
    </a>
    @endif
</div>