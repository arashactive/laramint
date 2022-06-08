@extends('layouts.admin')


@section("content")

<div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-uppercase">{{ __('Workout') }}</h6>

        <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                <div class="dropdown-header">{{ __('Managment') }}</div>
                @can('mentor.list')
                <x-modules.mentor-comments.new-comment :userId="$participant->User->id" :activableType="'App\Models\Term'" :activableId="$participant->id" />
                @endcan
            </div>
        </div>
    </div>
</div>

<x-box.profile-top-header :user="$participant->User" :activabel_id="$participant->id" :activable_type="'App\Models\Term'" />

<x-box.profile-review-box />


<div class="row">

    <div class="col-12">


        @forelse ($participant->Term->Sessions as $session)

        <x-box.session-item-for-student :session="$session" :participant="$participant" />

        @empty

        @endforelse
    </div>


    @endsection