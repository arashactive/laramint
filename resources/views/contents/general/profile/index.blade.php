@extends('layouts.admin')


@section("content")

@livewire('user.profile', ['user' => $user])

@endsection