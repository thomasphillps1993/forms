<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Feedback; // Make sure this is here




class FeedbackController extends Controller
{
   

    // Show the form to submit feedback
    public function create()
    {
        return view('feedback.create');
    }

    // Store the feedback submission
    public function store(Request $request)
    {

      
 

   $feedback = Feedback::create([
        'user_id' => auth()->id(), // Assuming the user is authenticated
        'name' => $request->name,// 'name' comes from the form input
        'email' => $request->email,
                'message' => $request->feedback, // Feedback message
    ]);


        return redirect()->route('feedback.index')->with('success', 'Feedback submitted successfully');
    }

    // Show the list of user submissions
    public function index()
    {
    $feedbacks = Feedback::where('user_id', auth()->id())->get();
        return view('feedback.index', compact('feedbacks'));
    }
}
