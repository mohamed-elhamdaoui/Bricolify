@extends('layouts.dashboard')

@section('content')
<div class="p-2 lg:p-4">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Client Dashboard</h1>
        <p class="mt-2 text-sm text-slate-500 font-light">Welcome back, {{ auth()->user()->name }}. Here is an overview of your activity.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white/70 backdrop-blur-sm rounded-2xl border border-white/90 p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
            <div class="w-12 h-12 bg-indigo-50/80 text-indigo-600 rounded-2xl flex items-center justify-center mb-4 border border-indigo-100/50 shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
            </div>
            <div class="text-3xl font-extrabold text-slate-900">0</div>
            <div class="text-xs font-bold text-slate-500 uppercase tracking-widest mt-1">Active Requests</div>
        </div>

        <div class="bg-white/70 backdrop-blur-sm rounded-2xl border border-white/90 p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
            <div class="w-12 h-12 bg-emerald-50/80 text-emerald-600 rounded-2xl flex items-center justify-center mb-4 border border-emerald-100/50 shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </div>
            <div class="text-3xl font-extrabold text-slate-900">0</div>
            <div class="text-xs font-bold text-slate-500 uppercase tracking-widest mt-1">Completed Missions</div>
        </div>
    </div>
</div>
@endsection
