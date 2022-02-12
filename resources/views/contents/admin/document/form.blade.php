@extends('layouts.admin')


@section("content")

<!-- Create Form Card -->
<div class="col-12">
    <div class="card shadow mb-4 border-bottom-primary">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{ __("Documents") }}</h6>
            <div class="dropdown no-arrow">
                <x-BackButton />
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="text-center">

                @if(isset($document))
                    <form class="user" method="POST" action="{{ route('document.update' , $document->id) }}">                    
                     @method('patch')
                @else
                    <form class="user" method="POST" action="{{ route('document.store') }}">
                @endif
                
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="title" type="text" class="form-control form-control-user" id="title"
                                placeholder="Title" value="{{ $document->title ?? '' }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror    
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="description" type="text" class="form-control editor" id="description"
                            placeholder="Description">{{ $document->description ?? '' }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
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