@extends('layouts.main', [
    'title' => 'Blog Posts',
    'description' => "Read the latest blog posts."
    ])
@section('content')
<div class="mx-5 md:container md:mx-auto my-10">
    <h1 class="text-3xl font-bold mb-8 text-center">Blog Posts</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
        @forelse ($posts as $post)
        <div class="bg-[#181A1B] rounded-lg shadow-lg overflow-hidden hover:shadow-2xl transition-shadow duration-300">
            <img src="{{ asset('storage/'.$post->cover_image)}}" alt="{{ $post->title }}" class="w-full h-48 object-cover">

            <div class="p-6">
                <h2 class="text-xl font-semibold text-[#CDC8C2]">{{ $post->title }}</h2>
                <h4 class="text-sm text-[#B1AAA0]">{{ $post->subtitle }}</h4>
                <div>
                    @foreach ($post->tags as $tag)
                    <span class="inline-block bg-[#2D2D2D] rounded-full px-3 py-1 text-sm font-semibold text-[#CDC8C2] mr-2 mt-2">{{ $tag->name }}</span>
                    @endforeach
                </div>
                <p class="prose lg:prose-xl">
                    @php
                        $parsedown = Str::markdown($post->excerpt);
                    @endphp
                    {!! $parsedown !!}
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
<style>
    nav[role="navigation"] div p {
        color: white;
    }
</style>
@endsection
