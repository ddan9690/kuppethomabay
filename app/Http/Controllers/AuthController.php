<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // Show login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials, $request->filled('remember'))) {
            // Authentication failed
            throw ValidationException::withMessages([
                'email' => ['Invalid email or password.'],
            ]);
        }

        // Regenerate session to prevent fixation
        $request->session()->regenerate();

        // Redirect to single dashboard
        return redirect()->route('dashboard');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }

    // Show password reset form
    public function showResetForm()
    {
        return view('auth.reset');
    }

    // Reset password

    public function changePassword(Request $request)
    {
        // Validate password and confirmation
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Get the currently authenticated user
        $user = Auth::user();

        // Update password
        $user->password = Hash::make($request->password);
        $user->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Password changed successfully.');
    }
}
