@extends('layouts.admin')


@section("content")



<div class="row">
    
    <div class="col-lg-6">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __("term Form") }}</h6>
                <div class="dropdown no-arrow">
                    <x-BackButton />
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                
                <div class="text-center">

               
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="title" type="text" class="form-control form-control-user" id="title"
                                placeholder="Title" value="{{ $term->title ?? '' }}">   
                        </div>
                        <div class="col-sm-6">
                            <input name="image" type="text" class="form-control form-control-user" id="image"
                                placeholder="Image" value="{{ $term->image ?? '' }}">
                        </div>
                    </div>
                    
                    
                    @livewire('forms.department-course-drop-down', [
                        'department_id' => $term->department_id ?? null ,
                        'course_id' => $term->course_id ?? null
                    ])
                
                
                    <div class="form-group">
                        <textarea name="description" type="text" class="form-control form-control-user" id="description"
                            placeholder="Description">{{ $term->description ?? '' }}</textarea>
                    </div>
                </div>
                
            </div>
        </div>
    </div>


    
    <div class="col-lg-6">
        
        
        <div class="card shadow mb-4 border-bottom-warning">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-warning">{{ __("Participants") }}</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                @livewire('container.participant', [
                        'route' => 'addQuestionToQuiz',
                        'parent' => $term->id
                    ])
                
                
            </div>
        </div>

    </div>
</div>



@endsection



