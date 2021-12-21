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

                    <x-BackButton />
                    
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                
                <form method="post" class="role" action="{{ route("role_permissions" ,  $role->id) }}">
                    @csrf
                    
                    @forelse ($permissions as $permission)
                        <div class="form-check">
                            <input class="form-check-input" name="permissions[]" 
                            {{ is_array($role_permission) && in_array($permission->id , $role_permission) ? "checked" : "" }}
                            type="checkbox" value="{{ $permission->id }}" id="permission_{{ $permission->id }}">
                            <label class="form-check-label" for="permission_{{ $permission->id }}">
                            {{ $permission->name }}
                            </label>
                        </div>
                    @empty
                        
                    @endforelse   
                    <hr/>
                    
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-user btn-block"
                            value="{{ __('Save') }}">
                    </div>
                
             </form>


                
            </div>
        </div>
    </div>


@endsection