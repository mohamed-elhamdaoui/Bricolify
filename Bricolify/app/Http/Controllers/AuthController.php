<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Exception;

class AuthController extends Controller
{
    public function register(RegisterUserRequest $request, UserService $userService): RedirectResponse
    {
        try {
            $user = $userService->registerUser($request->toDTO());

            Auth::login($user);

            return redirect()->route('home')->with('success', 'Registration successful!');
        } catch (Exception $e) {
            return back()->withInput()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
