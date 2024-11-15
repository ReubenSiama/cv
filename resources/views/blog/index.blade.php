@extends('layouts.main', [
    'title' => 'Blog Posts',
    'description' => "Read the latest blog posts."
    ])
@section('content')
<div class="mx-5 md:container md:mx-auto my-10">
    <h1 class="text-3xl font-bold mb-8 text-center">Blog Posts</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @forelse ($posts as $post)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
            <img src="{{ asset('storage/'.$post->cover_image)}}" alt="{{ $post->title }}" class="w-full h-48 object-cover">

            <div class="p-6">
                <h2 class="text-xl font-semibold text-gray-800">{{ $post->title }}</h2>
                <h4 class="text-sm text-gray-600">{{ $post->subtitle }}</h4>
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
        <p class="text-center col-span-4">No posts found.</p>
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
