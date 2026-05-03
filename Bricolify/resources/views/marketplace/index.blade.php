@extends('layouts.app')

@section('content')
<div class="bg-[#f8fafc] min-h-screen pt-24 pb-20 relative overflow-hidden">
    {{-- Decorative Background Orbs --}}
    <div class="fixed inset-0 z-0 pointer-events-none">
        <div class="absolute top-[-10%] right-[-5%] w-[40%] h-[40%] rounded-full bg-indigo-500/5 blur-[120px]"></div>
        <div class="absolute bottom-[-10%] left-[-5%] w-[40%] h-[40%] rounded-full bg-violet-500/5 blur-[120px]"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        {{-- Header Section --}}
        <div class="mb-10 text-center max-w-2xl mx-auto">
            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight mb-4">
                Service <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-violet-600">Marketplace</span>
            </h1>
            <p class="text-lg text-slate-500 font-light">Find your next mission or discover skilled experts for your projects.</p>
        </div>

        {{-- Horizontal Filter Bar --}}
        <div class="bg-white rounded-[2.5rem] border border-slate-200/60 p-4 shadow-[0_8px_30px_rgb(0,0,0,0.04)] mb-12 sticky top-24 z-30">
            <form action="{{ route('requests.index') }}" method="GET" class="flex flex-col md:flex-row items-center gap-4">
                {{-- Search --}}
                <div class="w-full md:flex-1 relative">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="What service do you need?" 
                           class="w-full pl-12 pr-4 py-4 bg-slate-50 border-none rounded-2xl text-sm focus:ring-2 focus:ring-indigo-500/20 transition-all placeholder:text-slate-400">
                </div>

                {{-- Category --}}
                <div class="w-full md:w-64 relative group">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </div>
                    <select name="category_id" onchange="this.form.submit()" class="w-full pl-12 pr-10 py-4 bg-slate-50 border-none rounded-2xl text-sm focus:ring-2 focus:ring-indigo-500/20 transition-all appearance-none cursor-pointer text-slate-600 font-medium">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </div>
                </div>

                {{-- Location --}}
                <div class="w-full md:w-64 relative">
                    <div class="absolute inset-y-0 left-0 pl-5 flex items-center pointer-events-none text-slate-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    </div>
                    <input type="text" name="location" value="{{ request('location') }}" placeholder="Anywhere" 
                           class="w-full pl-12 pr-4 py-4 bg-slate-50 border-none rounded-2xl text-sm focus:ring-2 focus:ring-indigo-500/20 transition-all placeholder:text-slate-400">
                </div>

                {{-- Submit Button --}}
                <button type="submit" class="w-full md:w-auto px-10 py-4 bg-slate-900 text-white rounded-2xl font-bold hover:bg-indigo-600 transition-all shadow-lg shadow-slate-900/10">
                    Search
                </button>
            </form>
        </div>

        {{-- Quick Categories Pills --}}
        <div class="flex flex-wrap items-center justify-center gap-3 mb-12">
            <a href="{{ route('requests.index') }}" class="px-5 py-2.5 rounded-full text-xs font-bold transition-all {{ !request('category_id') ? 'bg-slate-900 text-white' : 'bg-white text-slate-500 border border-slate-200 hover:border-indigo-300' }}">
                All Needs
            </a>
            @foreach($categories->take(8) as $cat)
                <a href="{{ route('requests.index', ['category_id' => $cat->id]) }}" 
                   class="px-5 py-2.5 rounded-full text-xs font-bold transition-all {{ request('category_id') == $cat->id ? 'bg-slate-900 text-white' : 'bg-white text-slate-500 border border-slate-200 hover:border-indigo-300' }}">
                    {{ $cat->name }}
                </a>
            @endforeach
        </div>

        {{-- Main Results Section --}}
        <div class="flex flex-col gap-8">
            {{-- Toolbar --}}
            <div class="flex items-center justify-between px-2">
                <div>
                    <h2 class="text-xl font-extrabold text-slate-900">Available Missions</h2>
                    <p class="text-sm text-slate-500 font-light mt-1">Showing <span class="font-bold text-slate-900">{{ $requests->total() }}</span> open projects</p>
                </div>
                <div class="hidden sm:flex items-center gap-3">
                    <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">Sort by</span>
                    <select class="bg-transparent text-sm font-bold text-slate-900 focus:outline-none cursor-pointer">
                        <option>Recommended</option>
                        <option>Newest First</option>
                        <option>Highest Budget</option>
                    </select>
                </div>
            </div>

            {{-- Request Grid --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($requests as $request)
                    <div class="bg-white border border-slate-200/60 rounded-[2.5rem] overflow-hidden shadow-sm hover:shadow-2xl hover:border-indigo-200 transition-all group flex flex-col h-full relative">
                        {{-- Image Header (Conditional) --}}
                        @if($request->image_url)
                            <div class="w-full h-48 overflow-hidden">
                                <img src="{{ asset('storage/' . $request->image_url) }}" alt="{{ $request->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            </div>
                        @endif

                        <div class="p-7 flex-grow flex flex-col">
                            {{-- Top Badges --}}
                            <div class="flex justify-between items-start mb-8">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-2xl bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold text-sm border border-indigo-100 shadow-sm group-hover:bg-indigo-600 group-hover:text-white transition-all">
                                    {{ substr($request->client->name ?? 'U', 0, 1) }}
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-slate-900 leading-none mb-1">{{ $request->client->name ?? 'User' }}</h4>
                                    <div class="flex items-center gap-1 text-[10px] text-slate-400 font-medium tracking-wide uppercase">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                                        {{ $request->location }}
                                    </div>
                                </div>
                            </div>
                            <span class="px-3 py-1 rounded-full bg-slate-50 text-slate-500 text-[10px] font-bold border border-slate-100 uppercase tracking-widest">
                                {{ $request->category->name }}
                            </span>
                        </div>

                        {{-- Body --}}
                        <h3 class="text-xl font-extrabold text-slate-900 mb-3 group-hover:text-indigo-600 transition-colors line-clamp-1">
                            {{ $request->title }}
                        </h3>

                        <p class="text-sm text-slate-500 font-light mb-8 line-clamp-3 leading-relaxed flex-grow">
                            {{ $request->description }}
                        </p>

                        {{-- Footer Actions --}}
                        <div class="pt-6 border-t border-slate-50 mt-auto flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Posted</span>
                                <span class="text-xs font-bold text-slate-600">{{ $request->created_at->diffForHumans() }}</span>
                            </div>
                            
                            <div class="flex items-center gap-2">
                                <a href="{{ route('requests.show', $request->id) }}" class="p-2.5 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-xl transition-all" title="View Details">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                </a>
                                
                                @auth
                                    @if(auth()->id() !== $request->client_id && auth()->user()->isWorker())
                                        <form action="{{ route('worker.applications.store', $request->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="px-6 py-3 bg-slate-900 text-white rounded-2xl text-xs font-bold shadow-lg shadow-slate-900/10 hover:bg-indigo-600 hover:-translate-y-0.5 transition-all">
                                                Apply Now
                                            </button>
                                        </form>
                                    @elseif(auth()->id() === $request->client_id)
                                        <span class="px-5 py-3 bg-emerald-50 text-emerald-600 rounded-2xl text-[10px] font-bold uppercase tracking-widest border border-emerald-100">Your Post</span>
                                    @endif
                                @else
                                    <a href="{{ route('login') }}" class="px-6 py-3 bg-slate-900 text-white rounded-2xl text-xs font-bold shadow-lg shadow-slate-900/10 hover:bg-indigo-600 transition-all">
                                        Apply Now
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    {{-- Empty State --}}
                    <div class="col-span-full bg-white rounded-[3rem] border border-dashed border-slate-200 p-20 flex flex-col items-center justify-center text-center">
                        <div class="w-24 h-24 bg-slate-50 rounded-full flex items-center justify-center mb-8 border border-slate-100 shadow-inner">
                            <svg class="w-10 h-10 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <h3 class="text-2xl font-extrabold text-slate-900 mb-2">No missions found</h3>
                        <p class="text-slate-500 font-light max-w-sm mx-auto mb-10">Try adjusting your filters or search keywords to find what you're looking for.</p>
                        <a href="{{ route('requests.index') }}" class="px-8 py-4 bg-indigo-50 text-indigo-600 font-bold rounded-2xl hover:bg-indigo-100 transition-all">Clear Filters</a>
                    </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="mt-16">
                {{ $requests->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
