<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\RegisterUserRequest;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function register(RegisterUserRequest $request, UserService $userService)
    {
        $validated = $request->validated();

        $user = $userService->registerUser(
            $validated['name'],
            $validated['email'],
            $validated['password'],
            $validated['role'],
            $validated['phone'] ?? null
        );

        Auth::login($user);

        return redirect()->route('onboarding')->with('success', 'Welcome to Bricolify! Choose how you want to use the platform.');
    }
}
