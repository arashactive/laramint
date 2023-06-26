@extends('layouts.front.theme')


@section("content")



<div class="container-xxl py-5">
    <div class="container py-5 mt-5 px-lg-5">
        <div class="row align-items-center">
            <div class="col-12 text-center">
                <div class="wow fadeInUp" data-wow-delay="0.1s">
                    <p class="section-title text-secondary justify-content-center"><span></span>
                        {{ __('404 not found') }}
                        <span></span></p>
                    <h1 class="text-center mb-5">Oops! We couldn't find the page you're looking for.</h1>
                </div>
                <h1 class="text-bg-warning"></h1>

                <p class="mt-4">The page you requested may have been moved, renamed, or is temporarily unavailable.</p>
                <p>Here are some suggestions to get you back on track:</p>
                <ul class="list-inline text-left">
                    <li class="mx-2"><i class="bi bi-check"></i>Check the URL for any typos or errors.</li>
                    <li class="mx-2"><i class="bi bi-check"></i>Go back to the <a class="btn btn-info" href="{{ route('home') }}">Home Page</a> and navigate from there.</li>
                    <li class="mx-2"><i class="bi bi-check"></i>Contact our support team for further assistance. <a class="btn btn-warning" href="mailto:icetagr@gmail.com">icetagr@gmail.com</a></li>
                </ul>
                <p>Thank you for your patience.</p>
            </div>
        </div>
    </div>
</div>

@endsection