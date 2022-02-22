@extends('layouts.admin')


@section("content")


<div class="row">
    <div class="col-lg-12">
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
                            <input name="title" type="text" class="form-control"  disabled
                                value="{{ $term->title ?? '' }}">   
                        </div>
                        <div class="col-sm-6">
                            <input name="image" type="text" class="form-control" disabled 
                                placeholder="Image" value="{{ $term->image ?? '' }}">
                        </div>
                    </div>
                    
                    
                    @livewire('forms.department-course-drop-down', [
                        'department_id' => $term->department_id ?? null ,
                        'course_id' => $term->course_id ?? null
                    ])
                
                
                    <div class="form-group">
                        <textarea name="description" class="form-control" disabled
                            placeholder="Description">{{ $term->description ?? '' }}</textarea>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>


@if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['term.edit' , 'session.edit']))
<div class="row">

    <div class="col-lg-6">
        <div class="card shadow mb-4 border-bottom-success">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">{{ __("RoadMap") }}</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
               
                @forelse ($term->Sessions as $session)
                    
                <x-box.session-item
                :title="$session->title" :color="'success'">
                
                @if(!$loop->first)
                @slot('up')
                    {{ route('orderChangeSession' , ['from' => $session->pivot->id , 'move' => 'up' ]) }}
                @endslot
                @endif

                @if(!$loop->last)
                    @slot('down')
                        {{ route('orderChangeSession' , ['from' => $session->pivot->id , 'move' => 'down' ]) }}
                    @endslot
                @endif
            
                @slot('delete')
                    {{ route('deleteSessionAsTerm' ,['term' => $term->id, 'session' => $session->id ]) }}
                @endslot
                
                <small>
                    <a href="{{ route('session.show', $session->id) }}" class="btn btn-success btn-sm">
                        {{ __('count of activity: ') }} 
                        <span class="badge badge-light">{{ $session->Sessionable->count() }}</span>
                        <span class="sr-only">unread messages</span>
                    </a>
                 
                </small>
               
                </x-box.item>

                @empty
                    
                @endforelse
               
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        
        
        <div class="card shadow mb-4 border-bottom-success">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-success">{{ __("Sessions") }}</h6>
                <div class="dropdown no-arrow">
                    @can('session.create')
                    <x-CreateButton path="{{ route('session.create') }}" />
                    @endcan
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                @livewire('container.session-panel', [
                        'route' => 'addSessionToTerm',
                        'parent' => $term->id
                    ])
                
            </div>
        </div>

    </div>
</div>
@endcan


@if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['participant.edit' , 'participant.delete']))
<div class="row">

    <div class="col-lg-6">
        <div class="card shadow mb-4 border-bottom-warning">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-warning">{{ __("Participants") }}</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
               
                @forelse ($term->Participants as $participant)
                    
                <x-box.item
                :title="$participant->email">
                           
                @slot('delete')
                    {{ route('deleteParticipantAsTerm' ,['term' => $term, 'user' => $participant->id  ]) }}
                @endslot
                
                <small>
                    <button type="button" class="badge bg-primary position-relative">
                        {{ $participant->name }}
                        
                    </button>
                    <button type="button" class="badge bg-info position-relative">
                        {{ $participant->Role->name }}
                    </button>
                   
                </small>
               
                </x-box.item>

                @empty
                    
                @endforelse
               
            </div>
        </div>
    </div>
    
    <div class="col-lg-6">
        
        
        <div class="card shadow mb-4 border-bottom-warning">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-warning">{{ __("Participants") }}</h6>
                @can('user.create')
                    <x-CreateButton path="{{ route('user.create') }}" />
                @endcan
            </div>
            <!-- Card Body -->
            <div class="card-body">
                @livewire('container.participant', [
                        'route' => 'addParticipantToTerm',
                        'parent' => $term->id
                    ])
                
            </div>
        </div>

    </div>
</div>
@endcan


@endsection



