<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->with(['user', 'category'])->paginate(10);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::all();

        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'thumbnail' => 'required|image|max:2048',
            'video' => 'nullable|mimetypes:video/mp4,video/avi,video/mkv|max:10240',
            'content' => 'required',
        ]);
        $data['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        $data['video'] = $request->file('video') ? $request->file('video')->store('videos', 'public') : null;
        $data['user_id'] = Auth::id(); // or auth()->user()->id
        Post::create($data);


        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $post->increment('views');
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
    public function uploadImage(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|max:2048'
        ]);

        // store image in storage/app/public/wysiwyg
        $path = $request->file('upload')->store('wysiwyg', 'public');

        // return URL for CKEditor
        return response()->json([
            'url' => asset('storage/' . $path)
        ]);
    }
}
