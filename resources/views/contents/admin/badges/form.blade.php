@extends('layouts.admin')


@section("content")

<!-- Create Form Card -->
<div class="col-12">
    <div class="card shadow mb-4 border-bottom-primary">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{ __("Create New Badge") }}</h6>
            <div class="dropdown no-arrow">
                <x-BackButton />
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">


            @if(isset($badge))
            <form class="user" method="POST" action="{{ route('badges.update' , $badge->id) }}">
                @method('patch')
                @else
                <form class="user" method="POST" action="{{ route('badges.store') }}">
                    @endif

                    @csrf
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="title">{{ __("Title") }}</label>
                                <input name="title" type="text" class="form-control form-control-user" id="title" placeholder="Title" value="{{ $badge->title ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label for="min_coins">{{ __("Min Coins") }}</label>
                                <input name="min_coins" type="number" class="form-control form-control-user" id="min_coins" placeholder="min coins" value="{{ $badge->min_coins ?? '' }}">
                            </div>
                            <div class="form-group">
                                <label for="max_coins">{{ __("Max Coins") }}</label>
                                <input name="max_coins" type="number" class="form-control form-control-user" id="max_coins" placeholder="max coins" value="{{ $badge->max_coins ?? '' }}">
                            </div>
                            


                        </div>


                        <div class="col-md-6">
                            <label>File: </label>
                            @livewire('services.media.uploadable',[
                                    'file' => $badge->file ?? '',
                                    'path' => 'badges',
                                    'target' => 'badges'
                                ])
                        </div>
                    </div>



                    <div class="form-group">
                        <textarea name="description" type="text" class="form-control editor" id="description" placeholder="Description">{{ $badge->description ?? '' }}</textarea>
                    </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-user btn-block" value="{{ __('Save') }}">
                    </div>
                </form>


        </div>
    </div>
</div>


@endsection