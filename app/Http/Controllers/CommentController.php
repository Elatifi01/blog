<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // List all comments for a post
    public function index($postId)
    {
        $comments = Comments::with('user')
            ->where('post_id', $postId)
            ->orderBy('created_at', 'ASC')
            ->get();

        return response()->json($comments);
    }

    // Add a new comment to a post
    public function store(Request $request, Post $post)
    {
        $request->validate(['message' => 'required']);

        $post->comments()->create([
            'user_id' => Auth::id(),
            'message' => $request->message,
        ]);

        return back()->with('success', 'Comment posted!');
    }

    // Update a comment (author or admin only)
    public function update(Request $request, $id)
    {
        $comment = Comments::findOrFail($id);

        if (Auth::id() !== $comment->user_id && Auth::user()->role !== 'admin') {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        $comment->update(['message' => $request->message]);
        return response()->json($comment);
    }

    // Delete a comment (author or admin only)
    public function destroy($id)
    {
        $comment = Comments::findOrFail($id);

        if (Auth::id() !== $comment->user_id && Auth::user()->role !== 'admin') {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        $comment->delete();
        return redirect()->back()->with('success', 'comment deleted successfully');
    }
}
