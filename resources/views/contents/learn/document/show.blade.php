@extends('layouts.admin')


@section("content")
<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ $activity->title }}
                </h6>

                <div class="no-arrow">
                    @if(!$review)
                    <x-complete-and-next :workout="$workout" />
                    @endif
                </div>
                <div class="no-arrow">
                    <x-BackButton />
                </div>
            </div>

            @if($review)
            <div class="m-4 p-4">
            <x-box.profile-review-box />
            </div>
            @endif

            {!! $file !!}


        </div>
    </div>


    @endsection