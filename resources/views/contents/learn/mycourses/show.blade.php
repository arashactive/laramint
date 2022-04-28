@extends('layouts.admin')


@section("content")

@can('mentor.list')
<x-box.profile-top-header :user="$term->User" />
<x-box.profile-review-box />
@endcan


<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4 border-bottom-primary">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                
                
                
                <h6 class="m-0 font-weight-bold text-primary">{{ $term->title }}</h6>

                <div class="dropdown no-arrow">
                    
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <h6>{{ $term->Department->title }} | {{ $term->Course->title }}</h6>

                @forelse ($term->Sessions as $session)
                
                    <x-box.session-item-for-student
                    :session="$session" />

                @empty
                    
                @endforelse

            </div>
        </div>
    </div>


@endsection