@extends('layouts.dashboard')

@section('content')
<div class="p-6 lg:p-8">
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-6">
        <div>
            <h1 class="text-3xl font-extrabold tracking-tight mb-2 text-slate-900">Marketplace</h1>
            <p class="text-slate-500 font-light">Browse open requests and find your next mission.</p>
        </div>

        <!-- Filters -->
        <div class="flex gap-3">
            <select class="bg-white border border-slate-200 text-slate-700 font-medium text-sm rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:outline-none shadow-sm cursor-pointer appearance-none">
                <option value="">All Categories</option>
                <option value="1">Plumbing</option>
                <option value="2">Electrical</option>
            </select>
            <select class="bg-white border border-slate-200 text-slate-700 font-medium text-sm rounded-xl px-4 py-2.5 focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 focus:outline-none shadow-sm cursor-pointer appearance-none">
                <option value="">Casablanca</option>
                <option value="">Rabat</option>
            </select>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        
        <!-- Job Card 1 -->
        <div class="bg-white border border-slate-200/60 hover:border-indigo-300 rounded-3xl p-6 shadow-sm hover:shadow-md relative transition-all group flex flex-col h-full">
            <div class="flex justify-between items-start mb-4">
                <span class="text-[10px] font-bold uppercase tracking-wider bg-sky-50 border border-sky-100 text-sky-600 px-2.5 py-1 rounded-md">Plumbing</span>
                <span class="text-xs text-slate-500 font-medium">Casablanca</span>
            </div>
            <h3 class="text-lg font-bold text-slate-900 group-hover:text-indigo-600 transition-colors mb-3">Fix leaking sink pipe in Kitchen</h3>
            <p class="text-sm text-slate-500 mb-6 font-light line-clamp-3 flex-grow">Kitchen sink is leaking from the U-bend. Needs urgent repair before weekend. Water is dripping continuously into a bucket.</p>
            
            <div class="pt-4 border-t border-slate-100 flex items-center justify-between mt-auto">
                <div class="text-xs text-slate-400 font-medium">Posted 2 hrs ago</div>
                <a href="{{ url('/worker/requests/show') }}" class="text-sm font-bold text-indigo-600 hover:text-indigo-800 transition-colors flex items-center group-hover:translate-x-1 duration-300">
                    View Details
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>

        <!-- Job Card 2 -->
        <div class="bg-white border border-slate-200/60 hover:border-indigo-300 rounded-3xl p-6 shadow-sm hover:shadow-md relative transition-all group flex flex-col h-full">
            <div class="flex justify-between items-start mb-4">
                <span class="text-[10px] font-bold uppercase tracking-wider bg-amber-50 border border-amber-100 text-amber-600 px-2.5 py-1 rounded-md">Electrical</span>
                <span class="text-xs text-slate-500 font-medium">Casablanca</span>
            </div>
            <h3 class="text-lg font-bold text-slate-900 group-hover:text-indigo-600 transition-colors mb-3">Install 3 ceiling lights</h3>
            <p class="text-sm text-slate-500 mb-6 font-light line-clamp-3 flex-grow">Need a certified electrician to install fixtures in the living room. Wiring is mostly ready.</p>
            
            <div class="pt-4 border-t border-slate-100 flex items-center justify-between mt-auto">
                <div class="text-xs text-slate-400 font-medium">Posted 5 hrs ago</div>
                <a href="{{ url('/worker/requests/show') }}" class="text-sm font-bold text-indigo-600 hover:text-indigo-800 transition-colors flex items-center group-hover:translate-x-1 duration-300">
                    View Details
                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
