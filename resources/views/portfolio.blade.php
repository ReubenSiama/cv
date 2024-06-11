@extends('layouts.main')
@section('content')
<div class="mx-4 md:mx-auto md:container mt-4">
    <a href="{{ route('portfolios') }}" class="text-orange-500">
        ← Back    
    </a>
    <br>
    <div class="text-center uppercase text-xl">
        {{ $portfolio->title }}
    </div>
    <br>
    <div class="mb-4">
        Technologies:
        @foreach ($portfolio->technologies as $technology)
            <span class="bg-gray-700 text-white px-2 py-1 rounded-lg mr-2">{{ $technology }}</span>
        @endforeach
    </div>
    <div class="p-4 bg-light-black rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
        <div id="portfolio-content">
            <img src="{{ asset('storage/'.$portfolio->image) }}" alt="{{ $portfolio->title }}"
            class="object-cover w-full md:w-[30%] mr-6 rounded-lg md:float-start">
            {!! $portfolio->content !!}
        </div>
    </div>
</div>

<style>
    #portfolio-content li{
        list-style-type: disc;
        list-style-position: inside;
        padding: 5px;
    }
</style>
@endsection
