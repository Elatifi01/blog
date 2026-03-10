@extends('layouts.app')
@section('content')
    @if (session('success'))
        <div id="flash-message" class="fixed top-5 right-5 bg-green-600 text-white px-4 py-2 rounded-lg shadow-lg z-50">
            {{ session('success') }}
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const msg = document.getElementById('flash-message');
                if (msg) {
                    setTimeout(() => {
                        msg.style.transition = 'opacity 0.5s';
                        msg.style.opacity = '0';
                        setTimeout(() => msg.remove(), 500);
                    }, 3000);
                }
            });
        </script>
    @endif


    <div class="max-w-full mx-auto mt-10 px-4 sm:px-6 lg:px-8 dark:bg-gray-900 p-3 ">
        <div class="bg-white shadow-lg rounded-lg p-6 sm:p-8 md:p-10 max-w-3xl m-auto">

            <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Post</h2>

            <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Title -->
                <input type="text" name="title" value="{{ old('title', $post->title) }}" placeholder="Post title"
                    required
                    class="w-full p-3 border border-gray-300 rounded mb-5 focus:outline-none focus:ring-2 focus:ring-blue-500">

                <!-- Category -->
                <select name="category_id" required
                    class="w-full p-3 border border-gray-300 mt-3 rounded mb-5 focus:outline-none focus:ring-2 focus:ring-blue-500">

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>

                <!-- Current Thumbnail -->
                @if ($post->thumbnail)
                    <div class="mb-4">
                        <p class="font-medium text-gray-700 mb-2">Current Thumbnail</p>
                        <img src="{{ asset('storage/' . $post->thumbnail) }}" class="w-40 rounded shadow">
                    </div>
                @endif

                <!-- New Thumbnail -->
                <label class="block mb-2 font-medium text-gray-700 mt-3">Change Thumbnail</label>
                <input type="file" name="thumbnail" accept="image/*" class="w-full mb-5">

                <!-- Current Video -->
                @if ($post->video)
                    <div class="mb-4">
                        <p class="font-medium text-gray-700 mb-2">Current Video</p>
                        <video width="300" controls>
                            <source src="{{ asset('storage/' . $post->video) }}">
                        </video>
                    </div>
                @endif

                <!-- New Video -->
                <label class="block mb-2 font-medium text-gray-700 mt-3">Change Video</label>
                <input type="file" name="video" accept="video/*" class="w-full mb-5">

                <!-- Content -->
                <label class="block mb-2 font-medium text-gray-700 mt-3">Content</label>
                <textarea name="content" id="content-editor" class="w-full mb-5 p-3 border border-gray-300 rounded">{{ old('content', $post->content) }}</textarea>

                <button type="submit"
                    class="w-full px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded shadow">
                    Update Post
                </button>

            </form>

        </div>
    </div>


    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/38.1.0/classic/ckeditor.js"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#content-editor'), {
                ckfinder: {
                    uploadUrl: '{{ route('posts.upload-image') }}?_token={{ csrf_token() }}'
                }
            })
            .catch(error => console.error(error));
    </script>
@endsection
