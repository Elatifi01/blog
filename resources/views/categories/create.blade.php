@extends('layouts.app')
@section('content')

    @if (auth()->check() && auth()->user()->user_type === 'admin')

        @if (session('success'))
            <div id="success-message"
                style="position:fixed; top:20px; right:20px; background:#16a34a; color:white; padding:10px 16px; border-radius:6px; font-weight:500;">
                {{ session('success') }}
            </div>

            <script>
                setTimeout(() => {
                    const msg = document.getElementById('success-message');
                    if (msg) msg.style.display = 'none';
                }, 1000);
            </script>
        @endif

        <div class="flex flex-1 flex-col  justify-center space-y-5 max-w-md mx-auto mt-24 pb-5">
            <div class="flex flex-col space-y-2 text-center">
                <h2 class="text-3xl md:text-4xl font-bold dark:text-white">Category</h2>
                <p class="text-md md:text-xl dark:text-gray-300">
                    Enter the Category name
                </p>
            </div>

            <form action="{{ route('categories.store') }}" method="post">
                @csrf

                <div class="flex flex-col max-w-md space-y-5">

                    <input type="text" name="name" placeholder="Ex: italien pasta"
                        class="flex px-3 py-2 md:px-4 md:py-3 border-2 border-black rounded-lg font-medium placeholder:font-normal" />

                    @if ($errors->any())
                        <ul style="background:#fee2e2;color:#b91c1c;padding:10px;border-radius:6px;font-size:14px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <button
                        class="flex items-center justify-center flex-none px-3 py-2 md:px-4 md:py-3 rounded-lg font-medium  bg-blue-800  hover:bg-blue-600 text-white"
                        type="submit">
                        Add category
                    </button>

                </div>
            </form>
        </div>
    @endif
@endsection
