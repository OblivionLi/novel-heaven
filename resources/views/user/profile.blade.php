@extends('layout')

@section('page_title')

    {{ 'Novel Heaven - Profile ', $user->name }}

@endsection

@section('content')
    @include('includes.mainNavbar')



@endsection