@extends('layouts.admin')


@section("content")
<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-uppercase">{{ __('Term') }}</h6>

                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                        <div class="dropdown-header">{{ __('Action') }}</div>
                        @can('term.create')
                        <x-CreateButton path="{{ route('term.create') }}" />
                        @endcan
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('department.index') }}">
                            <i class="fas fa-arrow-right pr-2"></i>
                            {{ __("Department") }}
                        </a>
                        <a class="dropdown-item" href="{{ route('course.index') }}">
                            <i class="fas fa-arrow-right pr-2"></i>
                            {{ __("Course") }}
                        </a>

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
                                <th scope="col">{{ __("Department") }}</th>
                                <th scope="col">{{ __("Course") }}</th>

                                @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['term.edit' , 'term.delete']))
                                <th scope="col">{{ __("Action") }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($terms as $term)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $term->title  }}</td>
                                <td>
                                    <div class="badge badge-primary">
                                        {{ $term->Department->title ?? '' }}
                                    </div>
                                </td>
                                <td>
                                    <div class="badge badge-warning">
                                        {{ $term->Course->title ?? '' }}
                                    </div>
                                </td>

                                @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['term.edit' , 'term.delete']))
                                <td>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                                            <div class="dropdown-header">{{ __('Actions') }}:</div>
                                            @can('term.edit')
                                            <x-EditButton itemId="{{ $term->id }}" path="term.edit" />
                                            @endcan
                                            @can('term.delete')
                                            <x-DeleteButton itemId="{{ $term->id }}" path="term.destroy" />
                                            @endcan

                                            <div class="dropdown-divider"></div>
                                            @can('term.show')
                                            <x-buttons.show itemId="{{ $term->id }}" path="term.show" />
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
                        {!! $terms->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>


    @endsection