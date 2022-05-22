@extends('layouts.admin')


@section("content")
<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-uppercase">{{ __('plans') }}</h6>

                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                        <div class="dropdown-header">{{ __('Action') }}</div>
                        @can('plan.create')
                        <x-CreateButton path="{{ route('plan.create') }}" />
                        @endcan
                    </div>
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
                                <th scope="col">{{ __("days valid") }}</th>
                                <th scope="col">{{ __("price") }}</th>

                                @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['plan.edit' , 'plan.delete']))
                                <th scope="col">{{ __("Action") }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($plans as $plan)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $plan->title }}</td>
                                <td>{{ $plan->validDaysForUse }}</td>
                                <td>{{ $plan->price }}</td>

                                @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['plan.edit' , 'plan.delete']))
                                <td>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                                            <div class="dropdown-header">{{ __('Actions') }}:</div>
                                            @can('plan.edit')
                                            <x-EditButton itemId="{{ $plan->id }}" path="plan.edit" />
                                            @endcan
                                            @can('plan.delete')
                                            <x-DeleteButton itemId="{{ $plan->id }}" path="plan.destroy" />
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

                    <hr />
                    <div class="text-center">
                        {!! $plans->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>


    @endsection