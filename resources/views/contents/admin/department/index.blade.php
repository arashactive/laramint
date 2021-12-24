@extends('layouts.admin')


@section("content")
<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __("Departments") }}</h6>
                <div class="dropdown no-arrow">
                    @can('department.create')
                    <x-CreateButton path="{{ route('department.create') }}" />
                    @endcan
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
                        <th scope="col">{{ __("is_published") }}</th>
                        @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['department.edit' , 'department.delete']))
                        <th scope="col">{{ __("Action") }}</th>
                        @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($departments as $department)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    {{ $department->title }} 
                                    <div class="row text-center d-flex justify-content-center">
                                        <x-buttons.pill name="terms" count="{{ $department->Term->count() }}" theme="dark" />
                                        <x-buttons.pill name="course" count="{{ $department->Course->count() }}" theme="warning" />
                                    </div>
                                </td>
                                <td>
                                    <x-CheckUnCheck isChecked="{{ $department->is_published }}" />
                                </td>
                                
                                @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['department.edit' , 'department.delete']))
                                <td>
                                    <div class="btn-group" role="group" aria-label="{{ __("Action Buttons ") }}">
                                        @can('department.edit')
                                            <x-EditButton itemId="{{ $department->id }}" path="department.edit" />
                                        @endcan
                                        @can('department.delete')
                                            <x-DeleteButton itemId="{{ $department->id }}" path="department.destroy" />                                    
                                        @endcan
                                    </div>
                                </td>
                                @endif
                            </tr>
                        @empty
                            
                        @endforelse                        
                    </tbody>
                </table>
                
                <hr/>
                <div class="text-center">
                    {!! $departments->links() !!}
                </div>

                </div>
            </div>
        </div>
    </div>


@endsection