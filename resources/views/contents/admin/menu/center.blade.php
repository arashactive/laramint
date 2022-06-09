@extends('layouts.admin')


@section("content")


<div class="card">
    <div class="card-header">
        <h3>@lang('Manage Course')</h3>
    </div>
</div>
<div class="row mt-4 mb-4">

    <div class="col-2">
        <div class="card border-left-primary shadow">
            <div class="card-body">
                <a href="{{ route('department.index') }}">
                    <img class="card-img-top" src="{{ asset('img/admin/menu/department.jpg') }}" alt="{{ __('Department') }}">
                </a>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('department.index') }}" class="font-weight-bold text-gray-800 text-uppercase">
                    {{ __('Department') }}
                </a>
            </div>
        </div>
    </div>

    <div class="col-2">
        <div class="card border-left-primary shadow">
            <div class="card-body">
                <a href="{{ route('course.index') }}">
                    <img class="card-img-top" src="{{ asset('img/admin/menu/course.jpg') }}" alt="{{ __('Course') }}">
                </a>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('course.index') }}" class="font-weight-bold text-gray-800 text-uppercase">
                    {{ __('Course') }}
                </a>
            </div>
        </div>
    </div>

    <div class="col-2">
        <div class="card border-left-primary shadow">
            <div class="card-body">
                <a href="{{ route('term.index') }}">
                    <img class="card-img-top" src="{{ asset('img/admin/menu/term.jpg') }}" alt="{{ __('terms') }}">
                </a>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('term.index') }}" class="font-weight-bold text-gray-800 text-uppercase">
                    {{ __('terms') }}
                </a>
            </div>
        </div>
    </div>

    <div class="col-2">
        <div class="card border-left-primary shadow">
            <div class="card-body">
                <a href="{{ route('session.index') }}">
                    <img class="card-img-top" src="{{ asset('img/admin/menu/session.jpg') }}" alt="{{ __('Sessions') }}">
                </a>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('session.index') }}" class="font-weight-bold text-gray-800 text-uppercase">
                    {{ __('Sessions') }}
                </a>
            </div>
        </div>
    </div>




</div>


<div class="card">
    <div class="card-header">
        <h3>@lang('Manage Assessment')</h3>
    </div>
</div>

<div class="row mt-4 mb-4">

    

    <div class="col-2">
        <div class="card border-left-primary shadow">
            <div class="card-body">
                <a href="{{ route('quiz.index') }}">
                    <img class="card-img-top" src="{{ asset('img/admin/menu/quiz.png') }}" alt="{{ __('Quiz') }}">
                </a>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('quiz.index') }}" class="font-weight-bold text-gray-800 text-uppercase">
                    {{ __('Quiz') }}
                </a>
            </div>
        </div>
    </div>

    <div class="col-2">
        <div class="card border-left-primary shadow">
            <div class="card-body">
                <a href="{{ route('question.index') }}">
                    <img class="card-img-top" src="{{ asset('img/admin/menu/question.png') }}" alt="{{ __('Question') }}">
                </a>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('question.index') }}" class="font-weight-bold text-gray-800 text-uppercase">
                    {{ __('Question') }}
                </a>
            </div>
        </div>
    </div>

</div>

<div class="card">
    <div class="card-header">
        <h3>@lang('Manage Plugins')</h3>
    </div>
</div>

<div class="row  mt-4 mb-4">
    @can('rubric.index')
    <div class="col-2">

        <div class="card">
            <div class="card-body">
                <a href="{{ route('rubric.index') }}">
                    <img class="card-img-top img-circle" src="{{ asset('img/admin/menu/rubric.png') }}" alt="{{ __('rubric') }}">
                </a>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('rubric.index') }}" class="font-weight-bold text-gray-800 text-uppercase">
                    {{ __('rubric') }}
                </a>
            </div>

        </div>

    </div>
    @endcan

    @can('feedback.index')
    <div class="col-2">

        <div class="card">
            <div class="card-body">
                <a href="{{ route('feedback.index') }}">
                    <img class="card-img-top img-circle" src="{{ asset('img/admin/menu/feedback.png') }}" alt="{{ __('feedback') }}">
                </a>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('feedback.index') }}" class="font-weight-bold text-gray-800 text-uppercase">
                    {{ __('feedback') }}
                </a>
            </div>

        </div>
    </div>
    @endcan
    @can('file.index')
    <div class="col-2">

        <div class="card">
            <div class="card-body">
                <a href="{{ route('file.index') }}">
                    <img class="card-img-top img-circle" src="{{ asset('img/admin/menu/file.png') }}" alt="{{ __('file') }}">
                </a>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('file.index') }}" class="font-weight-bold text-gray-800 text-uppercase">
                    {{ __('Files') }}
                </a>
            </div>
        </div>

    </div>
    @endcan

    @can('document.index')
    <div class="col-2">

        <div class="card">
            <div class="card-body">
                <a href="{{ route('document.index') }}">
                    <img class="card-img-top img-circle" src="{{ asset('img/admin/menu/document.png') }}" alt="{{ __('Document') }}">
                </a>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('document.index') }}" class="font-weight-bold text-gray-800 text-uppercase">
                    {{ __('document') }}
                </a>
            </div>
        </div>

    </div>
    @endcan


    @can('badges.index')
    <div class="col-2">

        <div class="card">
            <div class="card-body">

                <a href="{{ route('badges.index') }}">
                    <img class="card-img-top img-circle" src="{{ asset('img/admin/menu/badge.png') }}" alt="{{ __('badges') }}">
                </a>

            </div>
            <div class="card-footer text-center">
                <a href="{{ route('badges.index') }}" class="font-weight-bold text-gray-800 text-uppercase">
                    {{ __('badges') }}
                </a>
            </div>
        </div>

    </div>
    @endcan
</div>
@endsection