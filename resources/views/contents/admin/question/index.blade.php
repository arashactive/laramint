@extends('layouts.admin')


@section("content")
<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __("question") }}</h6>
                <div class="dropdown no-arrow">
                    @can('question.create')
                    <x-CreateButton path="{{ route('question.create') }}" />
                    @endcan
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="text-center">
    
                    
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __("Title") }}</th>
                        <th scope="col">{{ __("Type") }}</th>
                        
                        @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['question.edit' , 'question.delete']))
                        <th scope="col">{{ __("Action") }}</th>
                        @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($questions as $question)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    {{ $question->title }} 
                                </td>
                                <td>
                                    {{ $question->QuestionType->title }} 
                                </td>
                            

                                @if(Auth::user()->hasRole('Super-Admin') 
                                || Auth::user()->hasRole('Super-Admin') 
                                || Auth::user()->hasAnyPermission(['question.edit' , 'question.delete']))
                                <td>
                                    <div class="btn-group" role="group" aria-label="{{ __("Action Buttons ") }}">
                                        @can('question.edit')
                                            <x-EditButton itemId="{{ $question->id }}" path="question.edit" />
                                        @endcan
                                        @can('question.delete')
                                            <x-DeleteButton itemId="{{ $question->id }}" path="question.destroy" />                                    
                                        @endcan
                                    </div>
                                </td>
                                @endif
                            </tr>
                        @empty
                            
                        @endforelse                        
                    </tbody>
                </table>
                
                <hr/>
                <div class="text-center">
                    {!! $questions->links() !!}
                </div>

                </div>
            </div>
        </div>
    </div>


@endsection