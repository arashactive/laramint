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

    <div class="col-2">
        <div class="card border-left-primary shadow">
            <div class="card-body">
                <img class="card-img-top" src="{{ asset('img/admin/menu/quiz.png') }}" alt="{{ __('Quiz') }}">
            </div>
            <div class="card-footer">
                <a href="{{ route('quiz.index') }}" class="font-weight-bold text-gray-800 text-uppercase">
                    {{ __('Quiz') }}
                </a>
            </div>
        </div>
    </div>

    <div class="col-2">
        <div class="card border-left-primary shadow">
            <div class="card-body">
                <img class="card-img-top" src="{{ asset('img/admin/menu/question.png') }}" alt="{{ __('Question') }}">
            </div>
            <div class="card-footer">
                <a href="{{ route('question.index') }}" class="font-weight-bold text-gray-800 text-uppercase">
                    {{ __('Question') }}
                </a>
            </div>
        </div>
    </div>

</div>


<hr />


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
                <img class="card-img-top img-circle" src="{{ asset('img/admin/menu/rubric.png') }}" alt="{{ __('rubric') }}">
            </div>
            <div class="card-footer">
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
                <img class="card-img-top img-circle" src="{{ asset('img/admin/menu/feedback.png') }}" alt="{{ __('feedback') }}">
            </div>
            <div class="card-footer">
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
                <img class="card-img-top img-circle" src="{{ asset('img/admin/menu/file.png') }}" alt="{{ __('file') }}">
            </div>
            <div class="card-footer">
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
                <img class="card-img-top img-circle" src="{{ asset('img/admin/menu/document.png') }}" alt="{{ __('Document') }}">
            </div>
            <div class="card-footer">
                <a href="{{ route('document.index') }}" class="font-weight-bold text-gray-800 text-uppercase">
                    {{ __('document') }}
                </a>
            </div>
        </div>

    </div>
    @endcan

</div>
@endsection