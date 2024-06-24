@extends('layouts.master', [
    'title' => 'Under Maintenance',
    'class' => 'items-center content-center'
    ])
@section('body')
    <div class="mx-auto items-center content-center justify-center">
        <x-filament::icon
            alias="panels::topbar.global-search.field"
            icon="heroicon-c-cog"
            wire:target="search"
            class="h-10 w-10 text-gray-500 dark:text-gray-400 text-center m-auto"
        />
    </div>
    <div class="text-center font-extralight text-2xl">
        We are under maintenance.
        <br>
    </div>
    <div class="text-center font-extrabold text-9xl">
        5<span class="text text-red-500">0</span>3
    </div>
    <div class="text-center italic">
        Please check back later.
    </div>
@endsection
