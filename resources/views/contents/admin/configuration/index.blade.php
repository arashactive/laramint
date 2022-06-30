@extends('layouts.admin')


@section("content")


<div class="row">
    <div class="col-12">
        <ul class="nav nav-tabs" data-tabs="tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#global">{{ __('Global') }}</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#email">{{ __('Email Settings' )}}</a></li>
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#coins">{{ __('Coins Settings' )}}</a></li>
        </ul>



        <div class="tab-content pb-4 pt-2">
            <div class="tab-pane fade show active" id="global">
                @include('contents.admin.configuration.global')
            </div>
            <div class="tab-pane" id="email">
                @include('contents.admin.configuration.email')
            </div>
            <div class="tab-pane" id="coins">
                @include('contents.admin.configuration.coins')
            </div>
        </div>
    </div>
</div>

<!-- Create Form Card -->
<div class="col-12">




</div>


@endsection