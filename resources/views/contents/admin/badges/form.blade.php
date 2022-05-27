@extends('layouts.admin')


@section("content")

<!-- Create Form Card -->
<div class="col-12">
    <div class="card shadow mb-4 border-bottom-primary">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{ __("Create New Badge") }}</h6>
            <div class="dropdown no-arrow">
                <x-BackButton />
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="text-center">

                @if(isset($badge))
                    <form class="user" method="POST" action="{{ route('badges.update' , $badge->id) }}">                    
                     @method('patch')
                @else
                    <form class="user" method="POST" action="{{ route('badges.store') }}">
                @endif
                
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="title" type="text" class="form-control form-control-user" id="title"
                                placeholder="Title" value="{{ $badge->title ?? '' }}">
                           
                        </div>
                        <div class="col-sm-6">
                            <input name="file" type="text" class="form-control form-control-user" id="file"
                                placeholder="file" value="{{ $badge->file ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="min_coins" type="number" class="form-control form-control-user" id="title"
                                placeholder="min coins" value="{{ $badge->min_coins ?? '' }}">
                           
                        </div>
                        <div class="col-sm-6">
                            <input name="max_coins" type="number" class="form-control form-control-user" id="image"
                                placeholder="max coins" value="{{ $badge->max_coins ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="description" type="text" class="form-control editor" id="description"
                            placeholder="Description">{{ $badge->description ?? '' }}</textarea>
                    </div>
   
               
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-user btn-block"
                            value="{{ __('Save') }}">
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>


@endsection