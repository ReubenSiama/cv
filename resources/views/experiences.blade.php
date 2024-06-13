@extends('layouts.main', [
    'title' => 'Experiences',
    'description' => 'Reuben Siama\'s professional experiences. I have worked with various companies and organizations. I have experience in web development, mobile app development, and software development. I have experience in Laravel, Vue.js, Tailwind CSS, Flutter, and many more. I am a full-stack web developer. I am a mobile app developer. I am a software developer. I am Reuben Lalhmunsiama.'
    ])
@section('content')
<div class="mx-4 md:container md:mx-auto mt-4">
    <h1 class="text-3xl font-bold text-center">
        Experiences
    </h1>
    @foreach ($experiences as $experience)
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 bg-light-black mb-4 p-4 rounded-md">
            <div class="col-span-1 flex justify-between">
                <div class="">
                    <span class="text-xl font-bold">
                        {{ $experience->title }}
                    </span>
                    <br>
                    <span class="italic text-sm">
                        {{ date('Y-M', strtotime($experience->start_date)) }} to
                        {{ $experience->end_date ? date('Y-M', strtotime($experience->end_date)) : 'Present' }}
                    </span>
                    <br>
                </div>
                <div class="text-right">
                    <span class="text-sm">
                        {{ $experience->location }}
                    </span>
                </div>
            </div>
            <div class="col-span-2 content-center border-l-4 border-gray-600 pl-10">
                <i class="text-sm text-gray-300">
                    {{ $experience->subtitle }}
                </i>
                <div id="experience-content">
                    {!! $experience->content !!}
                </div>
            </div>
        </div>
    @endforeach
</div>

<style>
    #experience-content li{
        padding: 5px;
    }

    #experience-content li::before{
        content: "•";
        color: #c9c9c9;
        font-weight: bold;
        display: inline-block;
        width: 1em;
        margin-left: -1em;
    }
</style>
@endsection
