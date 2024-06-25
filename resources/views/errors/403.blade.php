@extends('layouts.master', [
    'title' => 'Forbidden',
    'class' => 'items-center content-center'
    ])
@section('body')
    <div class="text-center font-extralight text-2xl">
        Can't let you in.
        <br>
    </div>
    <div class="text-center font-extrabold text-9xl">
        4<span class="text text-red-500">0</span>3
    </div>
    <div class="text-center italic">
        Empty user agent detected.
    </div>
@endsection
