@extends('layouts.app')

@section('content')
<div class="bg-[#f1f5f9] min-h-screen pt-32 pb-24 relative overflow-hidden">
    {{-- Fixed Background Blur Orbs --}}
    <div class="fixed inset-0 z-0 pointer-events-none">
        <div class="absolute top-[10%] left-[-5%] w-[35%] h-[35%] rounded-full bg-indigo-200/40 blur-[100px]"></div>
        <div class="absolute bottom-[10%] right-[-5%] w-[35%] h-[35%] rounded-full bg-violet-200/40 blur-[100px]"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        
        {{-- 1. HEADER --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
            <div>
                <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight">Marketplace</h1>
                <p class="text-lg text-slate-500 font-light mt-2">Browse service requests near you</p>
            </div>
            <a href="{{ route('login') }}" class="inline-flex items-center justify-center gap-2 bg-indigo-600 text-white px-8 py-4 rounded-xl font-bold shadow-[0_4px_14px_0_rgb(79,70,229,0.3)] hover:bg-indigo-700 hover:-translate-y-1 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                Post a Request
            </a>
        </div>

        {{-- 2. FILTER / SEARCH BAR --}}
        <div class="bg-white/70 backdrop-blur-sm border border-white/90 rounded-2xl shadow-sm p-4 mb-10">
            <form action="{{ route('requests.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                {{-- Search --}}
                <div class="md:col-span-2 relative">
                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" name="search" placeholder="Search for services..." value="{{ request('search') }}" 
                           class="block w-full pl-11 pr-4 py-3 bg-white border border-slate-200 rounded-xl text-sm font-light focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                </div>
                
                {{-- Category Filter --}}
                <div class="relative">
                    <select name="category_id" onchange="this.form.submit()"
                            class="block w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-sm font-light appearance-none focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>

                {{-- Location Filter --}}
                <div class="relative">
                    <input type="text" name="location" placeholder="Location..." value="{{ request('location') }}"
                           class="block w-full px-4 py-3 bg-white border border-slate-200 rounded-xl text-sm font-light focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                </div>
            </form>
        </div>

        {{-- 3. REQUEST LIST (CORE) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($requests as $request)
                <div class="bg-white/70 backdrop-blur-sm border border-white/90 rounded-2xl p-6 shadow-sm hover:shadow-md hover:-translate-y-1 transition-all duration-300 flex flex-col group">
                    <div class="flex justify-between items-start mb-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full bg-indigo-50 text-indigo-600 text-[10px] font-semibold border border-indigo-100 uppercase tracking-wider">
                            {{ $request->category->name }}
                        </span>
                        <span class="text-[11px] font-medium text-slate-400">
                            {{ $request->created_at->diffForHumans() }}
                        </span>
                    </div>

                    <h3 class="text-xl font-extrabold text-slate-900 mb-3 group-hover:text-indigo-600 transition-colors line-clamp-1">
                        {{ $request->title }}
                    </h3>

                    <p class="text-sm font-light text-slate-500 line-clamp-2 mb-6 leading-relaxed">
                        {{ $request->description }}
                    </p>

                    <div class="mt-auto space-y-4">
                        <div class="flex items-center gap-4 text-xs font-medium text-slate-500">
                            <div class="flex items-center gap-1.5">
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                {{ $request->location }}
                            </div>
                        </div>

                        <a href="{{ route('login') }}" class="w-full inline-flex items-center justify-center px-6 py-3 bg-slate-900 text-white rounded-xl text-sm font-bold hover:bg-slate-800 transition-all">
                            Apply for Mission
                        </a>
                    </div>
                </div>
            @empty
                {{-- 4. EMPTY STATE --}}
                <div class="col-span-full bg-white/60 backdrop-blur-xl border border-white/90 rounded-[2.5rem] shadow-sm p-16 flex flex-col items-center justify-center text-center">
                    <div class="w-20 h-20 bg-slate-100 rounded-3xl flex items-center justify-center mb-6 border border-slate-200/50 shadow-inner">
                        <svg class="w-10 h-10 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    </div>
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-2">No requests available yet</h3>
                    <p class="text-slate-500 font-light max-w-sm mx-auto mb-10">We couldn't find any open missions matching your criteria. Be the first to post a new request!</p>
                    <a href="{{ route('login') }}" class="px-8 py-4 bg-indigo-600 text-white font-bold rounded-2xl hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-200">
                        Post a Request
                    </a>
                </div>
            @endforelse
        </div>

        {{-- 5. PAGINATION / LOAD MORE --}}
        @if($requests->hasPages())
            <div class="mt-16 flex justify-center">
                {{ $requests->links() }}
            </div>
        @endif

    </div>
</div>
@endsection
