<script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<div class="top-0 py-1 lg:py-2 w-full bg-transparent lg:relative z-50 dark:bg-gray-900" x-data="{ mobileOpen: false }">
    <nav
        class="z-10 sticky top-0 left-0 right-0 max-w-4xl xl:max-w-5xl mx-auto px-5 py-2.5 lg:border-none lg:py-4 flex items-center justify-between">

        <!-- Logo -->
        <div>
            <h2 class="text-black dark:text-white font-bold text-2xl">Blog</h2>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden lg:flex space-x-10 text-base font-bold text-black/60 dark:text-white">
            <a href="{{ route('home') }}" class="hover:underline">Home</a>
            <a href="{{ route('categories.index') }}" class="hover:underline">Categories</a>
            <a href="{{ route('posts.index') }}" class="hover:underline">Articles</a>
            <a href="#" class="hover:underline">Contact</a>
        </div>

        <!-- Auth Buttons (Desktop) -->
        <div class="hidden lg:flex gap-x-2">
            @guest
                <a href="{{ route('register') }}">
                    <button class="px-6 py-2.5 font-semibold text-black dark:text-white">Sign Up</button>
                </a>
                <a href="{{ route('login') }}">
                    <button
                        class="px-6 py-2.5 font-semibold bg-gray-500 text-white rounded-md hover:shadow-lg">Login</button>
                </a>
            @endguest

            @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-md bg-gray-500 text-white">
                            {{ Auth::user()->name }}
                            <svg class="ms-2 -me-0.5 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link href="{{ route('profile.show') }}">Profile</x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">Log
                                Out</x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            @endauth
        </div>

        <!-- Mobile Burger Button -->
        <div class="lg:hidden">
            <button @click="mobileOpen = !mobileOpen" class="focus:outline-none text-gray-300 dark:text-white">
                <svg x-show="!mobileOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="mobileOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div x-show="mobileOpen" @click.outside="mobileOpen = false" class="lg:hidden bg-white  shadow-lg">
        <a href="{{ route('home') }}" class=" hover:bg-gray-200 block px-4 py-2 border-b">Home</a>
        <a href="{{ route('categories.index') }}" class="hover:bg-gray-200  block px-4 py-2 border-b">Categories</a>
        <a href="{{ route('posts.index') }}" class=" hover:bg-gray-200 block px-4 py-2 border-b">Articles</a>
        <a href="#" class="hover:bg-gray-200 block px-4 py-2 border-b">Contact</a>

        @guest
            <a href="{{ route('register') }}" class="block px-4 py-2 border-b">Sign Up</a>
            <a href="{{ route('login') }}" class="block px-4 py-2 border-b">Login</a>
        @endguest

        @auth
            <x-dropdown-link href="{{ route('profile.show') }}" class="block px-4 py-2 border-b">Profile</x-dropdown-link>
            <form method="POST" action="{{ route('logout') }}" x-data>
                @csrf
                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();"
                    class="block px-4 py-2 border-b">Log Out</x-dropdown-link>
            </form>
        @endauth
    </div>
</div>
