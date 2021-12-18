@extends('layouts.admin')


@section("content")
<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __("Courses") }}</h6>
                <div class="dropdown no-arrow">

                    <x-CreateButton path="{{ route('course.create') }}" />
                    
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
                        <th scope="col">{{ __("is_published") }}</th>
                        <th scope="col">{{ __("Action") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($courses as $course)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $course->title }}</td>
                                <td>{{ $course->department_id }}</td>
                                <td>
                                    <x-CheckUnCheck isChecked="{{ $course->is_published }}" />
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="{{ __("Action Buttons ") }}">
                                        <x-EditButton itemId="{{ $course->id }}" path="course.edit" />
                                        <x-DeleteButton itemId="{{ $course->id }}" path="course.destroy" />                                    
                                    </div>
                                </td>
                            </tr>
                        @empty
                            
                        @endforelse                        
                    </tbody>
                </table>
                
                <hr/>
                <div class="text-center">
                    {!! $courses->links() !!}
                </div>

                </div>
            </div>
        </div>
    </div>


@endsection