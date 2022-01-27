<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
    <div class="service-item d-flex flex-column text-center rounded">
        <div class="service-icon flex-shrink-0">
            <i class="fa fa-search fa-2x"></i>
        </div>
        <h5 class="mb-3">{{ $course->title }}</h5>
        <h6 class="mb-3">{{ $course->Department->title }}</h5>
        <p class="m-0">{{ Str::words($course->description, 20) }}</p>
        <a class="btn btn-square" href="{{ route('front.course', $course->id) }}"><i class="fa fa-arrow-right"></i></a>
    </div>
</div>