@extends('layouts.admin')


@section("content")

<!-- Create Form Card -->
<div class="col-12">
    <div class="row">
        <div class="col-6">
            @livewire('admin.configuration.site-name')

        </div>
        <div class="col-6">



        </div>
    </div>

    @livewire('admin.configuration.no-reply-email')
</div>


@endsection