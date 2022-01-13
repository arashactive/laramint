@extends('layouts.admin')


@section("content")
<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __("quiz") }}</h6>
                <div class="dropdown no-arrow">
                    @can('quiz.create')
                    <x-CreateButton path="{{ route('quiz.create') }}" />
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
                        <th scope="col">{{ __("attempt") }}</th>
                        <th scope="col">{{ __("duration") }}</th>
                        <th scope="col">{{ __("min_pass_score") }}</th>
                        <th scope="col">{{ __("theme") }}</th>
                        <th scope="col">{{ __("Mentor") }}</th>
                        <th scope="col">{{ __("Shuffle") }}</th>
                        @can('quiz.show')
                        <th scope="col">{{ __("questions") }}</th>  
                        @endcan                     
                        
                        @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['quiz.edit' , 'quiz.delete']))
                        <th scope="col">{{ __("Action") }}</th>
                        @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($quizes as $quiz)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    {{ $quiz->title }} 
                                </td>
                                <td>
                                    {{ $quiz->attempt }} 
                                </td>
                                <td>
                                    {{ $quiz->duration }} 
                                </td>
                                <td>
                                    {{ $quiz->min_pass_score }} 
                                </td>
                                <td>
                                    {{ $quiz->show_question }} 
                                </td>
                                
                                <td>
                                    <x-CheckUnCheck isChecked="{{ $quiz->is_mentor }}" />
                                </td>
                                <td>
                                    <x-CheckUnCheck isChecked="{{ $quiz->is_shuffle }}" />
                                </td>
                                @can('quiz.show')
                                <td>
                                    <x-buttons.show itemId="{{ $quiz->id }}" path="quiz.show" />
                                </td>
                                @endcan
                                @if(Auth::user()->hasRole('Super-Admin') 
                                || Auth::user()->hasRole('Super-Admin') 
                                || Auth::user()->hasAnyPermission(['quiz.edit' , 'quiz.delete']))
                                <td>
                                    <div class="btn-group" role="group" aria-label="{{ __("Action Buttons ") }}">
                                        @can('quiz.edit')
                                            <x-EditButton itemId="{{ $quiz->id }}" path="quiz.edit" />
                                        @endcan
                                        @can('quiz.delete')
                                            <x-DeleteButton itemId="{{ $quiz->id }}" path="quiz.destroy" />                                    
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
                    {!! $quizes->links() !!}
                </div>

                </div>
            </div>
        </div>
    </div>


@endsection