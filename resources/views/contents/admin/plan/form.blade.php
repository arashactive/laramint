@extends('layouts.admin')


@section("content")

<!-- Create Form Card -->
<div class="col-12">
    <div class="card shadow mb-4 border-bottom-primary">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{ __("plan Form") }}</h6>
            <div class="dropdown no-arrow">
                <x-BackButton />
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="text-center">

                @if(isset($plan))
                    <form class="user" method="POST" action="{{ route('plan.update' , $plan->id) }}">                    
                     @method('patch')
                @else
                    <form class="user" method="POST" action="{{ route('plan.store') }}">
                @endif
                
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="title" type="text" class="form-control form-control-user" id="title"
                                placeholder="Title" value="{{ $plan->title ?? '' }}">                            
                        </div>
                        <div class="col-sm-6">
                            <input name="validDaysForUse" type="number" class="form-control form-control-user" id="validDaysForUse"
                                placeholder="validDaysForUse" value="{{ $plan->validDaysForUse ?? '' }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="price" type="number" class="form-control form-control-user" id="price"
                            placeholder="price" value="{{ $plan->price ?? '' }}">
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="discount" type="number" class="form-control form-control-user" id="discount"
                            placeholder="discount" value="{{ $plan->discount ?? '' }}">
                        </div>
                       
                    </div>
                    <div class="form-group">
                        <textarea name="description" type="text" class="form-control editor" id="description"
                            placeholder="Description">{{ $plan->description ?? '' }}</textarea>

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