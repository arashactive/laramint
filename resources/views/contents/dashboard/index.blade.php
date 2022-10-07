@extends('layouts.admin')


@section("content")

<div class="row">
    <div class="col-4">
        <x-box.profile-box :user="$user" />
    </div>
    <div class="col-4">
        <x-box.coins.user-coins :user="$user" />
    </div>
    <div class="col-4">
        <x-box.leader-board.top-learner-score :user="$user" />
    </div>
</div>
@endsection