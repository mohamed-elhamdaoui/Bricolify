@extends('layouts.app')

@section('content')
<div class="min-h-[calc(100vh-4rem)] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative z-10 text-center">
    <div class="absolute inset-0 z-0 flex items-center justify-center pointer-events-none">
        <div class="text-[300px] font-black text-slate-50 opacity-50 select-none">404</div>
    </div>
    
    <div class="relative z-10 space-y-6 max-w-sm">
        <div class="mx-auto w-20 h-20 bg-slate-100 rounded-full flex items-center justify-center shrink-0 border border-slate-200 shadow-sm text-slate-400 font-bold text-2xl">
            ?
        </div>
        <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">Page Not Found</h1>
        <p class="text-slate-500 font-light leading-relaxed">
            The page you are looking for doesn't exist or has been moved. Check the URL and try again.
        </p>
        <a href="/" class="group relative inline-flex justify-center py-3 px-6 border border-transparent text-sm font-bold rounded-2xl text-white bg-slate-900 hover:bg-slate-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-900 shadow-[0_4px_14px_0_rgb(0,0,0,0.1)] hover:shadow-[0_6px_20px_rgba(0,0,0,0.15)] hover:-translate-y-0.5 transition-all">
            Return Home
        </a>
    </div>
</div>
@endsection
