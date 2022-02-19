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
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#progress">{{ __('In Progress') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#completed">{{ __('Completed') }}</a>
                        </li>
                      </ul>
                      
                    <div class="tab-content p-4">
                        
                        <div id="home" class="tab-pane active">

                            @forelse ($terms as $term)
                                <x-box.course-item-with-progress-theme
                                    :term="$term"/>
                            @empty
                                <p>
                                    {{ __("You don't have any course in progress, you can enroll one course in this link.") }}
                                </p>
                            @endforelse
                       
                        </div>


                        <div id="progress" class="tab-pane fade">
                          
                            @forelse ($terms as $term)
                            <x-box.course-item-with-progress-theme
                                :term="$term"/>
                            @empty
                                <p>
                                    {{ __("You don't have any course in progress, you can enroll one course in this link.") }}
                                </p>
                            @endforelse
                        </div>


                        <div id="completed" class="tab-pane fade">
                          
                           
                        </div>

                    </div>
                
        

                </div>
            </div>
        </div>
    </div>


@endsection