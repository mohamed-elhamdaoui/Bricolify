@extends('layouts.app')

@section('content')
<div class="bg-[#fafafa] min-h-screen pt-32 pb-24">
    <!-- Background Blur Orbs -->
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="absolute top-[20%] left-[-10%] w-[40%] h-[40%] rounded-full bg-slate-200/50 blur-[120px]"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <!-- Page Header -->
        <div class="mb-12">
            <h1 class="text-4xl font-extrabold text-slate-900 tracking-tight mb-3">Open Requests</h1>
            <p class="text-lg text-slate-500 font-light">Browse active missions looking for professionals.</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Filter Sidebar -->
            <div class="w-full lg:w-1/4 shrink-0">
                <div class="bg-white rounded-3xl border border-slate-200/60 p-6 shadow-sm sticky top-32">
                    <h3 class="text-sm font-bold text-slate-900 uppercase tracking-widest mb-6">Filter by Category</h3>
                    
                    <form action="{{ route('requests.index') }}" method="GET" class="space-y-3">
                        <a href="{{ route('requests.index') }}" class="block w-full text-left px-4 py-3 rounded-xl transition-all {{ !request('category_id') ? 'bg-indigo-50 text-indigo-700 font-bold border border-indigo-100' : 'text-slate-500 hover:bg-slate-50 font-medium border border-transparent' }}">
                            All Categories
                        </a>
                        
                        @foreach($categories as $cat)
                            <a href="{{ route('requests.index', ['category_id' => $cat->id]) }}" class="block w-full text-left px-4 py-3 rounded-xl transition-all {{ request('category_id') == $cat->id ? 'bg-indigo-50 text-indigo-700 font-bold border border-indigo-100' : 'text-slate-500 hover:bg-slate-50 font-medium border border-transparent' }}">
                                {{ $cat->name }}
                            </a>
                        @endforeach
                    </form>
                </div>
            </div>

            <!-- Requests Grid/List -->
            <div class="w-full lg:w-3/4">
                <div class="space-y-6">
                    @forelse($requests as $req)
                        <div class="bg-white rounded-[2rem] border border-slate-200/60 p-6 shadow-sm hover:shadow-[0_8px_30px_rgb(0,0,0,0.06)] hover:border-indigo-200/60 transition-all duration-300 flex flex-col sm:flex-row gap-6">
                            
                            @if($req->image_url)
                                <div class="w-full sm:w-48 h-48 sm:h-auto shrink-0 rounded-2xl overflow-hidden bg-slate-100">
                                    <img src="{{ $req->image_url }}" alt="Request Image" class="w-full h-full object-cover">
                                </div>
                            @endif

                            <div class="flex-grow flex flex-col justify-center">
                                <div class="flex items-center gap-3 mb-3">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-indigo-50 text-indigo-700 border border-indigo-100 text-xs font-bold uppercase tracking-widest">
                                        {{ $req->category->name ?? 'General' }}
                                    </span>
                                    <span class="text-xs font-medium text-slate-400 flex items-center gap-1">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                        {{ $req->created_at->diffForHumans() }}
                                    </span>
                                </div>

                                <h3 class="text-xl font-extrabold text-slate-900 tracking-tight mb-2">{{ $req->title }}</h3>
                                <p class="text-sm text-slate-500 font-light line-clamp-2 mb-6 leading-relaxed">
                                    {{ $req->description }}
                                </p>

                                <div class="flex flex-wrap items-center justify-between gap-4 mt-auto pt-4 border-t border-slate-100">
                                    <div class="flex items-center gap-6">
                                        <div class="flex items-center gap-2 text-sm text-slate-600 font-medium">
                                            <div class="w-8 h-8 rounded-full bg-emerald-50 text-emerald-600 flex items-center justify-center">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                            </div>
                                            {{ $req->location }}
                                        </div>
                                        <div class="flex items-center gap-2 text-sm text-slate-600 font-medium">
                                            <div class="w-8 h-8 rounded-full bg-violet-50 text-violet-600 flex items-center justify-center">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                                            </div>
                                            {{ \Carbon\Carbon::parse($req->scheduled_date)->format('M d, Y') }}
                                        </div>
                                    </div>
                                    
                                    <div class="relative group">
                                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-6 py-2.5 text-sm font-bold text-slate-700 bg-slate-50 border border-slate-200 rounded-xl hover:bg-slate-900 hover:text-white hover:border-transparent transition-all">
                                            View Details
                                        </a>
                                        <!-- Tooltip -->
                                        <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-2 px-3 py-1.5 bg-slate-900 text-white text-xs font-medium rounded-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all whitespace-nowrap">
                                            Sign in to apply
                                            <svg class="absolute top-full left-1/2 -translate-x-1/2 text-slate-900 w-3 h-3" fill="currentColor" viewBox="0 0 24 24"><path d="M12 21l-12-18h24z"></path></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-24 bg-white rounded-[2rem] border border-slate-200 border-dashed">
                            <div class="w-16 h-16 bg-slate-50 text-slate-400 rounded-full flex items-center justify-center mx-auto mb-4">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900 mb-2">No Requests Found</h3>
                            <p class="text-slate-500 font-light">There are currently no open requests matching this category.</p>
                        </div>
                    @endforelse
                </div>

                @if($requests->hasPages())
                    <div class="mt-8">
                        {{ $requests->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
