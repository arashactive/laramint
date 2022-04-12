@extends('layouts.admin')


@section("content")
<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">{{ __("My Learners") }}</h6>
                <div class="dropdown no-arrow">

                    
                    
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
                        <th scope="col">{{ __("email") }}</th>
                        <th scope="col">{{ __("Term") }}</th>
                        <th scope="col">{{ __("Progress") }}</th>
                        
                        <th scope="col">{{ __("Action") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                                               
                    </tbody>
                </table>
                
                <hr/>
                <div class="text-center">
                    
                </div>

                </div>
            </div>
        </div>
    </div>


@endsection