@extends('layouts.main')
@section('content')
<div class="mx-5 md:container md:mx-auto mt-10">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="col-span-1 text-center">
            <img src="{{ asset('storage/'.$about->image)}}" alt="{{ $about->title }}" class="object-contain mx-auto">
        </div>
        <div class="col-span-2 content-center">
            <div class="text-2xl">{{ $about->title }}</div>
            <div class="text-xl mb-6">{{ $about->subtitle }}</div>
            {!! $about->value !!}
        </div>
    </div>
</div>
<div class="bg-light-black">
    <div class="mx-5 md:container md:mx-auto mt-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="p-10 col-span-2">
                <h1 class="text-2xl font-bold text-center mb-4">Skills</h1>
                <table class="table w-full">
                    @foreach ($skills as $skill)
                    <tr>
                        <td class="p-2">{{ $skill->name }}</td>
                        <td>
                            <div class="bg-green-500 px-5 text-center text-white" style="width: {{ $skill->percentage ?? 0 }}%">
                                {{ $skill->percentage }}%
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="hidden md:flex">
                <img src="{{ asset('images/skills.png') }}" alt="skills" class="object-contain mx-auto">
            </div>
        </div>
    </div>
</div>
<div class="mx-5 md:container md:mx-auto mt-10">
    <div class="p-10">
        <h1 class="text-2xl font-bold text-center">Education</h1>
        <table class="table w-full">
            @foreach ($educations as $education)
            <tr>
                <td class="p-2 text-lg font-bold">{{ $education->title }}</td>
                <td class="p-2 text-center">-</td>
                <td class="p-2">
                    {{ date('Y-M', strtotime($education->start_date)) }} to {{ date('Y-M', strtotime($education->end_date)) }}
                    <br>
                    {{ $education->subtitle }}
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
