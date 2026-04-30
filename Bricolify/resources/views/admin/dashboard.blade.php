@extends('layouts.dashboard')

@section('content')
<div class="p-2 lg:p-4">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">System Dashboard</h1>
        <p class="mt-2 text-sm text-slate-500 font-light">Overview of Bricolify platform metrics.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Stat Box 1 -->
        <div class="bg-white/70 backdrop-blur-sm rounded-2xl border border-white/90 p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
            <div class="w-12 h-12 bg-indigo-50/80 text-indigo-600 rounded-2xl flex items-center justify-center mb-4 border border-indigo-100/50 shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
            </div>
            <div class="text-3xl font-extrabold text-slate-900">{{ number_format($totalUsers) }}</div>
            <div class="text-xs font-bold text-slate-500 uppercase tracking-widest mt-1">Total Users</div>
        </div>

        <!-- Stat Box 2 -->
        <div class="bg-white/70 backdrop-blur-sm rounded-2xl border border-white/90 p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)]">
            <div class="w-12 h-12 bg-emerald-50/80 text-emerald-600 rounded-2xl flex items-center justify-center mb-4 border border-emerald-100/50 shadow-sm">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            </div>
            <div class="text-3xl font-extrabold text-slate-900">{{ number_format($activeMissions) }}</div>
            <div class="text-xs font-bold text-slate-500 uppercase tracking-widest mt-1">Active Missions</div>
        </div>

        <!-- Stat Box 3 -->
        <div class="bg-white/70 backdrop-blur-sm rounded-2xl border border-white/90 p-6 shadow-[0_8px_30px_rgb(0,0,0,0.04)] relative overflow-hidden group">
            <div class="absolute inset-0 bg-amber-50/50 translate-y-[100%] group-hover:translate-y-0 transition-transform duration-300"></div>
            <div class="relative z-10">
                <div class="w-12 h-12 bg-amber-50/80 text-amber-600 rounded-2xl flex items-center justify-center mb-4 border border-amber-100/50 shadow-sm">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                </div>
                <div class="text-3xl font-extrabold text-slate-900">{{ number_format($pendingApprovals) }}</div>
                <div class="text-xs font-bold text-slate-500 uppercase tracking-widest mt-1">Pending Approvals</div>
            </div>
        </div>

    </div>
</div>
@endsection
