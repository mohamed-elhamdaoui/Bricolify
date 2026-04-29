@extends('layouts.auth')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-12">
    <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.06)] border border-slate-200/50 p-8 md:p-12 w-full max-w-md">

        {{-- Logo --}}
        <div class="flex items-center justify-center gap-3 mb-8">
            <div class="bg-slate-900 text-white font-bold text-xl w-9 h-9 flex items-center justify-center rounded-lg shadow-sm">B</div>
            <span class="text-xl font-extrabold tracking-tight text-slate-900">Bricolify</span>
        </div>

        {{-- Title --}}
        <div class="text-center mb-8">
            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Welcome back</h1>
            <p class="text-sm text-slate-500 font-light mt-1">Sign in to manage your missions and requests.</p>
        </div>

        {{-- Flash Error --}}
        @if(session('error'))
            <div class="mb-6 flex items-start gap-3 bg-red-50 border border-red-100 text-red-600 rounded-xl px-4 py-3 text-sm font-medium">
                <svg class="w-4 h-4 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                {{ session('error') }}
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
            @csrf

            {{-- Email --}}
            <div>
                <label for="email" class="block text-sm font-semibold text-slate-700 mb-1.5">Email Address</label>
                <input id="email" name="email" type="email" required autocomplete="email"
                       value="{{ old('email') }}"
                       placeholder="you@example.com"
                       class="w-full px-4 py-3 rounded-xl border {{ $errors->has('email') ? 'border-red-400 bg-red-50' : 'border-slate-200' }} focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none text-sm text-slate-700 transition-all">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Password --}}
            <div>
                <label for="password" class="block text-sm font-semibold text-slate-700 mb-1.5">Password</label>
                <input id="password" name="password" type="password" required autocomplete="current-password"
                       placeholder="Your password"
                       class="w-full px-4 py-3 rounded-xl border {{ $errors->has('password') ? 'border-red-400 bg-red-50' : 'border-slate-200' }} focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none text-sm text-slate-700 transition-all">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Remember Me --}}
            <div class="flex items-center gap-2.5">
                <input id="remember" name="remember" type="checkbox"
                       class="w-4 h-4 text-indigo-600 border-slate-300 rounded focus:ring-indigo-500 cursor-pointer">
                <label for="remember" class="text-sm text-slate-600 font-medium cursor-pointer select-none">Remember me</label>
            </div>

            {{-- Submit --}}
            <button type="submit" class="w-full bg-slate-900 text-white py-3 rounded-xl font-semibold hover:bg-slate-800 hover:-translate-y-0.5 transition-all shadow-sm mt-2">
                Sign In
            </button>
        </form>

        {{-- Footer --}}
        <div class="mt-6 text-center">
            <p class="text-sm text-slate-500">
                Don't have an account?
                <a href="{{ route('register.view') }}" class="text-indigo-600 hover:text-indigo-700 font-medium">Create one</a>
            </p>
        </div>

    </div>
</div>
@endsection