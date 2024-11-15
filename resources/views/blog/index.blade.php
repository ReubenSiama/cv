@extends('layouts.main', [
    'title' => 'Home',
    'description' => "Reuben Siama's personal website. I am a full-stack web developer with a passion for creating beautiful and functional websites. I am proficient in Laravel, Vue.js, Tailwind CSS and Flutter. I am passionate about learning and sharing knowledge. I am a lifelong learner. I am a problem solver. I am a team player. I am a leader. I am a developer. I am Reuben Lalhmunsiama."
    ])
@section('content')
<div class="mx-5 md:container md:mx-auto my-10">
    <h1 class="text-3xl font-bold mb-8 text-center">Blog Posts</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @forelse ($posts as $post)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
            <img src="{{ asset('storage/'.$post->cover_image)}}" alt="Post Image" class="w-full h-48 object-cover">

            <div class="p-6">
                <h2 class="text-xl font-semibold mb-2 text-gray-800">{{ $post->title }}</h2>
                <p class="text-sm mb-4 text-black">
                    <x-markdown class="text-black">
                        {!! $post->excerpt !!}
                    </x-markdown>
                </p>

                <div class="flex items-center justify-between text-gray-500 text-xs">
                    <span></span>
                    <span>{{ date('Y-m-d', strtotime($post->created_at)) }}</span>
                </div>

                <a href="{{ route('blog.view', $post->slug)}}" class="mt-4 inline-block text-blue-500 hover:underline">Read more →</a>
            </div>
        </div>
        @empty
        <p>No posts found.</p>
        @endforelse
    </div>
    <br>
    {{ $posts->links() }}
</div>
@endsection

<style>
    nav[role="navigation"] div p {
        color: white;
    }
</style>
