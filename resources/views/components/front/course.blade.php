<div class="col-lg-4 col-md-6 portfolio-item department-{{ $course->Department->id }} wow fadeInUp" data-wow-delay="0.1s">
    <div class="rounded overflow-hidden">
        <div class="position-relative overflow-hidden">
            <img class="img-fluid w-100" src="{{ URL::to('course/' . $course->image)  ?: URL::to('front/img/portfolio-1.jpg') }}" alt="">
            <div class="portfolio-overlay">
                <a class="btn btn-square btn-outline-light mx-1" href="{{ route('front.course' , $course->id) }}">
                    <i class="fa fa-link"></i>
                </a>
            </div>
        </div>
        <div class="bg-light p-4">
            <div class="d-flex justify-content-between">
                <h5 class="text-primary fw-medium mb-2">{{ $course->title }}</h5>
            
                <a href="{{ route('front.course', $course->id) }}" class="btn btn-sm btn-primary">
                <i class="fa fa-book"></i> 
                <span class="badge badge-light">{{ $course->Terms->count() }}</span>
                </a>
            </div>
            <h6 class="text-secondary fw-medium mb-2">{{ $course->Department->title }}</h6>
            <p class="lh-base mb-0">{{ Str::words($course->description, 25, ' ...') }}</p>
            <a href="{{ route('front.course', $course->id) }}" class="btn rounded-pill py-2 px-4 ms-3 d-none d-lg-block">
                {{ __('read more') }}
            </a>
        </div>
    </div>
</div>