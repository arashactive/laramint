@extends('layouts.admin')


@section("content")
<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ $activity->title }}</h6>

                <div class="dropdown no-arrow">
                    <x-BackButton />
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">

                @if(($workout->is_completed && $workout->score >= $activity->min_pass_score) ||  $workout->is_mentor)
                    @livewire('activity.result', [
                    'activity' => $activity,
                    'term' => $term,
                    'workout' => $workout
                    ]) 
                @else
                    @livewire('activity.quiz', [
                        'activity' => $activity,
                        'term' => $term,
                        'workout' => $workout
                        ]) 
                @endif
            </div>

            @if(!$workout->is_completed)
            <div class="card-footer text-center">
                <button class="btn btn-danger" id="saveAndClose">
                    <i class="fa fa-save"></i> {{ __("save & close") }}
                </button>
            </div>
            @endif
        </div>
    </div>

    <div class="d-none">
    <div id="dialog-confirm" title="Save And Close?">
        <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
            These items will be permanently close and cannot be recovered. Are you sure?</p>
      </div>
    </div>
@endsection

@section('js')
    <script src="{{ URL::to('/js/quiz.js') }}"></script>
@endsection