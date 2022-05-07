@extends('layouts.admin')


@section("content")
<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ $activity->title }}</h6>
                <div class="no-arrow">
                    <x-complete-and-next :workout="$workout" />
                </div>
                <div class="dropdown no-arrow">
                    <x-BackButton />
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                @if(isset($activity) && !empty($activity))
                <x-content.rubric :rubric="$activity" :bodies="null" />

                @endif
            </div>
        </div>
    </div>


    @endsection