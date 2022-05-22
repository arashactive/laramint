@extends('layouts.admin')


@section("content")

<!-- Create Form Card -->
<div class="col-12">
    <div class="card shadow mb-4 border-bottom-primary">
        <!-- Card Header - Dropdown -->
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">{{ __("Create New user") }}</h6>
            <div class="dropdown no-arrow">
                <x-BackButton />
            </div>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="text-center">

                @if(isset($user))
                    <form class="user" method="POST" action="{{ route('user.update' , $user->id) }}">                    
                     @method('patch')
                @else
                    <form class="user" method="POST" action="{{ route('user.store') }}">
                @endif
                
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="name" type="text" class="form-control form-control-user" id="name"
                                placeholder="name" value="{{ $user->name ?? '' }}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror    
                        </div>
                        <div class="col-sm-6">
                            <input name="email" type="email" class="form-control form-control-user" id="email"
                                placeholder="email" value="{{ $user->email ?? '' }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input name="password" type="text" class="form-control form-control-user" id="password"
                                placeholder="password" value="">
                        
                        </div>
                        <div class="col-sm-6 mb-3 mb-sm-0">
                           
                            <x-forms.roles user="{{ $user->id ?? 0 }}" />
                        </div>
                        <div class="col-sm-6">
                        </div>
                    </div>
                   
                   
                    
   
               
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-user btn-block"
                            value="{{ __('Save') }}">
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>


@endsection