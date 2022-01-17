@extends('layouts.admin')


@section("content")
<div class="row">
    
    <div class="col-6">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ $feedback->title }}</h6>
                <div class="dropdown no-arrow">
                    <div class="dropdown no-arrow">
                        <x-BackButton />
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <p>
                    {!! $feedback->description !!}
                </p>
                <div class="text-center">
                    
                    <hr/>

                    @forelse ($feedback->Questions as $question)
                    
                    <x-box.item
                    :title="$question->title">
                    @if(!$loop->first)
                        @slot('up')
                            {{ route('orderChangeQuestionFeedback' , ['from' => $question->pivot->id , 'move' => 'up' ]) }}
                        @endslot
                    @endif
                    @if(!$loop->last)
                        @slot('down')
                            {{ route('orderChangeQuestionFeedback' , ['from' => $question->pivot->id , 'move' => 'down' ]) }}
                        @endslot
                    @endif
                
                    @slot('delete')
                        {{ route('deleteQuestionAsFeedback' ,['feedbackQuestion' => $question->pivot->id ]) }}
                    @endslot
                
                    </x-box.item>
                    
                    @empty  
                    @endforelse
                </div>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="card shadow mb-4 border-bottom-success">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __("Questions") }}</h6>
                <div class="dropdown no-arrow">
                    <div class="dropdown no-arrow">
                        <x-CreateButton path="{{ route('question.create'). '?feedback_id=' . $feedback->id }}" />
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="text-center">
                    @livewire('container.show-questions', [
                        'route' => 'addQuestionToFeedback',
                        'parent' => $feedback->id
                    ])
                </div>
            </div>
        </div>
    </div>
@endsection
