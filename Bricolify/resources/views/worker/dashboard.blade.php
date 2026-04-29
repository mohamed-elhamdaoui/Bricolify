@extends('layouts.dashboard')

@section('content')
<div class="max-w-7xl mx-auto space-y-10 p-2 sm:p-4">
    
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6">
        <div>
            <h2 class="text-3xl font-black text-slate-900 tracking-tight">Ready to work, {{ auth()->user()->name ?? 'Ahmed' }}? <span class="inline-block origin-bottom-right hover:animate-wave cursor-default">👋</span></h2>
            <p class="text-slate-500 font-medium mt-2 text-base max-w-xl leading-relaxed">Here's what's happening with your missions today. You have <span class="text-indigo-600 font-bold">2 new opportunities</span> matching your skills.</p>
        </div>
        <a href="{{ route('worker.requests.index') }}" class="inline-flex items-center justify-center gap-2 bg-indigo-600 text-white px-7 py-3 rounded-2xl font-bold shadow-[0_4px_14px_0_rgb(79,70,229,0.39)] hover:shadow-[0_6px_20px_rgba(79,70,229,0.23)] hover:-translate-y-1 transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
            Browse Marketplace
        </a>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white/70 backdrop-blur-xl border border-white/90 rounded-[2rem] shadow-sm p-6 flex flex-col justify-between h-40 relative overflow-hidden group hover:border-amber-200 transition-colors">
            <div class="absolute -right-6 -top-6 w-24 h-24 bg-amber-50/80 rounded-full group-hover:scale-[2] transition-transform duration-500 ease-out"></div>
            <div class="flex justify-between items-start relative z-10">
                <p class="text-xs font-extrabold text-slate-400 uppercase tracking-widest">Your Rating</p>
                <div class="w-10 h-10 rounded-xl bg-amber-100/50 flex items-center justify-center text-amber-500 shadow-sm border border-amber-200/50">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                </div>
            </div>
            <div class="relative z-10">
                <p class="text-4xl font-black text-slate-900 flex items-baseline gap-1">4.9 <span class="text-sm font-semibold text-slate-400">/ 5.0</span></p>
            </div>
        </div>

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
        
        <div class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-[2rem] shadow-[0_8px_30px_rgb(0,0,0,0.15)] p-6 flex flex-col justify-between h-40 relative overflow-hidden group">
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-emerald-500/20 via-transparent to-transparent opacity-80 group-hover:opacity-100 transition-opacity"></div>
            <div class="relative z-10">
                <h3 class="text-white font-extrabold text-sm tracking-wide">Profile Strength</h3>
                <p class="text-slate-400 text-[10px] uppercase tracking-wider font-bold mt-1">Excellent Status</p>
            </div>
            <div class="relative z-10">
                <div class="flex justify-between items-end mb-2.5">
                    <span class="text-emerald-400 font-black text-2xl leading-none shadow-sm">90%</span>
                </div>
                <div class="w-full bg-slate-800/80 rounded-full h-2.5 overflow-hidden shadow-inner border border-slate-700/50">
                    <div class="bg-gradient-to-r from-emerald-500 to-emerald-400 h-2.5 rounded-full w-[90%] shadow-[0_0_10px_rgba(52,211,153,0.5)]"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="bg-white/60 backdrop-blur-xl border border-white/90 rounded-[2.5rem] shadow-sm overflow-hidden flex flex-col">
        <!-- Section Header -->
        <div class="flex items-center px-4 pt-4 border-b border-slate-200/60 bg-white/40 overflow-x-auto scrollbar-hide">
            <button class="px-6 py-4 text-sm font-extrabold text-indigo-600 border-b-2 border-indigo-600 whitespace-nowrap transition-colors">
                Available Jobs <span class="ml-1.5 bg-indigo-100 text-indigo-700 py-0.5 px-2 rounded-full text-[10px] font-black">2 New</span>
            </button>
            <button class="px-6 py-4 text-sm font-bold text-slate-500 hover:text-slate-800 hover:bg-slate-50/80 rounded-t-2xl whitespace-nowrap transition-colors">
                My Applications
            </button>
            <button class="px-6 py-4 text-sm font-bold text-slate-500 hover:text-slate-800 hover:bg-slate-50/80 rounded-t-2xl whitespace-nowrap transition-colors">
                Active Missions
            </button>
        </div>
        
        <!-- Section Body -->
        <div class="p-6 lg:p-8 space-y-6 bg-slate-50/30">
            
            <!-- Job Card 1 -->
            <div class="bg-white rounded-3xl border border-slate-200/60 p-6 sm:p-8 shadow-sm hover:shadow-[0_8px_30px_rgb(0,0,0,0.06)] hover:-translate-y-1 hover:border-indigo-100/80 transition-all duration-300 group flex flex-col md:flex-row gap-8 items-start md:items-center">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-sky-50 border border-sky-100 text-sky-700 text-[10px] font-black uppercase tracking-widest">
                            Plumbing
                        </span>
                        <span class="text-xs text-slate-400 font-bold flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Posted 10 mins ago
                        </span>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-2.5 group-hover:text-indigo-600 transition-colors">Fix leaking sink pipe in kitchen</h3>
                    <p class="text-sm text-slate-500 font-medium line-clamp-2 mb-6 leading-relaxed">
                        The U-bend under the kitchen sink is leaking heavily. Needs urgent replacement or fixing to stop the water from damaging the cabinets.
                    </p>
                    <div class="flex flex-wrap items-center gap-4 text-xs font-bold text-slate-600">
                        <div class="flex items-center gap-2 bg-slate-50 px-3.5 py-2 rounded-xl border border-slate-100">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Maarif, Casablanca
                        </div>
                        <div class="flex items-center gap-2 bg-slate-50 px-3.5 py-2 rounded-xl border border-slate-100">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            As soon as possible
                        </div>
                        <div class="flex items-center gap-2.5 pl-2">
                            <div class="w-7 h-7 rounded-full bg-indigo-100 border border-indigo-200 flex items-center justify-center text-[11px] font-black text-indigo-700 shadow-sm">Y</div>
                            <span class="text-slate-500 font-semibold">Youssef T.</span>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-auto flex flex-col sm:flex-row md:flex-col gap-3">
                    <button class="w-full sm:w-auto px-7 py-3.5 bg-indigo-600 text-white text-sm font-black rounded-xl hover:bg-indigo-700 hover:shadow-lg hover:shadow-indigo-500/25 transition-all text-center">
                        Apply Now
                    </button>
                    <button class="w-full sm:w-auto px-7 py-3.5 bg-white text-slate-700 border border-slate-200 shadow-sm text-sm font-bold rounded-xl hover:bg-slate-50 hover:border-slate-300 transition-all text-center">
                        View Details
                    </button>
                </div>
            </div>

            <!-- Job Card 2 -->
            <div class="bg-white rounded-3xl border border-slate-200/60 p-6 sm:p-8 shadow-sm hover:shadow-[0_8px_30px_rgb(0,0,0,0.06)] hover:-translate-y-1 hover:border-indigo-100/80 transition-all duration-300 group flex flex-col md:flex-row gap-8 items-start md:items-center">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-4">
                        <span class="inline-flex items-center px-3 py-1.5 rounded-lg bg-amber-50 border border-amber-100 text-amber-700 text-[10px] font-black uppercase tracking-widest">
                            Electrical
                        </span>
                        <span class="text-xs text-slate-400 font-bold flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            Posted 2 hours ago
                        </span>
                    </div>
                    <h3 class="text-xl font-black text-slate-900 mb-2.5 group-hover:text-indigo-600 transition-colors">Install 3 ceiling light fixtures</h3>
                    <p class="text-sm text-slate-500 font-medium line-clamp-2 mb-6 leading-relaxed">
                        Need a certified electrician to install 3 new chandeliers in the living room. Wiring is already there, just need secure mounting and connection.
                    </p>
                    <div class="flex flex-wrap items-center gap-4 text-xs font-bold text-slate-600">
                        <div class="flex items-center gap-2 bg-slate-50 px-3.5 py-2 rounded-xl border border-slate-100">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Ain Diab, Casablanca
                        </div>
                        <div class="flex items-center gap-2 bg-slate-50 px-3.5 py-2 rounded-xl border border-slate-100">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                            Tomorrow morning
                        </div>
                        <div class="flex items-center gap-2.5 pl-2">
                            <div class="w-7 h-7 rounded-full bg-indigo-100 border border-indigo-200 flex items-center justify-center text-[11px] font-black text-indigo-700 shadow-sm">S</div>
                            <span class="text-slate-500 font-semibold">Sara M.</span>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-auto flex flex-col sm:flex-row md:flex-col gap-3">
                    <button class="w-full sm:w-auto px-7 py-3.5 bg-indigo-600 text-white text-sm font-black rounded-xl hover:bg-indigo-700 hover:shadow-lg hover:shadow-indigo-500/25 transition-all text-center">
                        Apply Now
                    </button>
                    <button class="w-full sm:w-auto px-7 py-3.5 bg-white text-slate-700 border border-slate-200 shadow-sm text-sm font-bold rounded-xl hover:bg-slate-50 hover:border-slate-300 transition-all text-center">
                        View Details
                    </button>
                </div>
            </div>

            <!-- Empty State Example (Hidden by default, shown when no jobs) -->
            <div class="hidden bg-white/50 rounded-[2rem] border border-slate-200/60 border-dashed p-12 flex flex-col items-center justify-center text-center">
                <div class="w-24 h-24 bg-white shadow-sm border border-slate-100 rounded-full flex items-center justify-center mb-6">
                    <svg class="w-12 h-12 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </div>
                <h3 class="text-2xl font-black text-slate-900 mb-2">No jobs available right now</h3>
                <p class="text-slate-500 max-w-md mx-auto mb-8 font-medium">We'll notify you when new requests matching your skills are posted in your area.</p>
                <a href="#" class="px-7 py-3.5 bg-white text-slate-700 border border-slate-200 shadow-sm font-bold rounded-xl hover:bg-slate-50 transition-colors">
                    Update Your Skills
                </a>
            </div>

        </div>
    </div>
</div>

<style>
    /* Hide scrollbar for tabs */
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }
    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
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
