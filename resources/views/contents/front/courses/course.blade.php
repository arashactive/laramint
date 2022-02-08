@extends('layouts.front.theme')


@section("content")

<div class="container-xxl bg-success hero-header">
    <div class="container px-lg-5">
        <div class="row g-5 align-items-end">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="text-white mb-4 animated slideInDown">
                   {{ $course->Department->title }} {{ $course->title }}
                </h1>
                <p class="text-white pb-3 animated slideInDown">
                    {{ $course->description }}
                </p>
                <a href="" class="btn btn-secondary py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">{{ __('Enroll') }}</a>
                <a href="" class="btn btn-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">{{ __('Contact Us') }}</a>
            </div>
            <div class="col-lg-6 text-center text-lg-start">
                <img class="img-fluid animated zoomIn" src="{{ URL::to('front/img/hero.png') }}" alt="">
            </div>
        </div>
    </div>
</div>




<!-- Terms Start -->
<div class="container-xxl py-5">
    <div class="container py-5 px-lg-5">
        <div class="wow fadeInUp" data-wow-delay="0.1s">
            <p class="section-title text-secondary justify-content-center"><span></span>
                {{ __('Terms') }}
                <span></span></p>
            <h1 class="text-center mb-5">What Solutions We Provide</h1>
        </div>
        <div class="row g-4">
            @forelse ($course->Terms as $term)
            <x-front.term :term="$term" :iteration="$loop->iteration"/>
            @empty
            @endforelse
        </div>
    </div>
</div>
<!-- Terms End -->


@endsection