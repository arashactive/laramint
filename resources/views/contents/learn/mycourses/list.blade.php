@extends('layouts.admin')


@section("content")
<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __("My Course") }}</h6>
                <div class="dropdown no-arrow">
                    
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="text-center">
                    
                    <ul class="nav nav-tabs">
                        <li class="nav-item active">
                            <a class="nav-link active" data-toggle="tab" href="#home">{{ __('Home') }}</a>
                        </li>
                      </ul>
                      
                    <div class="tab-content p-4">
                        
                        <div id="home" class="tab-pane active">
                            <x-modules.terms.all :terms="$terms" />
                       
                        </div>
                    </div>
                
        

                </div>
            </div>
        </div>
    </div>


@endsection