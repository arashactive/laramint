@extends('layouts.admin')


@section("content")
<div class="row">
    <div class="col-3">

        <div class="card">
            <img class="card-img-top img-circle" src="{{ asset('img/admin/menu/department.png') }}" alt="{{ __('Department') }}">
            <div class="card-footer">
                <a href="{{ route('department.index') }}" class="font-weight-800">
                    {{ __('Department') }}
                </a>
            </div>

        </div>

    </div>
    <div class="col-3">

        <div class="card">
            <img class="card-img-top img-circle" src="{{ asset('img/admin/menu/course.png') }}" alt="{{ __('Course') }}">
            <div class="card-footer">
                <a href="{{ route('course.index') }}" class="font-weight-800">
                    {{ __('Course') }}
                </a>
            </div>

        </div>


    </div>
    <div class="col-3">

        <div class="card">
            <img class="card-img-top img-circle" src="{{ asset('img/admin/menu/term.png') }}" alt="{{ __('terms') }}">
            <div class="card-footer">
                <a href="{{ route('term.index') }}" class="font-weight-800">
                    {{ __('terms') }}
                </a>

            </div>


        </div>


    </div>


    <div class="col-3">

        <div class="card">
            <img class="card-img-top img-circle" src="{{ asset('img/admin/menu/session.png') }}" alt="{{ __('Sessions') }}">
            <div class="card-footer">
                <a href="{{ route('session.index') }}" class="font-weight-800">
                    {{ __('Sessions') }}
                </a>

            </div>


        </div>


    </div>
</div>
@endsection