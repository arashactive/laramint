@extends('layouts.admin')


@section("content")
<div class="row">
    
    <div class="col-8">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __("quiz Details") }}</h6>
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
                    {{ $quiz->title }}
                    </h5>
                    <p>
                        {!! $quiz->description !!}
                    </p>
                    <hr/>
                     
                     


                </div>
            </div>
        </div>
    </div>

    


@endsection
