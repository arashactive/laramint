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
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">{{ __("Department") }}</div>
                        <a class="dropdown-item" href="{{ URL::to('/department') }}">Go Department</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ URL::to('/dashboard') }}">Go Dashboard</a>
                    </div>
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
                        <th scope="col">-</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($departments as $department)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $department->title }}</td>
                                <td>{{ $department->is_published }}</td>
                                <td>
                                    <a href="" class="btn btn-warning btn-sm">
                                        <span class="fa fa-edit"></span>
                                    </a>
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