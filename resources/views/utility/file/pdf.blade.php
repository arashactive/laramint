<div class="text-center">
    <h3>{{ __('description: ') }} {{ $file->description }}</h3>
    <hr/>
    <object data="{{ $url }}" type="application/pdf" width="100%" height="100%">
        <p>Alternative text - include a link <a href="{{ $url }}">to the PDF!</a></p>
    </object>

</div>