@extends('layouts.dashboard')

@section('content')
<div class="max-w-3xl mx-auto px-6 lg:px-8 py-12">
    <div class="mb-8">
        <a href="{{ route('admin.categories.index') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-slate-900 mb-6 transition-colors">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to Categories
        </a>
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Edit Category: {{ $category->name }}</h1>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200/60 p-8 shadow-sm">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Name --}}
            <div>
                <label for="name" class="block text-sm font-bold text-slate-900 mb-2">Category Name <span class="text-red-500">*</span></label>
                <input type="text" id="name" name="name" required value="{{ old('name', $category->name) }}"
                       class="w-full px-4 py-3 border {{ $errors->has('name') ? 'border-red-400 bg-red-50' : 'border-slate-200' }} text-slate-900 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all font-medium">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
                <p class="text-xs text-slate-400 mt-1">Slug: <span class="font-mono">{{ $category->slug }}</span> — will be regenerated on save.</p>
            </div>

            {{-- Icon --}}
            <div>
                <label for="icon" class="block text-sm font-bold text-slate-900 mb-2">Icon <span class="text-slate-400 font-normal">(emoji or icon class)</span></label>
                <input type="text" id="icon" name="icon" value="{{ old('icon', $category->icon) }}"
                       class="w-full px-4 py-3 border {{ $errors->has('icon') ? 'border-red-400 bg-red-50' : 'border-slate-200' }} text-slate-900 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all font-medium placeholder-slate-400"
                       placeholder="e.g. 🔧 or wrench">
                @error('icon')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Description --}}
            <div>
                <label for="description" class="block text-sm font-bold text-slate-900 mb-2">Description</label>
                <textarea id="description" name="description" rows="4"
                          class="w-full px-4 py-3 border {{ $errors->has('description') ? 'border-red-400 bg-red-50' : 'border-slate-200' }} text-slate-900 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all placeholder-slate-400 resize-none">{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="pt-4 flex items-center justify-end gap-4">
                <a href="{{ route('admin.categories.index') }}" class="px-6 py-3 font-medium text-slate-600 hover:text-slate-900 transition-colors">Cancel</a>
                <button type="submit" class="px-8 py-3 text-sm font-bold text-white bg-indigo-600 rounded-xl shadow hover:bg-indigo-700 transition-all">Update Category</button>
            </div>
        </form>
    </div>
</div>
@endsection
