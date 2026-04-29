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
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
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

        <div class="bg-white/70 backdrop-blur-xl border border-white/90 rounded-[2rem] shadow-sm p-6 flex flex-col justify-between h-40 relative overflow-hidden group hover:border-amber-200 transition-colors">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-amber-50/80 rounded-full group-hover:scale-[2] transition-transform duration-500 ease-out"></div>
            <div class="flex justify-between items-start relative z-10">
                <p class="text-xs font-extrabold text-slate-400 uppercase tracking-widest">Avg. Quotes</p>
                <div class="w-10 h-10 rounded-xl bg-amber-100/50 flex items-center justify-center text-amber-500 shadow-sm border border-amber-200/50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                </div>
            </div>
            <p class="text-4xl font-black text-slate-900 relative z-10">4.2</p>
        </div>
        
        <div class="bg-gradient-to-br from-indigo-600 to-violet-700 rounded-[2rem] shadow-[0_8px_30px_rgb(79,70,229,0.2)] p-6 flex flex-col justify-between h-40 relative overflow-hidden group">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-white/20 via-transparent to-transparent opacity-80 group-hover:opacity-100 transition-opacity"></div>
            <div class="relative z-10">
                <h3 class="text-white font-extrabold text-sm tracking-wide">Premium Savings</h3>
                <p class="text-indigo-100 text-[10px] uppercase tracking-wider font-bold mt-1">Platform Discount</p>
            </div>
            <div class="relative z-10">
                <div class="flex justify-between items-end mb-2.5">
                    <span class="text-white font-black text-2xl leading-none shadow-sm">-15%</span>
                </div>
                <div class="w-full bg-white/20 rounded-full h-2.5 overflow-hidden shadow-inner backdrop-blur-sm border border-white/10">
                    <div class="bg-white h-2.5 rounded-full w-[75%] shadow-[0_0_10px_rgba(255,255,255,0.5)]"></div>
                </div>
            </div>
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
