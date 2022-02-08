
<div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
    <div class="service-item d-flex flex-column text-center rounded">
        <div class="service-icon flex-shrink-0">
            {!! "<h3 class='text-white'>$iteration</h3>" ?? '<i class="fa fa-search fa-2x"></i>' !!}
        </div>
        <h5 class="mb-3">{{ $term->title }}</h5>
        <p class="m-0">{{ Str::words($term->description, 25, ' ...') }}</p>
        <a class="btn btn-square" href=""><i class="fa fa-arrow-right"></i></a>
    </div>
</div>