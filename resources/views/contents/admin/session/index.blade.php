@extends('layouts.admin')


@section("content")
<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __("Session") }}</h6>
                <div class="dropdown no-arrow">
                    @can('session.create')
                    <x-CreateButton path="{{ route('session.create') }}" />
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
                        @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['session.edit' , 'session.delete']))
                        <th scope="col">{{ __("Action") }}</th>
                        @endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sessions as $session)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $session->title }}</td>
                                @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['session.edit' , 'session.delete']))
                                <td>
                                    <div class="btn-group" role="group" aria-label="{{ __("Action Buttons ") }}">
                                        @can('session.edit')
                                        <x-EditButton itemId="{{ $session->id }}" path="session.edit" />
                                        @endcan

                                        @can('session.delete')
                                        <x-DeleteButton itemId="{{ $session->id }}" path="session.destroy" />                                    
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
                    {!! $sessions->links() !!}
                </div>

                </div>
            </div>
        </div>
    </div>


@endsection