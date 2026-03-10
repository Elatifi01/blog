@extends('layouts.appall')

@section('content')
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

    <div class="py-12">
        <div class="max-w-7xl h-full  mx-auto sm:px-6 lg:px-8">

            <!-- Header with title and button -->
            <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center mb-6 gap-4">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Categories List</h1>
                @if (Auth()->check() && auth()->user()->user_type === 'admin')
                    <a href="{{ route('categories.create') }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-800  hover:bg-blue-600  text-white text-sm font-medium rounded-md  focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                        Create Category
                    </a>
                @endif
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden border-b border-gray-200 dark:border-gray-700 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <!-- Table Header -->
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left rtl:text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left rtl:text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                            Slug
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left rtl:text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider hidden sm:table-cell">
                                            Created At
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left rtl:text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider hidden sm:table-cell">
                                            Updated At
                                        </th>
                                        @if (Auth()->check() && auth()->user()->user_type === 'admin')
                                            <th scope="col"
                                                class="px-6 py-3 text-left rtl:text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                                Actions
                                            </th>
                                        @endif
                                    </tr>
                                </thead>

                                <!-- Table Body -->
                                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($categories as $category)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-900">
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-white">
                                                {{ $category->name }}
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                                {{ $category->slug }}
                                            </td>

                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 hidden sm:table-cell">
                                                {{ $category->created_at->diffForHumans() }}
                                            </td>

                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400 hidden sm:table-cell">
                                                {{ $category->updated_at->diffForHumans() }}
                                            </td>
                                            @if (Auth()->check() && auth()->user()->user_type === 'admin')
                                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                    <div class="flex flex-col sm:flex-row sm:space-x-2 rtl:space-x-reverse">
                                                        <form action="{{ route('categories.edit', $category->id) }}"
                                                            method="GET">
                                                            <button
                                                                class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300 transition-colors">
                                                                Edit
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('categories.destroy', $category->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" onclick="return confirm('Are you sure?')"
                                                                class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300 transition-colors mt-2 sm:mt-0">
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
