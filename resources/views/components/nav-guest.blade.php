<div class="bg-white w-full mx-auto px-8 sm:px-6 lg:px-32" x-data="{ open: false }">
    <div class="flex justify-between h-16">
        <div class="flex">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('home') }}">
                    <p class="block h-9 mt-2 w-auto">Blog</p>
                </a>
            </div>

            <!-- Navigation Links (hidden on mobile) -->
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <div class="flex space-x-6 mt-5">
                    @if (auth()->check())
                        <a href="{{ route('categories.index') }}"
                            class="inline-block pb-1 border-b-2 border-transparent hover:border-blue-400 transition-colors">
                            Categories
                        </a>
                    @endif
                    <a href="{{ route('posts.index') }}"
                        class="inline-block pb-1 border-b-2 border-transparent hover:border-blue-400 transition-colors">
                        Articles
                    </a>
                </div>
            </div>
        </div>

        <!-- Desktop Auth Links (hidden on mobile) -->
        @if (Route::has('login'))
            <nav class="hidden sm:flex items-center justify-end gap-4">
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

        <!-- Hamburger (mobile only) -->
        <div class="-me-2 flex items-center sm:hidden">
            <button @click="open = !open"
                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu (visible when hamburger clicked) -->
    <div class="sm:hidden" x-show="open" @click.away="open = false">
        <div class="pt-2 pb-4 space-y-1">
            @if (auth()->check())
                <a href="{{ route('categories.index') }}"
                    class="block px-4 py-2 border-l-4 border-transparent hover:border-blue-400 transition-colors">
                    Categories
                </a>
            @endif
            <a href="{{ route('posts.index') }}"
                class="block px-4 py-2 border-l-4 border-transparent hover:border-blue-400 transition-colors">
                Posts
            </a>

            @if (auth()->check())
                <a href="{{ url('/dashboard') }}"
                    class="block px-4 py-2 border-l-4 border-transparent hover:border-blue-400 transition-colors">
                    Dashboard
                </a>
            @else
                <a href="{{ route('login') }}"
                    class="block px-4 py-2 border-l-4 border-transparent hover:border-blue-400 transition-colors">
                    Log in
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="block px-4 py-2 border-l-4 border-transparent hover:border-blue-400 transition-colors">
                        Register
                    </a>
                @endif
            @endauth
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
