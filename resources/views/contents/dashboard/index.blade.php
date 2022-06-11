@extends('layouts.admin')


@section("content")

<div class="row">

    <div class="col-4">

       <x-box.profile-box :user="Auth()->User()"/>

    </div>

</div>
@endsection