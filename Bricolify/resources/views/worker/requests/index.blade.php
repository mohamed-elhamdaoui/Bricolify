@extends('layouts.app')

@section('content')
<div class="bg-slate-950 min-h-[calc(100vh-4rem)] pt-12 pb-24 text-white relative overflow-hidden -mt-16 pt-[6rem]">
    <div class="absolute inset-0 z-0">
        <div class="absolute top-[-20%] right-[-10%] w-[50%] h-[50%] bg-indigo-600/20 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-[-20%] left-[-10%] w-[50%] h-[50%] bg-violet-600/20 rounded-full blur-[120px]"></div>
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px]"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-12 gap-6">
            <div>
                <h1 class="text-3xl font-extrabold tracking-tight mb-2 text-white">Marketplace</h1>
                <p class="text-slate-400 font-light">Browse open requests and find your next mission.</p>
            </div>

            <!-- Filters -->
            <div class="flex gap-3">
                <select class="bg-white/5 border border-white/10 text-slate-300 text-sm rounded-xl px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none appearance-none">
                    <option value="">All Categories</option>
                    <option value="1">Plumbing</option>
                    <option value="2">Electrical</option>
                </select>
                <select class="bg-white/5 border border-white/10 text-slate-300 text-sm rounded-xl px-4 py-2 focus:ring-2 focus:ring-indigo-500 focus:outline-none appearance-none">
                    <option value="">Casablanca</option>
                    <option value="">Rabat</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            
            <!-- Job Card 1 -->
            <div class="bg-slate-900/50 backdrop-blur-xl border border-white/10 hover:border-white/20 rounded-3xl p-6 shadow-2xl relative transition-all group flex flex-col h-full">
                <div class="flex justify-between items-start mb-4">
                    <span class="text-[10px] font-bold uppercase tracking-wider bg-sky-500/10 border border-sky-500/20 text-sky-400 px-2 py-1 rounded-full">Plumbing</span>
                    <span class="text-xs text-slate-400 font-medium">Casablanca</span>
                </div>
                <h3 class="text-lg font-bold text-slate-100 group-hover:text-indigo-400 transition-colors mb-3">Fix leaking sink pipe in Kitchen</h3>
                <p class="text-sm text-slate-400 mb-6 font-light line-clamp-3 flex-grow">Kitchen sink is leaking from the U-bend. Needs urgent repair before weekend. Water is dripping continuously into a bucket.</p>
                
                <div class="pt-4 border-t border-white/10 flex items-center justify-between mt-auto">
                    <div class="text-xs text-slate-500">Posted 2 hrs ago</div>
                    <a href="{{ url('/worker/requests/show') }}" class="text-sm font-semibold text-indigo-400 hover:text-indigo-300 transition-colors flex items-center group-hover:translate-x-1 duration-300">
                        View Details
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>

            <!-- Job Card 2 -->
            <div class="bg-slate-900/50 backdrop-blur-xl border border-white/10 hover:border-white/20 rounded-3xl p-6 shadow-2xl relative transition-all group flex flex-col h-full">
                <div class="flex justify-between items-start mb-4">
                    <span class="text-[10px] font-bold uppercase tracking-wider bg-amber-500/10 border border-amber-500/20 text-amber-400 px-2 py-1 rounded-full">Electrical</span>
                    <span class="text-xs text-slate-400 font-medium">Casablanca</span>
                </div>
                <h3 class="text-lg font-bold text-slate-100 group-hover:text-indigo-400 transition-colors mb-3">Install 3 ceiling lights</h3>
                <p class="text-sm text-slate-400 mb-6 font-light line-clamp-3 flex-grow">Need a certified electrician to install fixtures in the living room. Wiring is mostly ready.</p>
                
                <div class="pt-4 border-t border-white/10 flex items-center justify-between mt-auto">
                    <div class="text-xs text-slate-500">Posted 5 hrs ago</div>
                    <a href="{{ url('/worker/requests/show') }}" class="text-sm font-semibold text-indigo-400 hover:text-indigo-300 transition-colors flex items-center group-hover:translate-x-1 duration-300">
                        View Details
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
