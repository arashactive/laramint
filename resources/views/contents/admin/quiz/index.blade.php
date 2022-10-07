@extends('layouts.admin')


@section("content")
<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-uppercase">{{ __('Quiz List') }}</h6>

                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                        <div class="dropdown-header">{{ __('Managment') }}</div>
                        <a class="dropdown-item" href="{{ route('quiz.create') }}">{{ __("New") }}</a>
                    </div>
                </div>
            </div>



            <!-- Card Body -->
            <div class="card-body">



                <div class="text-center">
                    <table class="table table-hovered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __("Title") }}</th>
                                <th scope="col">{{ __("Mentor") }}</th>
                                <th scope="col">{{ __("attempt") }}</th>
                                <th scope="col">{{ __("duration") }}</th>
                                <th scope="col">{{ __("min_pass_score") }}</th>
                                <th scope="col">{{ __("theme") }}</th>

                                <th scope="col">{{ __("Shuffle") }}</th>
                            
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
                                    <strong>{{ $quiz->title }}</strong>
                                </td>
                                <td>
                                    <x-CheckUnCheck isChecked="{{ $quiz->is_mentor }}" />
                                </td>
                                <td>
                                    <span class="badge badge-center rounded-pill bg-success text-white">
                                        {{ $quiz->attempt }}
                                    </span>
                                </td>
                                <td>
                                    @if($quiz->duration > 0)
                                    <span class="badge badge-center rounded-pill bg-info text-light">
                                        <small>{{ $quiz->duration }}</small>
                                    </span>
                                    @else
                                    <span class="badge badge-center rounded-pill bg-light">
                                        <label class="fa fa-ban "></label>
                                    </span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge badge-center rounded-pill bg-label-danger">
                                        {{ $quiz->min_pass_score }}
                                    </span>
                                </td>
                                <td>
                                    {{ $quiz->show_question }}
                                </td>


                                <td>
                                    <x-CheckUnCheck isChecked="{{ $quiz->is_shuffle }}" />
                                </td>
                               
                                @if(Auth::user()->hasRole('Super-Admin')
                                || Auth::user()->hasRole('Super-Admin')
                                || Auth::user()->hasAnyPermission(['quiz.edit' , 'quiz.delete']))
                                <td>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                                            <div class="dropdown-header">{{ __('Actions') }}:</div>
                                            @can('quiz.edit')
                                            <x-EditButton itemId="{{ $quiz->id }}" path="quiz.edit" />
                                            @endcan
                                            @can('quiz.delete')
                                            <x-DeleteButton itemId="{{ $quiz->id }}" path="quiz.destroy" />
                                            
                                            @endcan
                                            <div class="dropdown-divider"></div>
                                            @can('quiz.show')
                                            <x-buttons.show itemId="{{ $quiz->id }}" path="quiz.show" text="Show Questions" />
                                            @endcan
                                        </div>
                                    </div>
                          
                                </td>
                                @endif
                            </tr>
                            @empty

                            @endforelse
                        </tbody>
                    </table>


                    <div class="text-center">
                        {!! $quizes->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>


    @endsection