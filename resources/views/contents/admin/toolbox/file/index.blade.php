@extends('layouts.admin')


@section("content")
<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-uppercase">{{ __('File') }}</h6>

                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                        <div class="dropdown-header">{{ __('Action') }}</div>
                        @can('file.create')
                        <x-CreateButton path="{{ route('file.create') }}" />
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
                                <th scope="col">{{ __("title") }}</th>
                                <th scope="col">{{ __("Type") }}</th>
                                <th scope="col">{{ __("size") }}</th>
                                @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['file.edit' , 'file.delete']))
                                <th scope="col">{{ __("Action") }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($files as $file)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    {{ $file->title }}
                                </td>
                                <td>
                                    <x-atoms.file-type-icon :fileType="$file->file_type" />

                                </td>
                                <td>
                                    <x-atoms.file-size :fileSize="$file->file_size" />
                                </td>

                                @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['file.edit' , 'file.delete']))

                                <td>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink" style="">
                                            <div class="dropdown-header">{{ __('Actions') }}:</div>
                                            @can('file.edit')
                                            <x-EditButton itemId="{{ $file->id }}" path="file.edit" />
                                            @endcan
                                            @can('file.delete')
                                            <x-DeleteButton itemId="{{ $file->id }}" path="file.destroy" />
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
                        {!! $files->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>


    @endsection