@extends('layouts.admin')


@section("content")
<div class="row">

    <div class="col-6">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __("Session Details") }}</h6>
                <div class="dropdown no-arrow">
                    <div class="dropdown no-arrow">
                        <x-BackButton />
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="text-center">
                    <h5>
                    {{ $session->title }}
                    </h5>
                    <p>
                        {!! $session->description !!}
                    </p>
                    <hr/>
                     
                </div>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card shadow mb-4 border-bottom-warning">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __("Add Activity") }}</h6>
                
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="text-center">
                   
                </div>
            </div>
        </div>
    </div>


@endsection