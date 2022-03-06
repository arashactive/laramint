@extends('layouts.admin')


@section("content")
<div class="row">
    
    <div class="col-6">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __("Session Details") }}</h6>
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
                    {{ $session->title }}
                    </h5>
                    <p>
                        {!! $session->description !!}
                    </p>
                    <hr/>
                     
                     @forelse ($session->related as $activity)
                       
                       <x-box.item
                            :title="$loop->iteration . '- ' .  $activity->model->title"
                            :color="$activity->model->color">

                            @if(!$loop->first)
                                @slot('up')
                                    {{ route('changeOrderSessionable' , ['from' => $activity->id , 'move' => 'up' ]) }}
                                @endslot
                            @endif

                            @if(!$loop->last)
                                @slot('down')
                                    {{ route('changeOrderSessionable' , ['from' => $activity->id , 'move' => 'down' ]) }}
                                @endslot
                            @endif

                            @slot('delete')
                                {{ route('deleteActivityAsSession', $activity->id )}}
                            @endslot
                        </x-box.item>
                        
                         
                     @empty   
                     @endforelse


                </div>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card shadow mb-4 border-bottom-warning">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __("Activity") }}</h6>
                
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="text-center">
                    <div class="row">
                        <div class="col-xl-6 col-sm-12 mb-4">
                            @livewire('box.file-activity', ['session' => $session->id]) 
                        </div>
                        <div class="col-xl-6 col-sm-12 mb-4">
                            @livewire('box.quiz-activity', ['session' => $session->id])
                        </div>
                   </div>
                   <div class="row">
                        <div class="col-xl-6 col-sm-12 mb-4">
                            @livewire('box.feedback-activity', ['session' => $session->id]) 
                        </div>
                        <div class="col-xl-6 col-sm-12 mb-4">
                            @livewire('box.rubric-activity', ['session' => $session->id])
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-sm-12 mb-4">
                            @livewire('box.document-activity', ['session' => $session->id])  
                        </div>
                        <div class="col-xl-6 col-sm-12 mb-4">
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
