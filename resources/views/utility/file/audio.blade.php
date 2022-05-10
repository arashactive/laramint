<div class="text-center">
    <h3>{{ __('description: ') }} {{ $file->description }}</h3>
    <hr />

    <audio controls>
        <source src="{{ $url }}" type="audio/mpeg">
        Your browser does not support the audio element.
    </audio>
    
</div>