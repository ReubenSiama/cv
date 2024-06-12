@extends('layouts.main')
@section('content')
<div class="mx-4 md:mx-auto md:container mt-4">
    @foreach ($portfolios as $portfolio)
        <div class="grid grid-cols-1 md:grid-cols-3 items-center border border-gray-700 rounded-lg shadow dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700 mb-10">
            <img class="object-cover w-full rounded-t-lg md:rounded-none md:rounded-s-lg" src="{{ asset('storage/'.$portfolio->image) }}" alt="{{ $portfolio->title }}">
            <div class="col-span-2 flex flex-col justify-between p-4 leading-normal">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">
                    @if ($portfolio->link)
                        <a target="blank" href="{{ $portfolio->link }}" class="hover:underline">
                            {{ $portfolio->title }}
                        </a>
                    @else
                        {{ $portfolio->title }}
                    @endif
                    <br>
                    <small class="text-sm font-normal">{{ $portfolio->subtitle }}</small>
                </h5>
                {{ $portfolio->short_description }}
                <br>
                <div class="">
                    <div class="py-4">
                        Technologies:
                        @foreach ($portfolio->technologies as $technology)
                            <span class="bg-gray-700 text-white px-2 py-1 rounded-lg mr-2">{{ $technology }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="flex justify-between mt-4">
                    <a href="{{ route('portfolios.view', $portfolio->slug) }}" class="text-orange-500 hover:underline">Read More</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
