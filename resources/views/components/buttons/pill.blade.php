@if($count > 0)
<div class="m-1">
    <span class="badge badge-pill badge-{{$theme}}">{{ __( $name . ':') }} {{ $count }}</span>
</div>
@endif