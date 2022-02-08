<div class="col-lg-4 col-md-6 portfolio-item department-{{ $term->Department->id }} wow fadeInUp" data-wow-delay="0.1s">
    <div class="rounded overflow-hidden">
        <div class="position-relative overflow-hidden">
            <img class="img-fluid w-100" src="{{ $term->image ?: URL::to('front/img/portfolio-1.jpg') }}" alt="">
            <div class="portfolio-overlay">
                <a class="btn btn-square btn-outline-light mx-1" href="front/img/portfolio-1.jpg" data-lightbox="portfolio"><i class="fa fa-eye"></i></a>
                <a class="btn btn-square btn-outline-light mx-1" href=""><i class="fa fa-link"></i></a>
            </div>
        </div>
        <div class="bg-light p-4">
            <h5 class="text-primary fw-medium mb-2">{{ $term->title }}</h5>
            <p class="lh-base mb-0">{{ Str::words($term->description, 25, ' ...') }}</p>
        </div>
    </div>
</div>
