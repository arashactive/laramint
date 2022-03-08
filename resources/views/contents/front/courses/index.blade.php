@extends('layouts.front.theme')


@section("content")
<div class="space"></div>


<!-- Projects Start -->
<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <p class="section-title text-secondary justify-content-center"><span></span>Explorer<span></span></p>
            <h1 class="text-center mb-5">Recently Completed Course</h1>
        </div>
        <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.3s">
            <div class="col-12 text-center">
                <ul class="list-inline mb-5" id="portfolio-flters">
                    <li class="mx-2 active" data-filter="*">All</li>
                    @forelse ($departments as $department)
                        <li class="mx-2" data-filter=".department-{{ $department->id }}">{{ $department->title }}</li>
                    @empty
                    @endforelse
                </ul>
            </div>
        </div>
        <div class="row g-3 portfolio-container">
            <!-- course Start -->
                @if(count($courses) > 1)
                <div class="container-xxl py-5">
                    <div class="container py-5 px-lg-5">
                        <div class="row g-4">
                            @forelse ($courses as $course)
                                <x-front.course :course="$course"/>
                            @empty
                            @endforelse
                        </div>
                    </div>
                </div>
                @endif
            <!-- course End -->
        </div>
    </div>
</div>
<!-- Projects End -->

@endsection