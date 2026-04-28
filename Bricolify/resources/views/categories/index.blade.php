@extends('layouts.app')

@section('content')
<div class="bg-[#fafafa] min-h-screen pt-32 pb-24">
    <!-- Background Blur Orbs -->
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] rounded-full bg-indigo-500/5 blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] rounded-full bg-violet-500/5 blur-[120px]"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <!-- Hero Section -->
        <div class="text-center max-w-2xl mx-auto mb-16">
            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight mb-4">
                Explore Our Services
            </h1>
            <p class="text-lg text-slate-500 font-light mb-8">
                Find trusted professionals for every corner of your home. Browse our categories below.
            </p>
            
            <!-- Search Bar (Client Side) -->
            <div class="relative max-w-md mx-auto">
                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="text" id="categorySearch" placeholder="Search categories..." class="w-full pl-12 pr-4 py-4 rounded-2xl border border-slate-200 bg-white focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all text-sm outline-none shadow-sm placeholder-slate-400">
            </div>
        </div>

        <!-- Categories Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6" id="categoriesGrid">
            @forelse($categories as $category)
                <a href="{{ route('workers.index', ['category' => $category->slug]) }}" class="category-card group relative bg-white p-6 rounded-3xl border border-slate-200/60 shadow-sm hover:shadow-[0_8px_30px_rgb(0,0,0,0.06)] hover:-translate-y-1.5 transition-all duration-300 overflow-hidden" data-name="{{ strtolower($category->name) }}">
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300 shadow-sm">
                            @if($category->icon)
                                <span>{!! $category->icon !!}</span>
                            @else
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            @endif
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-1">{{ $category->name }}</h3>
                        <p class="text-sm text-slate-500 mb-6 font-light line-clamp-2">
                            {{ $category->description ?? 'Professional ' . strtolower($category->name) . ' services.' }}
                        </p>
                        <div class="flex items-center justify-between border-t border-slate-100 pt-4">
                            <div class="flex items-center gap-2">
                                <span class="relative flex h-2 w-2">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                                </span>
                                <span class="text-xs font-medium text-slate-600">{{ $category->workers_count ?? 0 }} pros active</span>
                            </div>
                            <svg class="w-4 h-4 text-slate-300 group-hover:text-indigo-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-full text-center py-16 bg-white rounded-3xl border border-slate-200 border-dashed">
                    <div class="w-16 h-16 bg-slate-50 text-slate-400 rounded-2xl flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-1">No Categories Found</h3>
                    <p class="text-slate-500 font-light">We are currently adding more service categories. Check back soon!</p>
                </div>
            @endforelse
        </div>

        <!-- Stats Bar -->
        @if(isset($stats))
        <div class="mt-16 bg-white rounded-3xl border border-slate-200/60 p-8 flex flex-col sm:flex-row justify-around items-center shadow-sm">
            <div class="text-center mb-6 sm:mb-0">
                <p class="text-4xl font-extrabold text-slate-900">{{ $stats['total_categories'] ?? 0 }}</p>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-widest mt-2">Categories</p>
            </div>
            <div class="hidden sm:block w-px h-16 bg-slate-100"></div>
            <div class="text-center">
                <p class="text-4xl font-extrabold text-slate-900">{{ $stats['total_workers'] ?? 0 }}</p>
                <p class="text-xs font-bold text-slate-500 uppercase tracking-widest mt-2">Active Professionals</p>
            </div>
        </div>
        @endif
    </div>
</div>

<!-- Vanilla JS Client-Side Filter -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('categorySearch');
        const cards = document.querySelectorAll('.category-card');

        if(searchInput) {
            searchInput.addEventListener('input', function(e) {
                const term = e.target.value.toLowerCase();
                cards.forEach(card => {
                    const name = card.getAttribute('data-name');
                    if (name.includes(term)) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        }
    });
</script>
@endsection
