@extends('layouts.master', [
    'title' => 'Under Maintenance',
    'class' => 'items-center content-center'
    ])
@section('body')
    <div class="text-center font-extrabold text-9xl">
        4<span class="text text-red-500">0</span>4
    </div>
    <div class="text-center font-extralight text-2xl">
        Oops! It looks like you've stumbled upon a page that doesn't exist.
        <br>
        Don't worry, it happens to the best of us.
    </div>
    <div class="text-center italic">
        Visit <a href="{{ route('home') }}" class="text-red-500">homepage</a> to explore more.
    </div>
@endsection
