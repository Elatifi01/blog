@extends('layouts.app-guest')

@section('content')
    @include('components.nav-guest')
    <section class="py-20 bg-white dark:bg-gray-900" x-data="{ inView: false }" x-init="setTimeout(() => inView = true, 500)">
        <div class="mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="mb-16 text-center">
                <div :class="{ 'opacity-100 translate-y-0': inView, 'opacity-0 translate-y-8': !inView }"
                    class="transition-all duration-1000 ease-out">
                    <h2 class="mb-4 text-4xl font-bold text-gray-900 sm:text-5xl dark:text-white">
                        Delicious Recipes
                    </h2>
                    <p class="mx-auto text-xl text-gray-600 dark:text-gray-300">
                        Discover tasty recipes, cooking tips, and inspiration for your kitchen
                    </p>
                    <form action="{{ route('posts.search') }}" method="GET">
                        <div class="xl:w-1/2 lg:w-[60%] sm:w-[70%] w-[90%] mx-auto flex gap-2 md:mt-6 mt-6">
                            <input type="text" name="query"
                                class="border border-gray-400 w-full p-2 rounded-md text-xl pl-2"
                                placeholder="Search Recette..." value="{{ request('query') }}" />
                            <button type="submit"
                                class="px-[10px] bg-blue-500 text-lg text-white rounded-md font-semibold">Search</button>
                        </div>
                    </form>
                    <!-- Create Post Button for Admin/Author -->
                    @if (auth()->user())
                        <a href="{{ route('posts.create') }}"
                            class="mt-6 inline-block px-6 py-3 rounded-lg bg-blue-600 text-white font-semibold shadow hover:bg-blue-700 transition-colors">
                            + Create Post
                        </a>
                    @endif
                </div>
            </div>

            <!-- Posts Grid -->
            <div class="grid gap-8 mb-20 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($posts as $index => $post)
                    <div :class="{ 'opacity-100 translate-y-0': inView, 'opacity-0 translate-y-8': !inView }"
                        class="transition-all duration-1000 ease-out delay-{{ 200 + $index * 200 }}">
                        <div
                            class="group overflow-hidden transition-all duration-300 flex-col flex h-full rounded-2xl bg-gray-50 shadow-lg dark:bg-gray-800">
                            <div class="relative">
                                <!-- Thumbnail -->
                                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->title }}"
                                    class="object-cover group-hover:scale-105 transition-transform duration-300 w-full h-[256px]" />
                                <!-- Hover overlay -->
                                <div
                                    class="absolute inset-0 bg-black/60 group-hover:bg-opacity-40 transition-all duration-300 items-center justify-center opacity-0 group-hover:opacity-100 flex bg-opacity-0">
                                    <a href="{{ route('posts.show', $post) }}"
                                        class="transition-colors duration-200 px-4 py-2 rounded-lg bg-blue-600 font-semibold text-white">
                                        Read More
                                    </a>
                                </div>
                            </div>
                            <!-- Post info -->
                            <div class="flex-col flex-grow flex p-6">
                                <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white">
                                    {{ $post->title }}
                                </h3>
                                <p class="flex-grow text-gray-600 dark:text-gray-300">
                                    {!! Str::limit(strip_tags($post->content), 150) !!}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
