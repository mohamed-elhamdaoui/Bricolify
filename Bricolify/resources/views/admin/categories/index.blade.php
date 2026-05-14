@extends('layouts.dashboard')

@section('content')
<div class="max-w-5xl mx-auto px-6 lg:px-8 py-12">

    {{-- Header --}}
    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Categories & Skills</h1>
            <p class="mt-2 text-sm text-slate-500 font-light">Manage service categories and their associated skills in one place.</p>
        </div>
        <a href="{{ route('admin.categories.create') }}"
           class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-white bg-indigo-600 rounded-xl hover:bg-indigo-700 hover:-translate-y-0.5 transition-all shadow-sm">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
            New Category
        </a>
    </div>

    {{-- Flash --}}
    @if(session('success'))
        <div class="mb-6 flex items-center gap-3 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-xl px-4 py-3 text-sm font-medium">
            <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
            {{ session('success') }}
        </div>
    @endif

    {{-- Stats Bar --}}
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-white rounded-2xl border border-slate-200/60 p-4 shadow-sm">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Categories</p>
            <p class="text-2xl font-extrabold text-slate-900">{{ $categories->count() }}</p>
        </div>
        <div class="bg-white rounded-2xl border border-slate-200/60 p-4 shadow-sm">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Total Skills</p>
            <p class="text-2xl font-extrabold text-slate-900">{{ $categories->sum(fn($c) => $c->skills->count()) }}</p>
        </div>
        <div class="bg-white rounded-2xl border border-slate-200/60 p-4 shadow-sm col-span-2 md:col-span-1">
            <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Active Missions</p>
            <p class="text-2xl font-extrabold text-slate-900">{{ $categories->sum('active_missions_count') }}</p>
        </div>
    </div>

    {{-- Category Accordion List --}}
    @forelse($categories as $category)
        <div class="bg-white rounded-2xl border border-slate-200/60 shadow-sm mb-4 overflow-hidden">

            {{-- Category Header — click to expand --}}
            <div class="flex items-center justify-between px-6 py-4 cursor-pointer select-none category-toggle"
                 data-target="cat-{{ $category->id }}">
                <div class="flex items-center gap-4">
                    {{-- Icon --}}
                    <div class="w-10 h-10 rounded-xl bg-slate-50 border border-slate-100 flex items-center justify-center text-xl shrink-0">
                        {{ $category->icon ?? '📁' }}
                    </div>
                    <div>
                        <p class="font-extrabold text-slate-900">{{ $category->name }}</p>
                        <p class="text-xs text-slate-400 font-mono mt-0.5">{{ $category->slug }}</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    {{-- Badges --}}
                    <span class="hidden md:inline-flex text-xs font-semibold text-indigo-600 bg-indigo-50 border border-indigo-100 px-2.5 py-1 rounded-full">
                        {{ $category->skills->count() }} skills
                    </span>
                    <span class="hidden md:inline-flex text-xs font-semibold text-slate-500 bg-slate-50 border border-slate-200 px-2.5 py-1 rounded-full">
                        {{ $category->active_missions_count }} missions
                    </span>

                    {{-- Actions --}}
                    <div class="flex items-center gap-2" onclick="event.stopPropagation()">
                        <a href="{{ route('admin.categories.edit', $category) }}"
                           class="text-xs font-bold text-slate-500 hover:text-indigo-600 px-3 py-1.5 rounded-lg hover:bg-indigo-50 transition-colors">
                            Edit
                        </a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline"
                              onsubmit="return confirm('Delete {{ addslashes($category->name) }} and ALL its skills? This cannot be undone.')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="text-xs font-bold text-slate-400 hover:text-red-600 px-3 py-1.5 rounded-lg hover:bg-red-50 transition-colors">
                                Delete
                            </button>
                        </form>
                    </div>

                    {{-- Chevron --}}
                    <svg class="w-4 h-4 text-slate-400 transition-transform duration-200 chevron-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>

            {{-- Skills Panel (hidden by default) --}}
            <div id="cat-{{ $category->id }}" class="hidden border-t border-slate-100 bg-slate-50/50 px-6 py-5">

                {{-- Skills List --}}
                @if($category->skills->isNotEmpty())
                    <div class="flex flex-wrap gap-2 mb-5">
                        @foreach($category->skills as $skill)
                            <div class="group inline-flex items-center gap-2 bg-white border border-slate-200 text-slate-700 text-sm font-medium px-3 py-1.5 rounded-full shadow-sm">
                                <span>{{ $skill->name }}</span>
                                <span class="text-xs text-slate-400">({{ $skill->worker_profiles_count }})</span>
                                <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Delete skill: {{ addslashes($skill->name) }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="w-4 h-4 rounded-full text-slate-300 hover:text-red-500 hover:bg-red-50 flex items-center justify-center transition-all opacity-0 group-hover:opacity-100 ml-1">
                                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-sm text-slate-400 italic mb-4">No skills yet. Add the first one below.</p>
                @endif

                {{-- Inline Add Skill --}}
                <form action="{{ route('admin.skills.store') }}" method="POST" class="flex items-center gap-3">
                    @csrf
                    <input type="hidden" name="category_id" value="{{ $category->id }}">
                    <input type="text" name="name" required placeholder="New skill name..."
                           class="flex-grow px-4 py-2.5 text-sm border border-slate-200 rounded-xl bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                    <button type="submit"
                            class="px-4 py-2.5 text-sm font-bold text-white bg-slate-900 rounded-xl hover:bg-slate-800 transition-colors whitespace-nowrap">
                        + Add Skill
                    </button>
                </form>
            </div>

        </div>
    @empty
        <div class="text-center py-20 bg-white rounded-2xl border border-dashed border-slate-200">
            <p class="text-slate-400 font-light mb-4">No categories created yet.</p>
            <a href="{{ route('admin.categories.create') }}" class="text-sm font-bold text-indigo-600 hover:text-indigo-700">Create your first category →</a>
        </div>
    @endforelse

</div>

{{-- Vanilla JS Accordion --}}
<script>
    document.querySelectorAll('.category-toggle').forEach(function(header) {
        header.addEventListener('click', function() {
            const targetId = this.dataset.target;
            const panel = document.getElementById(targetId);
            const chevron = this.querySelector('.chevron-icon');
            const isOpen = !panel.classList.contains('hidden');

            // Close all open panels
            document.querySelectorAll('[id^="cat-"]').forEach(function(p) {
                p.classList.add('hidden');
            });
            document.querySelectorAll('.chevron-icon').forEach(function(c) {
                c.style.transform = '';
            });

            // Toggle clicked panel
            if (!isOpen) {
                panel.classList.remove('hidden');
                chevron.style.transform = 'rotate(180deg)';
            }
        });
    });
</script>
@endsection
