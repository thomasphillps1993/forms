<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use Illuminate\Http\Request;
use App\Models\Comment;


class ConversationController extends Controller
{
    // Show all conversations
    public function index()
    {
        // Get all conversations from the database
        $conversations = Conversation::all();

        // Return the index view with the list of conversations
        return view('conversations.index', compact('conversations'));
    }

    // Show the form for creating a new conversation
    public function create()
    {
        // Return the view with the conversation creation form
        return view('conversations.create');
    }

    // Store a new conversation in the database
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Create and save the new conversation
        Conversation::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        // Redirect back to the conversations index page with a success message
        return redirect()->route('conversation.index')->with('success', 'Conversation created successfully!');
    }

    // Show a specific conversation
 public function show(Conversation $conversation)
{
    // Fetch the conversation along with its comments
    $comments = Comment::where('conversation_id', $conversation->id)->get();
    
    return view('conversations.show', compact('conversation', 'comments'));
}
}
