@extends('layouts.appall')
@section('content')
    <section class="w-full">
        <div
            class="w-full h-[620px] bg-[url('https://images.unsplash.com/photo-1690983322857-0811d47fedfc?q=80&w=1202&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D')] bg-cover bg-no-repeat bg-center flex flex-col justify-center items-center ">
            <!-- Photo by '@insolitus' on Unsplash -->
            <div>
                <h1
                    class="text-white text-center xl:text-5xl lg:text-4xl md:text-3xl sm:text-2xl :text-xl font-semibold bg-gray-800 p-2 bg-opacity-40 rounded-sm">
                    Discover Your New Recette</h1>
            </div>
            <div class=" mx-auto justify-center w-full">
                <form action="{{ route('posts.search') }}" method="GET">
                    <div class="xl:w-1/2 lg:w-[60%] sm:w-[70%] w-[90%] mx-auto flex gap-2 md:mt-6 mt-6">
                        <input type="text" name="query" class="border border-gray-400 w-full p-2 rounded-md text-xl pl-2"
                            placeholder="Search Recette..." value="{{ request('query') }}" />
                        <button type="submit"
                            class="px-[10px] bg-blue-500 text-lg text-white rounded-md font-semibold">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="py-16 px-4 sm:px-6 lg:px-8 bg-gray-900 ">
        <div class="  max-w-6xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12 dark:bg-gray-900" x-show="visible"
                x-transition:enter="transition ease-out duration-800" x-transition:enter-start="opacity-0 translate-y-6"
                x-transition:enter-end="opacity-100 translate-y-0">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-200 mb-4">Delicious Recipes</h1>
                <p class="text-xl text-gray-500 max-w-2xl mx-auto">
                    Discover tasty recipes, cooking tips, and inspiration for your kitchen
                </p>
            </div>
    </section>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8"> <!-- Header -->
        <!-- Posts -->
        <div class="grid gap-8 mb-20 md:grid-cols-2 lg:grid-cols-3">
            @forelse ($posts as $index => $post)
                <div :class="{ 'opacity-100 translate-y-0': inView, 'opacity-0 translate-y-8': !inView }"
                    class="transition-all duration-1000 delay-{{ 200 + $index * 200 }}">
                    <div
                        class="group overflow-hidden flex flex-col h-full rounded-2xl bg-gray-50 dark:bg-gray-800 shadow-lg">
                        <div class="relative"> <img src="{{ asset('storage/' . $post->thumbnail) }}"
                                alt="{{ $post->title }}"
                                class="object-cover group-hover:scale-105 transition-transform w-full h-[256px]" />
                            <div
                                class="absolute inset-0 bg-black/60 flex items-center justify-center opacity-0 group-hover:opacity-100 transition">
                                <a href="{{ route('posts.show', $post) }}"
                                    class="px-4 py-2 rounded-lg bg-blue-600 text-white font-semibold"> Read More </a>
                            </div>
                        </div>
                        <div class="p-6 flex flex-col flex-grow">
                            <h3 class="mb-2 text-xl font-bold text-gray-900 dark:text-white"> {{ $post->title }} </h3>
                            <p class="text-gray-600 dark:text-gray-300 flex-grow"> {!! Str::limit(strip_tags($post->content), 150) !!} </p>
                        </div>
                    </div>
            </div> @empty <p class="text-gray-400 text-center col-span-3"> No posts yet. </p>
            @endforelse
        </div> <!-- Button -->
        <div class="text-center py-8">
            <a href="{{ route('posts.index') }}" class="px-8 py-4 rounded-lg bg-blue-600 text-white font-semibold">
                View All Posts </a>
        </div>
    </div>
@endsection
