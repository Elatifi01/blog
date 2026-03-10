@extends('layouts.app-guest')

@section('content')
    @if (session('success'))
        <div id="success-message"
            style=" top:20px; right:20px; background:#16a34a; color:white; padding:10px 16px; border-radius:6px; font-weight:500;">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(() => {
                const msg = document.getElementById('success-message');
                if (msg) msg.style.display = 'none';
            }, 1000);
        </script>
    @endif
    @include('components.nav-guest')

    <div class="max-w-4xl mx-auto mt-10 mb-6 px-4">

        <nav aria-label="Breadcrumb" class="flex items-center space-x-2 text-sm text-gray-400">

            <!-- Home -->
            <a href="{{ url('/') }}" class="text-blue-400 hover:text-blue-300 flex items-center transition-colors">

                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m3 12 2-2m0 0 7-7 7 7M5 10v10a1 1 0 0 0 1 1h3m10-11 2 2m-2-2v10a1 1 0 0 1-1 1h-3">
                    </path>
                </svg>

                Home
            </a>

            <!-- Arrow -->
            <svg class="w-4 h-4 text-gray-600 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 18 6-6-6-6"></path>
            </svg>

            <!-- Blog -->
            <a href="{{ route('posts.index') }}" class="text-blue-400 hover:text-blue-300 transition-colors">
                Blog
            </a>

            <!-- Arrow -->
            <svg class="w-4 h-4 text-gray-600 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 18 6-6-6-6"></path>
            </svg>

            <!-- Category -->
            <span class="text-blue-400">
                {{ $post->category->name }}
            </span>

            <!-- Arrow -->
            <svg class="w-4 h-4 text-gray-600 mx-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m9 18 6-6-6-6"></path>
            </svg>

            <!-- Current Post -->
            <span class="text-gray-300 font-medium">
                {{ $post->title }}
            </span>

        </nav>

    </div>
    <article class="max-w-3xl mx-auto px-4 py-12 shadow-sm min-h-screen text-white">

        <!-- Article Header -->

        <div class="mb-10 text-center">
            <div class="mb-4">
                <span class="text-blue-400 font-semibold text-sm uppercase tracking-wide">
                    {{ $post->category->name }}
                </span>
            </div>

            <h1 class="text-4xl font-bold mb-4">
                {{ $post->title }}
            </h1>

            <div class="text-gray-400 flex justify-center items-center space-x-4">
                <span>Author : {{ $post->user->name }}</span>
                <span class="text-gray-600">•</span>
                <span>{{ $post->created_at->format('F j, Y') }}</span>
                <span class="text-gray-600">•</span>
                <span>{{ round(strlen(strip_tags($post->views)) / 200) }} View</span>
            </div>
        </div>

        <!-- Featured Image -->
        @if ($post->thumbnail)
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                class="mb-8 w-full h-96 object-cover rounded-lg shadow-lg">
        @endif

        <!-- Video -->
        @if ($post->video)
            <div class="mb-8">
                <video controls class="w-full rounded-lg shadow-lg">
                    <source src="{{ asset('storage/' . $post->video) }}" type="video/mp4">
                </video>
            </div>
        @endif

        <!-- Article Content -->
        <div class="prose prose-invert max-w-none">
            {!! $post->content !!}
        </div>

        <!-- Footer -->
        <div class="mt-12 pt-8 border-t border-gray-700">
            <div class="flex flex-wrap gap-2 mb-6">
                <span class="bg-blue-900 text-gray-200 px-3 py-1 rounded-full text-sm">
                    {{ $post->category->name }}
                </span>
            </div>
        </div>
        @auth
            @if (Auth::user()->id === $post->user_id || Auth::user()->user_type === 'admin')
                <div class="mt-8 flex space-x-4">
                    <a href="{{ route('posts.edit', $post->id) }}"
                        class="px-4 py-2 rounded-lg bg-yellow-500 text-white font-semibold hover:bg-yellow-600 transition-colors">
                        Edit
                    </a>

                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this post?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="px-4 py-2 rounded-lg bg-red-600 text-white font-semibold hover:bg-red-700 transition-colors">
                            Delete
                        </button>
                    </form>
                </div>
            @endif

        @endauth

    </article>
@endsection
