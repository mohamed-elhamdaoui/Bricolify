@extends('layouts.dashboard')

@section('content')
<div class="max-w-7xl mx-auto space-y-8 p-2 sm:p-4">

    {{-- Profile Pending/Suspended Banner --}}
    @if(($stats['profileStatus'] ?? 'pending') === 'pending')
        <div class="flex items-start gap-4 bg-amber-50 border border-amber-200 rounded-2xl px-6 py-4">
            <div class="w-8 h-8 bg-amber-100 text-amber-600 rounded-full flex items-center justify-center shrink-0 mt-0.5">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
            </div>
            <div>
                <p class="font-extrabold text-amber-800 text-sm">Profile under review</p>
                <p class="text-amber-700 text-sm font-light mt-0.5">Our team is reviewing your profile. You'll be notified once it's approved — usually within 24h.</p>
            </div>
        </div>
    @elseif(($stats['profileStatus'] ?? '') === 'suspended')
        <div class="flex items-start gap-4 bg-red-50 border border-red-200 rounded-2xl px-6 py-4">
            <div class="w-8 h-8 bg-red-100 text-red-600 rounded-full flex items-center justify-center shrink-0 mt-0.5">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
            </div>
            <div>
                <p class="font-extrabold text-red-800 text-sm">Account suspended</p>
                <p class="text-red-700 text-sm font-light mt-0.5">Your account has been suspended. Please contact support for more information.</p>
            </div>
        </div>
    @endif

    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6">
        <div>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight">
                Ready to work, {{ auth()->user()->name }}?
                <span class="inline-block origin-bottom-right hover:animate-wave cursor-default">👋</span>
            </h2>
            <p class="text-slate-500 font-medium mt-2 text-base max-w-xl leading-relaxed">
                Here's your activity overview. Browse open jobs and grow your reputation.
            </p>
        </div>
        @if(auth()->user()->isApprovedWorker())
            <a href="{{ route('worker.requests.index') }}"
               class="inline-flex items-center justify-center gap-2 bg-indigo-600 text-white px-7 py-3 rounded-2xl font-bold shadow-[0_4px_14px_0_rgb(79,70,229,0.39)] hover:shadow-[0_6px_20px_rgba(79,70,229,0.23)] hover:-translate-y-1 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                Browse Jobs
            </a>
        @else
            <button disabled
               class="inline-flex items-center justify-center gap-2 bg-slate-200 text-slate-500 px-7 py-3 rounded-2xl font-bold cursor-not-allowed">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                Approval Required
            </button>
        @endif
    </div>

    {{-- Stats Grid — 3 real stats --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

        {{-- Rating --}}
        <div class="bg-white/70 backdrop-blur-xl border border-white/90 rounded-[2rem] shadow-sm p-6 flex flex-col justify-between h-40 relative overflow-hidden group hover:border-amber-200 transition-colors">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-amber-50/80 rounded-full group-hover:scale-[2] transition-transform duration-500 ease-out"></div>
            <div class="flex justify-between items-start relative z-10">
                <p class="text-xs font-extrabold text-slate-400 uppercase tracking-widest">Your Rating</p>
                <div class="w-10 h-10 rounded-xl bg-amber-100/50 flex items-center justify-center text-amber-500 shadow-sm border border-amber-200/50">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                </div>
            </div>
            <div class="relative z-10">
                @if($stats['rating'] > 0)
                    <p class="text-4xl font-black text-slate-900 flex items-baseline gap-1">
                        {{ number_format($stats['rating'], 1) }}
                        <span class="text-sm font-semibold text-slate-400">/ 5.0</span>
                    </p>
                @else
                    <p class="text-sm font-medium text-slate-400">No reviews yet</p>
                @endif
            </div>
        </div>

        {{-- Jobs Done --}}
        <div class="bg-white/70 backdrop-blur-xl border border-white/90 rounded-[2rem] shadow-sm p-6 flex flex-col justify-between h-40 relative overflow-hidden group hover:border-emerald-200 transition-colors">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-emerald-50/80 rounded-full group-hover:scale-[2] transition-transform duration-500 ease-out"></div>
            <div class="flex justify-between items-start relative z-10">
                <p class="text-xs font-extrabold text-slate-400 uppercase tracking-widest">Jobs Done</p>
                <div class="w-10 h-10 rounded-xl bg-emerald-100/50 flex items-center justify-center text-emerald-500 shadow-sm border border-emerald-200/50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <p class="text-4xl font-black text-slate-900 relative z-10">{{ $stats['jobsDone'] ?? 0 }}</p>
        </div>

        {{-- Pending Applications --}}
        <div class="bg-white/70 backdrop-blur-xl border border-white/90 rounded-[2rem] shadow-sm p-6 flex flex-col justify-between h-40 relative overflow-hidden group hover:border-indigo-200 transition-colors">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-indigo-50/80 rounded-full group-hover:scale-[2] transition-transform duration-500 ease-out"></div>
            <div class="flex justify-between items-start relative z-10">
                <p class="text-xs font-extrabold text-slate-400 uppercase tracking-widest">Pending Apps</p>
                <div class="w-10 h-10 rounded-xl bg-indigo-100/50 flex items-center justify-center text-indigo-500 shadow-sm border border-indigo-200/50">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
            </div>
            <p class="text-4xl font-black text-slate-900 relative z-10">{{ $stats['pendingApps'] ?? 0 }}</p>
        </div>

    </div>

    {{-- Quick Actions --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        @if(auth()->user()->isApprovedWorker())
            <a href="{{ route('worker.requests.index') }}"
               class="bg-white border border-slate-200/60 rounded-2xl p-5 flex items-center gap-4 hover:border-indigo-200 hover:shadow-sm transition-all group">
                <div class="w-11 h-11 bg-indigo-50 text-indigo-600 rounded-xl flex items-center justify-center group-hover:bg-indigo-600 group-hover:text-white transition-all shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                    <p class="font-extrabold text-slate-900 text-sm">Browse Jobs</p>
                    <p class="text-xs text-slate-400 font-light">Find matching requests</p>
                </div>
            </a>
        @else
            <div class="bg-slate-50 border border-slate-100 rounded-2xl p-5 flex items-center gap-4 opacity-60 grayscale cursor-not-allowed">
                <div class="w-11 h-11 bg-slate-200 text-slate-400 rounded-xl flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <div>
                    <p class="font-extrabold text-slate-900 text-sm">Browse Jobs</p>
                    <p class="text-xs text-slate-400 font-light italic">Unlock after approval</p>
                </div>
            </div>
        @endif

        @if(auth()->user()->isApprovedWorker())
            <a href="{{ route('worker.applications.index') }}"
               class="bg-white border border-slate-200/60 rounded-2xl p-5 flex items-center gap-4 hover:border-emerald-200 hover:shadow-sm transition-all group">
                <div class="w-11 h-11 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center group-hover:bg-emerald-600 group-hover:text-white transition-all shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path></svg>
                </div>
                <div>
                    <p class="font-extrabold text-slate-900 text-sm">My Applications</p>
                    <p class="text-xs text-slate-400 font-light">{{ $stats['pendingApps'] ?? 0 }} pending</p>
                </div>
            </a>
        @else
            <div class="bg-slate-50 border border-slate-100 rounded-2xl p-5 flex items-center gap-4 opacity-60 grayscale cursor-not-allowed">
                <div class="w-11 h-11 bg-slate-200 text-slate-400 rounded-xl flex items-center justify-center shrink-0">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                </div>
                <div>
                    <p class="font-extrabold text-slate-900 text-sm">My Applications</p>
                    <p class="text-xs text-slate-400 font-light italic">Unlock after approval</p>
                </div>
            </div>
        @endif

        <a href="{{ route('worker.profile.edit') }}"
           class="bg-white border border-slate-200/60 rounded-2xl p-5 flex items-center gap-4 hover:border-violet-200 hover:shadow-sm transition-all group">
            <div class="w-11 h-11 bg-violet-50 text-violet-600 rounded-xl flex items-center justify-center group-hover:bg-violet-600 group-hover:text-white transition-all shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
            </div>
            <div>
                <p class="font-extrabold text-slate-900 text-sm">Edit Profile</p>
                <p class="text-xs text-slate-400 font-light">Update your info</p>
            </div>
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
        transform-origin: 70% 70%;
    }
</style>
@endsection
