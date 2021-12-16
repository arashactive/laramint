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

                    <x-CreateButton path="{{ route('department.create') }}" />
                    
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
                        <th scope="col">{{ __("Action") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($departments as $department)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $department->title }}</td>
                                <td>
                                    <x-CheckUnCheck isChecked="{{ $department->is_published }}" />
                                </td>
                                <td>
                                <div class="btn-group" role="group" aria-label="{{ __("Action Buttons ") }}">
                                    <x-EditButton />
                                    <x-DeleteButton itemId="{{ $department->id }}" />
                                    <x-ShowButton />
                                    
                                </div>
                                    
                                </td>
                            </tr>
                        @empty
                            
                        @endforelse
                        
                        
                    </tbody>
                </table>
    
    
                </div>
            </div>
        </div>
    </div>


@endsection