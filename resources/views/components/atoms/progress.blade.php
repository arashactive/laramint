<div class="progress">
    <div class="progress-bar {{ $color }}" 
    role="progressbar" 
    style="width: {{ $width }}%" 
    aria-valuenow="{{ $width }}" 
    aria-valuemin="0" aria-valuemax="100">
    {{ $width . '%'}}
    </div>
</div>