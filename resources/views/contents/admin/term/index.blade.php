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

                    <x-CreateButton path="{{ route('term.create') }}" />
                    
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
                        <th scope="col">{{ __("Action") }}</th>
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
                                <td>
                                    <div class="btn-group" role="group" aria-label="{{ __("Action Buttons ") }}">
                                        <x-EditButton itemId="{{ $term->id }}" path="term.edit" />
                                        <x-DeleteButton itemId="{{ $term->id }}" path="term.destroy" />                                    
                                    </div>
                                </td>
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