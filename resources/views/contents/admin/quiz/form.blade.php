@extends('layouts.admin')


@section("content")

<!-- Create Form Card -->
<div class="col-12">
    <div class="card shadow mb-4 border-bottom-primary">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{ __("Create New quiz") }}</h6>
            <div class="dropdown no-arrow">
                <x-BackButton />
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="text-center">

                @if(isset($quiz))
                    <form class="user" method="POST" action="{{ route('quiz.update' , $quiz->id) }}">                    
                     @method('patch')
                @else
                    <form class="user" method="POST" action="{{ route('quiz.store') }}">
                @endif
                
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="title" type="text" class="form-control form-control-user" id="title"
                                placeholder="Title" value="{{ $quiz->title ?? '' }}">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror    
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="attempt" type="number" class="form-control form-control-user" id="attempt"
                            min="0" max="50"        
                            placeholder="Attempt" value="{{ $quiz->attempt ?? 'zero is unlimited...' }}">
                            @error('attempt')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror    
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="duration" type="number" class="form-control form-control-user" id="duration"
                                placeholder="duration" value="{{ $quiz->duration ?? 'zero is unlimited...' }}">
                            @error('duration')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror    
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="min_pass_score" type="number" class="form-control form-control-user" id="min_pass_score"
                                placeholder="min_pass_score" value="{{ $quiz->min_pass_score ?? '80' }}">
                            @error('min_pass_score')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror    
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <select name="is_shuffle" class="form-control" id="is_shuffle">
                                    <option value="1"
                                    {{ isset($quiz->is_shuffle) && $quiz->is_shuffle == '1' ? 'selected' : '' }}
                                    >{{ __('shuffle') }}</option>
                                    <option value="0"
                                    {{ isset($quiz->is_shuffle) && $quiz->is_shuffle == '0' ? 'selected' : '' }}
                                    >{{ __('normal') }}</option>
                            </select>
                            @error('is_shuffle')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror    
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            
                            <select name="is_mentor" class="form-control" id="is_mentor">
                                <option value="1"
                                {{ isset($quiz->is_mentor) && $quiz->is_mentor == '1' ? 'selected' : '' }}
                                >{{ __('Mentor Correct') }}</option>
                                <option value="0"
                                {{ isset($quiz->is_mentor) && $quiz->is_mentor == '0' ? 'selected' : '' }}
                                >{{ __('System Correct') }}</option>
                            </select>
                            @error('is_mentor')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror    
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <select name="show_question" class="form-control" id="show_question">
                                @foreach($show_question as $question)
                                    <option value="{{ $question }}"
                                    {{ isset($quiz->show_question) && $quiz->show_question == $question ? 'selected' : '' }}
                                    >{{ $question }} </option>
                                @endforeach
                            </select>
                          
                            @error('show_question')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror    
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="random_question" type="number" class="form-control form-control-user" id="random_question"
                                placeholder="random_question" value="{{ $quiz->random_question ?? '0' }}">
                            @error('random_question')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror    
                        </div>
                    </div>

                    <div class="form-group">
                        <textarea name="description" type="text" class="form-control editor" id="description"
                            placeholder="Description">{{ $quiz->description ?? '' }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
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