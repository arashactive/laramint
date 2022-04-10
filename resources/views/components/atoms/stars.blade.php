<div class="text-warning">
    
    @if($score < 70)
    <i class="fa fa-star text-secondary"></i>
    <i class="fa fa-star text-secondary"></i>
    <i class="fa fa-star text-secondary"></i>

    @elseif($score >= 70 && $score <= 75)
    <i class="fa fa-star-half-alt"></i>
    <i class="fa fa-star text-secondary"></i>
    <i class="fa fa-star text-secondary"></i>

    @elseif($score > 75 && $score <= 80)
    <i class="fa fa-star"></i>
    <i class="fa fa-star text-secondary"></i>
    <i class="fa fa-star text-secondary"></i>

    @elseif($score > 80 && $score <= 85)
    <i class="fa fa-star"></i>
    <i class="fa fa-star-half-alt"></i>
    <i class="fa fa-star text-secondary"></i>

    @elseif($score > 85 && $score <= 90)
    <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
    <i class="fa fa-star text-secondary"></i>

    @elseif($score > 90 && $score <= 95)
    <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
    <i class="fa fa-star-half-alt"></i>

    @elseif($score > 95) 
    
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
   
    @else 
        <div class="text-danger">
            {{ $score }}
        </div>
    @endif


</div>
