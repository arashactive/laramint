@extends('layouts.admin')


@section("content")

<div class="row">
    <div class="col-4">
        <x-box.profile-box :user="$user" />
<<<<<<< HEAD
    </div>
    <div class="col-4">
        <x-box.coins.user-coins :user="$user" />
    </div>
    <div class="col-4">
        <x-box.leader-board.top-learner-score :user="$user" />
    </div>
=======
    </div>
    <div class="col-4">
        <x-box.coins.user-coins :user="$user" />
    </div>
    <div class="col-4">
        <x-box.leader-board.top-learner-score :user="$user" />
    </div>
</div>
<div class="row">
    <x-box.activity.last-term :term="$lastTerm" />
>>>>>>> e83029b2e2e9ec0f1c7b5bdabf6236d3c9e48ca2
</div>
@endsection