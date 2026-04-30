@extends('layouts.dashboard')

@section('content')
<div class="max-w-7xl mx-auto space-y-10 p-2 sm:p-4">
    
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6">
        <div>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight">Need a fix, {{ auth()->user()->name ?? 'User' }}? <span class="inline-block origin-bottom-right hover:animate-wave cursor-default">👋</span></h2>
            <p class="text-slate-500 font-medium mt-2 text-base max-w-xl leading-relaxed">Manage your home projects and connect with verified professionals in Casablanca.</p>
        </div>
        <a href="{{ route('client.requests.create') }}" class="inline-flex items-center justify-center gap-2 bg-slate-900 text-white px-7 py-3.5 rounded-2xl font-bold shadow-[0_4px_14px_0_rgb(0,0,0,0.1)] hover:shadow-[0_6px_20px_rgba(0,0,0,0.15)] hover:-translate-y-1 transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            Post a New Request
        </a>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
        <div class="bg-white/70 backdrop-blur-xl border border-white/90 rounded-[2rem] shadow-sm p-6 flex flex-col justify-between h-40 relative overflow-hidden group hover:border-indigo-200 transition-colors">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-indigo-50/80 rounded-full group-hover:scale-[2] transition-transform duration-500 ease-out"></div>
            <div class="flex justify-between items-start relative z-10">
                <p class="text-xs font-extrabold text-slate-400 uppercase tracking-widest">Active Requests</p>
                <div class="w-10 h-10 rounded-xl bg-indigo-100/50 flex items-center justify-center text-indigo-500 shadow-sm border border-indigo-200/50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                </div>
            </div>
            <p class="text-4xl font-black text-slate-900 relative z-10">{{ $stats['activeRequests'] ?? 0 }}</p>
        </div>

        <div class="bg-white/70 backdrop-blur-xl border border-white/90 rounded-[2rem] shadow-sm p-6 flex flex-col justify-between h-40 relative overflow-hidden group hover:border-emerald-200 transition-colors">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-emerald-50/80 rounded-full group-hover:scale-[2] transition-transform duration-500 ease-out"></div>
            <div class="flex justify-between items-start relative z-10">
                <p class="text-xs font-extrabold text-slate-400 uppercase tracking-widest">Completed</p>
                <div class="w-10 h-10 rounded-xl bg-emerald-100/50 flex items-center justify-center text-emerald-500 shadow-sm border border-emerald-200/50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <p class="text-4xl font-black text-slate-900 relative z-10">{{ $stats['completedMissions'] ?? 0 }}</p>
        </div>

        <div class="bg-white/70 backdrop-blur-xl border border-white/90 rounded-[2rem] shadow-sm p-6 flex flex-col justify-between h-40 relative overflow-hidden group hover:border-violet-200 transition-colors">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-violet-50/80 rounded-full group-hover:scale-[2] transition-transform duration-500 ease-out"></div>
            <div class="flex justify-between items-start relative z-10">
                <p class="text-xs font-extrabold text-slate-400 uppercase tracking-widest">Total Requests</p>
                <div class="w-10 h-10 rounded-xl bg-violet-100/50 flex items-center justify-center text-violet-500 shadow-sm border border-violet-200/50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                </div>
            </div>
            <p class="text-4xl font-black text-slate-900 relative z-10">{{ ($stats['activeRequests'] ?? 0) + ($stats['completedMissions'] ?? 0) }}</p>
        </div>
        
    </div>


    <!-- Empty State / Recent Requests -->
    <div class="bg-white/60 backdrop-blur-xl border border-white/90 rounded-[2.5rem] shadow-sm p-12 flex flex-col items-center justify-center text-center">
        <div class="w-24 h-24 bg-white shadow-sm border border-slate-100 rounded-full flex items-center justify-center mb-6">
            <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z"></path></svg>
        </div>
        <h3 class="text-2xl font-black text-slate-900 mb-2">No active projects yet</h3>
        <p class="text-slate-500 max-w-md mx-auto mb-8 font-medium">Post your first request and start receiving quotes from the best pros in town.</p>
        <a href="{{ route('client.requests.create') }}" class="px-8 py-4 bg-slate-900 text-white font-bold rounded-2xl hover:bg-slate-800 transition-all shadow-lg hover:-translate-y-1">
            Create Your First Request
        </a>
    </div>

</div>

<style>
    @keyframes wave {
        0% { transform: rotate(0.0deg) }
        10% { transform: rotate(14.0deg) }
        20% { transform: rotate(-8.0deg) }
        30% { transform: rotate(14.0deg) }
        40% { transform: rotate(-4.0deg) }
        50% { transform: rotate(10.0deg) }
        60% { transform: rotate(0.0deg) }
        100% { transform: rotate(0.0deg) }
    }
    .hover\:animate-wave:hover {
        animation: wave 2.5s infinite;
    }
</style>
@endsection
