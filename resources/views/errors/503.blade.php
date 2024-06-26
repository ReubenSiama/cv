@extends('layouts.master', [
    'title' => 'Under Maintenance',
    'class' => 'items-center content-center'
    ])
@section('body')
    <div class="text-center font-extrabold text-9xl">
        5<span class="text text-red-500">0</span>3
    </div>
    <div class="text-center font-extralight text-2xl">
        We are under maintenance
    </div>
    <div class="text-center italic">
        Please check back later.
    </div>
@endsection
