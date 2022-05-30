@extends('layouts.admin')


@section("content")

<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-uppercase">{{ __('badges') }}</h6>

                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                        <div class="dropdown-header">{{ __('Action') }}</div>
                        @can('badge.create')
                        <x-CreateButton path="{{ route('badges.create') }}" />
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
                                <th scope="col">{{ __("file") }}</th>
                                <th scope="col">{{ __("min_coins") }}</th>
                                <th scope="col">{{ __("max_coins") }}</th>
                                @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['badge.edit' , 'badge.delete']))
                                <th scope="col">{{ __("Action") }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($badges as $badge)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    {{ $badge->title }}
                                </td>
                                <td><x-atoms.file-uploaded-render :file="$badge->file" :preview="false" /></td>
                                <td>{{ number_format($badge->min_coins) }}</td>
                                <td>{{ number_format($badge->max_coins)  }}</td>

                                @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['badge.edit' , 'badge.delete']))
                                <td>

                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                                            <div class="dropdown-header">{{ __('Actions') }}:</div>
                                            @can('badge.edit')
                                            <x-EditButton itemId="{{ $badge->id }}" path="badges.edit" />
                                            @endcan
                                            @can('badge.delete')
                                            <x-DeleteButton itemId="{{ $badge->id }}" path="badges.destroy" />
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
                        {!! $badges->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>


@endsection