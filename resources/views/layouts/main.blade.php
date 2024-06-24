@extends('layouts.master')
@section('body')
    <x-navbar />
    <div class="flex flex-col min-h-full">
        @yield('content')
    </div>
    <x-footer />
@endsection
