@extends('layouts.admin')


@section("content")


<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ $model->title }}
                </h6>

                <div class="dropdown no-arrow">
                    <x-BackButton />
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">

                <p>{{ $model->description }}</p>

                <p>@lang('Min Score:') {{ $model->min_pass_score }}</p>
                @if($model->duration > 0)
                <p>@lang('duration:') {{ $model->duration }}</p>
                @endif

                <form action="{{ route( 'taskLearnerPrepared' ,['participant'=> $participant->id, 'sessionable' => $sessionable->id]) }}" method="POST">
                    @csrf
                    <input class="btn btn-primary btn-sm" type="submit" value="@lang('Start')" />
                </form>

            </div>


        </div>
    </div>

    <div class="d-none">
        <div id="dialog-confirm" title="Save And Close?">
            <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
                These items will be permanently close and cannot be recovered. Are you sure?</p>
        </div>
    </div>
    @endsection