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
            <h1 class="text-4xl font-bold mb-2">{{ $blogPost->title }}</h1>
    
            @if($blogPost->subtitle)
                <h2 class="text-xl text-[#B1AAA0] mb-4">{{ $blogPost->subtitle }}</h2>
            @endif

            
            <p class="text-sm text-[#B1AAA0] mb-6">{{ $blogPost->created_at->format('F j, Y') }}</p>
            
            <div>
                @foreach ($blogPost->tags as $tag)
                <span class="inline-block bg-[#2D2D2D] rounded-full px-3 py-1 text-sm font-semibold mr-2 mt-2">{{ $tag->name }}</span>
                @endforeach
            </div>

            <div class="prose lg:prose-xl text-white">
                @php
                    $content = \Str::markdown($blogPost->content);
                @endphp
                {!! $content !!}
            </div>
        </div>
    </div>
</div>

<script type="module">
    import mermaid from 'https://cdn.jsdelivr.net/npm/mermaid@11.4.0/dist/mermaid.esm.min.mjs';

    async function initializeMermaid(){
        mermaid.initialize({
            startOnLoad: true,
            theme: 'dark',
        });
        await mermaid.run({
            nodes: document.querySelectorAll('.language-mermaid'),
        });
    }

    initializeMermaid();
</script>
@endsection
