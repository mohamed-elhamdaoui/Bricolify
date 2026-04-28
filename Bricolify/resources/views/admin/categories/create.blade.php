@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-6 lg:px-8 py-12">
    <div class="mb-8">
        <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-slate-900 mb-6 transition-colors">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to Categories
        </a>
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Create Category</h1>
        <p class="mt-2 text-sm text-slate-500 font-light">Add a new service category to the platform.</p>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200/60 p-8 shadow-sm">
        <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div>
                <label for="name" class="block text-sm font-bold text-slate-900 mb-2">Category Name</label>
                <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-slate-200 text-slate-900 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all font-medium placeholder-slate-400" placeholder="e.g. Plumbing">
            </div>

            <div>
                <label for="description" class="block text-sm font-bold text-slate-900 mb-2">Description</label>
                <textarea id="description" name="description" rows="4" class="w-full px-4 py-3 border border-slate-200 text-slate-900 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all placeholder-slate-400 resize-none" placeholder="Description..."></textarea>
            </div>

            <div class="pt-4 flex items-center justify-end gap-4">
                <a href="{{ route('admin.categories.index') }}" class="px-6 py-3 font-medium text-slate-600 hover:text-slate-900 transition-colors">Cancel</a>
                <button type="submit" class="px-8 py-3 text-sm font-bold text-white bg-indigo-600 rounded-xl shadow hover:bg-indigo-700 transition-all">Save Category</button>
            </div>
        </form>
    </div>
</div>
@endsection
