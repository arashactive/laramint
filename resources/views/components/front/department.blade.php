
<div class="col-lg-4 wow fadeInUp" data-wow-delay="0.1s">
    <div class="feature-item bg-light rounded text-center p-4">
        <i class="fa fa-3x fa-mail-bulk text-primary mb-4"></i>
        <h5 class="mb-3">{{ $department->title }}</h5>
        <p class="m-0">{{ Str::words($department->description, 30, '...') }}</p>
    </div>
</div>
