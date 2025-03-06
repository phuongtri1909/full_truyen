<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\CommentReaction;

class CommentReactionController extends Controller
{
    public function react(Request $request, $commentId)
    {
        if (!auth()->check()) {
            return response()->json([
                'status' => 'error',
                'redirect' => route('login')
            ], 401);
        }

        $request->validate([
            'type' => 'required|in:like,dislike'
        ]);

        $comment = Comment::findOrFail($commentId);
        $userId = auth()->id();

        $existing = CommentReaction::where('comment_id', $commentId)
            ->where('user_id', $userId)
            ->first();

        if ($existing) {
            if ($existing->type === $request->type) {
                $existing->delete();
                $message = 'Đã hủy phản ứng';
            } else {
                $existing->update(['type' => $request->type]);
                $message = 'Đã cập nhật phản ứng';
            }
        } else {
            CommentReaction::create([
                'comment_id' => $commentId,
                'user_id' => $userId,
                'type' => $request->type
            ]);
            $message = 'Đã thêm phản ứng';
        }

        return response()->json([
            'status' => 'success',
            'message' => $message,
            'likes' => $comment->likes()->count(),
            'dislikes' => $comment->dislikes()->count()
        ]);
    }
}
