<div class="testimonial-item bg-light rounded my-4">
    <p class="fs-5"><i class="fa fa-quote-left fa-4x text-primary mt-n4 me-3"></i>{{html_entity_decode($testimonial->testimonial_msg, ENT_NOQUOTES)}}</p>
    <div class="d-flex align-items-center">
        <img class="img-fluid flex-shrink-0 rounded-circle"
             src="{{ $testimonial->image ? URL::to('front/img/' . $testimonial->image) : URL::to('img/no-image.jpg') }}"
             src="front/img/anushka-parmar.jpeg" style="width: 65px; height: 65px;">
        <div class="ps-4">
            <h5 class="mb-1">{{$testimonial->testimonial_by}}</h5>
            @if($testimonial->rating)
            @for($i=1;$i<=5;$i++)
            @if($i<=$testimonial->rating)
            <span class="bi bi-star-fill fa fa-star checked" style="color: rgb(255, 210, 48);"></span>
            @else
            <span class="fa fa-star"></span>
            @endif
            @endfor
            
            @endif
            <br/>
            @if($testimonial->course)
            <span>{{$testimonial->course}}</span>
            @endif
        </div>
    </div>
</div>