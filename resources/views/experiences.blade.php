@extends('layouts.main', [
    'title' => 'Experiences',
    'description' => 'Reuben Siama\'s professional experiences. I have worked with various companies and organizations. I have experience in web development, mobile app development, and software development. I have experience in Laravel, Vue.js, Tailwind CSS, Flutter, and many more. I am a full-stack web developer. I am a mobile app developer. I am a software developer. I am Reuben Lalhmunsiama.'
    ])
@section('content')
<div class="mx-4 md:container md:mx-auto mt-4">
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
</div>
@endsection
