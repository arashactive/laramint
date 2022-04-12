@extends('layouts.admin')


@section("content")
    <div class="row">

        <div class="col-4">

            <div class="card shadow mb-4 border-bottom-info">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold ">
                        <i class="fa fa-user"></i>
                        {{ __('profile') }}

                    </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    



                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{ URL::to('img/profiles/' . rand(1,12) . '.jpg') }}" alt="{{ $user->name }}" class="rounded" width="150">
                        <div class="mt-3 ">
                          <h4>{{ $user->name }}</h4>
                          <p class="text-secondary mb-1"><i class="fa fa-envelope"></i> {{ $user->email }}</p>
                          <div class="px-2 rounded mt-4 date "><i class="fa fa-clock"></i> <span class="join">Joined {{ $user->created_at }}</span> </div>
                        </div>
                      </div>
                </div>
            </div>

        </div>

        <div class="col-8">

            <div class="card shadow mb-4 border-bottom-danger">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold ">
                        <i class="fa fa-comment"></i>
                        {{ __('comments') }}

                    </h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                        
                </div>
            </div>

        </div>
    </div>

    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Earnings (Monthly)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Earnings (Annual)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-7">
            <div class="card shadow mb-4 border-bottom-primary">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __("Terms") }}</h6>
                    <div class="dropdown no-arrow">

                        
                        
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    @forelse ($terms as $term)
                    <x-box.student-courses-for-admin
                        :term="$term"
                        :user="$user"/>
                @empty
                    <p>
                        {{ __("You don't have any course in progress, you can enroll one course in this link.") }}
                    </p>
                @endforelse
                </div>
            </div>
        </div>
    </div>


@endsection