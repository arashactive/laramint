@extends('layouts.admin')


@section("content")
<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __("Courses") }}</h6>
                <div class="dropdown no-arrow">
                    @can('course.create')
                    <x-CreateButton path="{{ route('course.create') }}" />
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
                                <th scope="col">{{ __("is_published") }}</th>
                                @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['course.edit' , 'course.delete']))
                                <th scope="col">{{ __("Action") }}</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($courses as $course)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $course->title }}</td>
                                <td>{{ $course->Department->title }}</td>
                                <td>
                                    <x-CheckUnCheck isChecked="{{ $course->is_published }}" />
                                </td>
                                @if(Auth::user()->hasRole('Super-Admin') || Auth::user()->hasAnyPermission(['course.edit' , 'course.delete']))
                                <td>
                                    <div class="btn-group" role="group" aria-label="{{ __("Action Buttons ") }}">
                                        @can('course.edit')
                                        <x-EditButton itemId="{{ $course->id }}" path="course.edit" />
                                        @endcan
                                        @can('course.delete')
                                        <x-DeleteButton itemId="{{ $course->id }}" path="course.destroy" />
                                        @endcan
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
                        {!! $courses->links() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>


    @endsection


