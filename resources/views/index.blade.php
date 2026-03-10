<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <p class="block h-9 mt-2 w-auto">Blog</p>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] rounded-sm text-sm leading-normal">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 text-[#1b1b18] border border-transparent hover:border-[#19140035] rounded-sm text-sm leading-normal">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif



            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="size-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>



    </div>
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
                <form>
                    <div class="xl:w-1/2 lg:w-[60%] sm:w-[70%] w-[90%] mx-auto flex gap-2 md:mt-6 mt-6">
                        <input type="text" class="border border-gray-400 w-full p-2 rounded-md text-xl pl-2"
                            placeholder="" />
                        <button type="submit"
                            class="px-[10px] bg-blue-500 text-lg text-white rounded-md font-semibold">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="bg-white py-16 px-4 sm:px-6 lg:px-8" x-data="{
        visible: false,
        init() {
            setTimeout(() => this.visible = true, 100)
        }
    }">
        <div class="max-w-6xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12" x-show="visible" x-transition:enter="transition ease-out duration-800"
                x-transition:enter-start="opacity-0 translate-y-6" x-transition:enter-end="opacity-100 translate-y-0">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Delicious Recipes</h1>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Discover tasty recipes, cooking tips, and inspiration for your kitchen
                </p>
            </div>

            <!-- Featured Article -->
            <div x-show="visible" x-transition:enter="transition ease-out duration-800 delay-200"
                x-transition:enter-start="opacity-0 translate-y-6" x-transition:enter-end="opacity-100 translate-y-0"
                class="mb-12">
                <article
                    class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 h-full">
                        <div class="h-64 lg:h-full overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836"
                                alt="Delicious homemade pasta dish" class="w-full h-full object-cover">
                        </div>
                        <div class="p-8 flex flex-col justify-center">
                            <div class="mb-4">
                                <span
                                    class="text-blue-600 py-1 rounded-full text-sm font-semibold uppercase tracking-wide">Italian
                                    Cuisine</span>
                                <div class="text-gray-500 text-sm mt-2">March 15, 2024</div>
                            </div>
                            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 leading-tight">
                                Homemade Creamy Pasta: A Simple Italian Recipe
                            </h2>
                            <p class="text-gray-600 mb-6 leading-relaxed">
                                Learn how to prepare a rich and creamy pasta dish at home using simple ingredients.
                                This quick Italian recipe is perfect for dinner and packed with flavor.
                            </p>
                            <button
                                class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-3 rounded-lg transition-colors duration-200 w-fit">
                                Read Recipe
                            </button>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Article Grid -->
            <div x-show="visible" x-transition:enter="transition ease-out duration-800 delay-400"
                x-transition:enter-start="opacity-0 translate-y-6" x-transition:enter-end="opacity-100 translate-y-0"
                class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <!-- Article 1 -->
                <article
                    class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden group">
                    <div class="h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c" alt="Healthy salad bowl"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6 flex flex-col justify-between">
                        <div>
                            <div class="mb-3">
                                <span
                                    class="text-blue-600 py-1 rounded text-xs font-semibold uppercase tracking-wide">Healthy</span>
                                <div class="text-gray-500 text-sm mt-2">March 12, 2024</div>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-3 leading-tight">
                                Fresh Avocado Salad with Lemon Dressing
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                A refreshing salad made with avocado, cherry tomatoes, and a light lemon dressing.
                                Perfect for a healthy lunch or quick side dish.
                            </p>
                        </div>
                        <button class="text-blue-600 hover:text-blue-700 font-medium flex items-center group mt-4">
                            Read More
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                                </path>
                            </svg>
                        </button>
                    </div>
                </article>

                <!-- Article 2 -->
                <article
                    class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden group">
                    <div class="h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1600891964599-f61ba0e24092"
                            alt="Chocolate cake dessert"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6 flex flex-col justify-between">
                        <div>
                            <div class="mb-3">
                                <span
                                    class="text-blue-600 py-1 rounded text-xs font-semibold uppercase tracking-wide">Dessert</span>
                                <div class="text-gray-500 text-sm mt-2">March 10, 2024</div>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-3 leading-tight">
                                Moist Chocolate Cake for Beginners
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                This easy chocolate cake recipe is soft, rich, and perfect for beginners.
                                Bake a delicious dessert with simple ingredients in less than an hour.
                            </p>
                        </div>
                        <button class="text-blue-600 hover:text-blue-700 font-medium flex items-center group mt-4">
                            Read More
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </article>

                <!-- Article 3 -->
                <article
                    class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 overflow-hidden group">
                    <div class="h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1604908176997-431df1c7c24d"
                            alt="Grilled chicken dish"
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6 flex flex-col justify-between">
                        <div>
                            <div class="mb-3">
                                <span
                                    class="text-blue-600 py-1 rounded text-xs font-semibold uppercase tracking-wide">Dinner</span>
                                <div class="text-gray-500 text-sm mt-2">March 8, 2024</div>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-3 leading-tight">
                                Garlic Butter Grilled Chicken
                            </h3>
                            <p class="text-gray-600 text-sm leading-relaxed">
                                A flavorful grilled chicken recipe with garlic butter and herbs.
                                Perfect for a simple and delicious dinner.
                            </p>
                        </div>
                        <button class="text-blue-600 hover:text-blue-700 font-medium flex items-center group mt-4">
                            Read More
                            <svg class="w-4 h-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </div>
                </article>
            </div>
        </div>
    </section>

</body>

</html>
