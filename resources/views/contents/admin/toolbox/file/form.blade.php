@extends('layouts.admin')


@section("content")

<!-- Create Form Card -->
<div class="col-12">
    <div class="card shadow mb-4 border-bottom-primary">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{ __("Create New file") }}</h6>
            <div class="dropdown no-arrow">
                <x-BackButton />
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="text-center">

                @if(isset($file))
                    <form  class="user" method="POST" action="{{ route('file.update' , $file->id) }}" enctype="multipart/form-data">                    
                     @method('patch')
                @else
                    <form class="user" method="POST" action="{{ route('file.store') }}" enctype="multipart/form-data">
                @endif
                
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="title" type="text" class="form-control form-control-user" id="title"
                                placeholder="title" value="{{ $file->title ?? '' }}">
                           
                        </div>
                        <div class="col-sm-6">
                            <input name="file" type="file" class="form-control form-control-user" id="file"
                                placeholder="file" value="{{ $file->file ?? '' }}">
                           
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12 mb-3 mb-sm-0">
                            <input name="description" type="text" class="form-control form-control-user" id="description"
                                placeholder="description" value="{{ $file->description ?? '' }}">
                        </div>
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