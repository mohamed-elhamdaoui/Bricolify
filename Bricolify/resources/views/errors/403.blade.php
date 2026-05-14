@extends('layouts.app')

@section('content')
<div class="min-h-[calc(100vh-4rem)] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative z-10 text-center">
    <div class="absolute inset-0 z-0 flex items-center justify-center pointer-events-none">
        <div class="text-[300px] font-black text-slate-50 opacity-50 select-none">403</div>
    </div>
    
    <div class="relative z-10 space-y-6 max-w-sm">
        <div class="mx-auto w-20 h-20 bg-rose-50 rounded-full flex items-center justify-center shrink-0 border border-rose-100 shadow-sm">
            <svg class="w-10 h-10 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
        </div>
        <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">Access Denied</h1>
        <p class="text-slate-500 font-light leading-relaxed">
            You don't have permission to access this page. Please make sure you are logged in with the correct account privileges.
        </p>
        <a href="/" class="group relative inline-flex justify-center py-3 px-6 border border-transparent text-sm font-bold rounded-2xl text-white bg-slate-900 hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-900 shadow-[0_4px_14px_0_rgb(0,0,0,0.1)] hover:shadow-[0_6px_20px_rgba(0,0,0,0.15)] hover:-translate-y-0.5 transition-all">
            Return Home
        </a>
    </div>
</div>
@endsection
