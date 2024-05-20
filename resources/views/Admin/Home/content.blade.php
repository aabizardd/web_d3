@extends('Admin.layout')
@section('content')
    @if (auth()->user()->role == 1)
        @include('Admin.Home.beranda_admin')
    @else
        @include('Admin.Home.beranda_pic')
    @endif
@endsection
