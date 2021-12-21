@extends('layouts.admin')


@section("content")
<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __("Role") }}</h6>
                <div class="dropdown no-arrow">

                    <x-CreateButton path="{{ route('role.create') }}" />
                    
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="text-center">
    
                    
                <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __("name") }}</th>
                        <th scope="col">{{ __("guard name") }}</th>
                        <th scope="col">{{ __("Permission") }}</th>
                        <th scope="col">{{ __("Action") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($roles as $role)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>
                                    {{ $role->name }} 
                                </td>
                                <td>
                                    {{ $role->guard_name }}
                                </td>
                                <td>
                                    <x-buttons.show itemId="{{ $role->id }}" path="role.show" />
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="{{ __("Action Buttons ") }}">
                                        <x-EditButton itemId="{{ $role->id }}" path="role.edit" />
                                        <x-DeleteButton itemId="{{ $role->id }}" path="role.destroy" />                                    
                                       
                                    </div>
                                </td>
                              
                            </tr>
                        @empty
                            
                        @endforelse                        
                    </tbody>
                </table>
                
                <hr/>
                <div class="text-center">
                    {!! $roles->links() !!}
                </div>

                </div>
            </div>
        </div>
    </div>


@endsection