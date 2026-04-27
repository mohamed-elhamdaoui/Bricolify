@extends('layouts.auth')

@section('content')
<div class="min-h-[calc(100vh-4rem)] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-[2.5rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-200/60 relative">
        <div class="absolute -bottom-10 -left-10 w-32 h-32 bg-emerald-500/10 rounded-full blur-2xl z-0 pointer-events-none"></div>

        <div class="relative z-10 text-center">
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Create Account</h2>
            <p class="mt-2 text-sm text-slate-500 font-light">
                Join Bricolify today
            </p>
        </div>
        
        <form class="mt-8 space-y-6 relative z-10" action="{{ route('register') }}" method="POST">
            @csrf
            
            <div class="space-y-4">
                <div>
                    <label for="name" class="sr-only">Full Name</label>
                    <input id="name" name="name" type="text" required class="appearance-none relative block w-full px-4 py-3 border border-slate-200 placeholder-slate-400 text-slate-900 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:z-10 sm:text-sm transition-all" placeholder="Full Name">
                </div>
                <div>
                    <label for="email" class="sr-only">Email address</label>
                    <input id="email" name="email" type="email" required class="appearance-none relative block w-full px-4 py-3 border border-slate-200 placeholder-slate-400 text-slate-900 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:z-10 sm:text-sm transition-all" placeholder="Email address">
                </div>
                <div>
                    <label for="role" class="sr-only">I am a</label>
                    <select id="role" name="role" class="appearance-none relative block w-full px-4 py-3 border border-slate-200 text-slate-700 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:z-10 sm:text-sm transition-all bg-white">
                        <option value="client">I'm looking for services (Client)</option>
                        <option value="worker">I want to offer my services (Worker)</option>
                    </select>
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" required class="appearance-none relative block w-full px-4 py-3 border border-slate-200 placeholder-slate-400 text-slate-900 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:z-10 sm:text-sm transition-all" placeholder="Password">
                </div>
                <div>
                    <label for="password_confirmation" class="sr-only">Confirm Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required class="appearance-none relative block w-full px-4 py-3 border border-slate-200 placeholder-slate-400 text-slate-900 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:z-10 sm:text-sm transition-all" placeholder="Confirm Password">
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-2xl text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 shadow-[0_4px_14px_0_rgb(79,70,229,0.39)] hover:shadow-[0_6px_20px_rgba(79,70,229,0.23)] hover:-translate-y-0.5 transition-all">
                    Register
                </button>
            </div>
            
            <div class="text-center mt-4">
                <p class="text-sm text-slate-500">
                    Already have an account? 
                    <a href="/login" class="font-bold text-slate-900 hover:text-slate-700">Sign in</a>
                </p>
            </div>
        </form>
    </div>
</div>
@endsection
