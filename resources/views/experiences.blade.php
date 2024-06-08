@extends('layouts.main')
@section('content')
<div class="mx-5 md:container md:mx-auto mt-10">
    @foreach ($experiences as $experience)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 bg-light-black mb-4 p-4 rounded-md">
            <div class="col-span-1">
                <span class="text-xl font-bold">
                    {{ $experience->title }}
                </span>
                <br>
                <span class="italic text-sm">
                    {{ date('Y-M', strtotime($experience->start_date)) }} to {{ date('Y-M', strtotime($experience->end_date)) }}
                </span>
                <br>
            </div>
            <div class="col-span-2 content-center border-l-4 border-gray-600 pl-10 rounded-lg">
                <i class="text-sm text-gray-300">
                    {{ $experience->subtitle }}
                </i>
                {!! $experience->content !!}
            </div>
        </div>
    @endforeach
@endsection
