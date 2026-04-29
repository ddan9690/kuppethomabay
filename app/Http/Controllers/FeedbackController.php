<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string'],
        ], [
            'name.required' => 'Please enter your name.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Enter a valid email address.',
            'message.required' => 'Please write a message.',
        ]);

        Feedback::create($validated);

        return response()->json([
            'message' => 'Thank you for your feedback!'
        ]);
    }

    public function index()
    {
        $feedbacks = Feedback::latest()->paginate(3);

        return view('pages.backend.feedback.index', compact('feedbacks'));
    }

    public function show($id)
    {
        $feedback = Feedback::findOrFail($id);

        return view('pages.backend.feedback.show', compact('feedback'));
    }
}
