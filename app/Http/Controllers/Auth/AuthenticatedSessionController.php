<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        // Always return the login view
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        // Attempt to authenticate as admin (users table)
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return $this->redirectUser(Auth::guard('web')->user());
        }

        // Attempt to authenticate as student (students table)
        if (Auth::guard('student')->attempt($credentials)) {
            $request->session()->regenerate();
            return $this->redirectUser(Auth::guard('student')->user());
        }

        // Check if the email exists in the students table
        $student = \App\Models\Student::where('email', $credentials['email'])->first();
        if ($student) {
            return back()->withErrors([
                'email' => 'Student account found but password is incorrect. Default password is: 12345678',
            ]);
        }

        // If authentication fails
        return back()->withErrors([
            'email' => 'No account found with these credentials. Please check your email or register first.',
        ]);
    }

    /**
     * Redirect the user based on their role.
     */
    private function redirectUser($user): RedirectResponse
    {
        if ($user instanceof \App\Models\User) {
            return redirect()->route('dashboard'); // Admin dashboard
        } elseif ($user instanceof \App\Models\Student) {
            return redirect()->route('studentdashboard'); // Student dashboard
        }

        return redirect('/'); // Fallback
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        if (Auth::guard('student')->check()) {
            Auth::guard('student')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}