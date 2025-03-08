<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Conversation;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    // Store a new comment
    public function store(Request $request, Conversation $conversation)
    {
        $request->validate([
            'comment' => 'required|string',
        ]);

        Comment::create([
            'comment' => $request->comment,
            'conversation_id' => $conversation->id,
            'user_id' => auth()->id(),
        ]);


        return redirect()->route('conversation.show', $conversation->id)
            ->with('success', 'Your comment was added successfully!');
    }
}
