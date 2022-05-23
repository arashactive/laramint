@extends('layouts.admin')


@section("content")



<div class="row">



    <div class="col-2">

        <div class="card border-left-primary shadow">
            <div class="card-body">
                <img class="card-img-top" src="{{ asset('img/admin/menu/department.jpg') }}" alt="{{ __('Department') }}">
            </div>
            <div class="card-footer">
                <a href="{{ route('department.index') }}" class="font-weight-bold text-gray-800 text-uppercase">
                    {{ __('Department') }}
                </a>
            </div>

        </div>

    </div>
    <div class="col-2">

        <div class="card border-left-primary shadow">
            <div class="card-body">
                <img class="card-img-top" src="{{ asset('img/admin/menu/course.jpg') }}" alt="{{ __('Course') }}">
            </div>
            <div class="card-footer">
                <a href="{{ route('course.index') }}" class="font-weight-bold text-gray-800 text-uppercase">
                    {{ __('Course') }}
                </a>
            </div>

        </div>


    </div>
    <div class="col-2">

        <div class="card border-left-primary shadow">
            <div class="card-body">
                <img class="card-img-top" src="{{ asset('img/admin/menu/term.jpg') }}" alt="{{ __('terms') }}">
            </div>
            <div class="card-footer">
                <a href="{{ route('term.index') }}" class="font-weight-bold text-gray-800 text-uppercase">
                    {{ __('terms') }}
                </a>

            </div>


        </div>


    </div>


    <div class="col-2">

        <div class="card border-left-primary shadow">
            <div class="card-body">
                <img class="card-img-top" src="{{ asset('img/admin/menu/session.jpg') }}" alt="{{ __('Sessions') }}">
            </div>
            <div class="card-footer">
                <a href="{{ route('session.index') }}" class="font-weight-bold text-gray-800 text-uppercase">
                    {{ __('Sessions') }}
                </a>

            </div>


        </div>


    </div>
</div>
@endsection