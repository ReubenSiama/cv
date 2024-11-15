@extends('layouts.main', [
    'title' => $blogPost->title,
    'description' => "Reuben Siama's personal website. I am a full-stack web developer with a passion for creating beautiful and functional websites. I am proficient in Laravel, Vue.js, Tailwind CSS and Flutter. I am passionate about learning and sharing knowledge. I am a lifelong learner. I am a problem solver. I am a team player. I am a leader. I am a developer. I am Reuben Lalhmunsiama."
    ])
@section('content')
<div class="mx-5 md:container md:mx-auto my-10">
    <div class="max-w-3xl mx-auto p-4 lg:p-10 bg-[#181A1B] shadow-lg rounded-lg">
        @if($blogPost->cover_image)
            <img src="{{ asset('storage/'.$blogPost->cover_image) }}" alt="{{ $blogPost->title }}" class="w-full h-64 object-cover rounded-t-lg">
        @endif
    
        <div class="px-4 py-6">
            <h1 class="text-4xl font-bold text-[#CDC8C2] mb-2">{{ $blogPost->title }}</h1>
    
            @if($blogPost->subtitle)
                <h2 class="text-xl text-[#B1AAA0] mb-4">{{ $blogPost->subtitle }}</h2>
            @endif

            
            <p class="text-sm text-[#B1AAA0] mb-6">{{ $blogPost->created_at->format('F j, Y') }}</p>
            
            <div>
                @foreach ($blogPost->tags as $tag)
                <span class="inline-block bg-[#2D2D2D] rounded-full px-3 py-1 text-sm font-semibold text-[#CDC8C2] mr-2 mt-2">{{ $tag->name }}</span>
                @endforeach
            </div>

            <div class="prose prose-lg max-w-none reset-tw">
                @php
                    $parsedown = new Parsedown();
                    $parsedown->setSafeMode(true);
                    $parsedown->setBreaksEnabled(true);
                    $parsedown->setMarkupEscaped(true);
                @endphp
                {!! $parsedown->text($blogPost->content) !!}
            </div>
        </div>
    </div>
</div>
<style>
.reset-tw,
.reset-tw h1,
.reset-tw h2,
.reset-tw h3,
.reset-tw h4,
.reset-tw h5,
.reset-tw h6,
.reset-tw code
{
    all: revert;
}

.reset-tw a
{
    color: #FF5A1F;
}

.reset-tw code{
    background-color: #24292E;
    padding: 0.20rem 0.2rem;
    border-radius: 0.25rem;
}

.prose ol,
.prose ul {
    list-style-type: revert;
    margin-left: 15px;
}

.prose .shiki code{
    background-color: revert;
    padding: revert;
    border-radius: revert;
}

.prose .shiki {
    max-width: 100%;
    max-height: 100%;
    overflow: scroll;
    padding: 1rem;
}

.prose table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 1.5em;
}

.prose thead {
    background-color: #000000;
}

.prose th{
    background-color: #2c2c2c;
}

.prose th,
.prose td {
    padding: 8px 12px;
    text-align: left;
}

.prose tr:nth-child(even) {
    background-color: #6e6e6e;
}

.prose tr:nth-child(odd) {
    background-color: #929292;
}

</style>
@endsection
