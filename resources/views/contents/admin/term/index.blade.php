@extends('layouts.admin')


@section("content")
<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __("Term") }}</h6>
                <div class="dropdown no-arrow">
                    @can('term.create')
                    <x-CreateButton path="{{ route('term.create') }}" />
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
                        <th scope="col">{{ __("Department") }}</th>
                        <th scope="col">{{ __("Course") }}</th>
                        <th scope="col">{{ __("is_published") }}</th>
                        @can('term.update|term.delete')
                        <th scope="col">{{ __("Action") }}</th>
                        @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($terms as $term)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $term->title  }}</td>
                                <td>{{ $term->Department->title ?? '' }}</td>
                                <td>{{ $term->Course->title ?? '' }}</td>
                                <td>
                                    <x-CheckUnCheck isChecked="{{ $term->is_published }}" />
                                </td>
                                @can('term.update|term.delete')
                                <td>
                                    <div class="btn-group" role="group" aria-label="{{ __("Action Buttons ") }}">
                                        @can('term.update|term.delete')
                                        <x-EditButton itemId="{{ $term->id }}" path="term.edit" />
                                        @endcan
                                        @can('term.update|term.delete')
                                        <x-DeleteButton itemId="{{ $term->id }}" path="term.destroy" />                                    
                                        @endcan
                                    </div>
                                </td>
                                @endcan
                            </tr>
                        @empty
                            
                        @endforelse                        
                    </tbody>
                </table>
                
                <hr/>
                <div class="text-center">
                    {!! $terms->links() !!}
                </div>

                </div>
            </div>
        </div>
    </div>


@endsection