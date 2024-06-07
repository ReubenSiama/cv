@extends('layouts.main')
@section('content')
    <div class="w-full h-80 bg-cover bg-center bg-no-repeat"
    style="background-image: url({{ asset('storage/'.$about->image)}})">
    </div>
    <div class="mx-5 md:container md:mx-auto mt-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="col-span-2">
                {!! $about->value !!}
            </div>
            <div class="">
                <div class="border border-gray-200 p-10 rounded-lg">
                    <h1 class="text-2xl font-bold text-center">Skills</h1>
                    <table class="table w-full">
                        @foreach ($skills as $skill)
                        <tr>
                            <td>{{ $skill->name }}</td>
                            <td>
                                <div class="bg-green-500 px-5 text-center text-white" style="width: {{ $skill->percentage ?? 0 }}%">
                                    {{ $skill->percentage }}%
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                    <ul class="list">
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
