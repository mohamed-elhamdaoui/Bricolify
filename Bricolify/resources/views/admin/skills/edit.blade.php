@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-6 lg:px-8 py-12">
    <div class="mb-8">
        <a href="{{ route('admin.skills.index') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-slate-900 mb-6 transition-colors">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to Skills
        </a>
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Edit Skill: {{ $skill->name }}</h1>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200/60 p-8 shadow-sm">
        <form action="{{ route('admin.skills.update', $skill) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div>
                <label for="name" class="block text-sm font-bold text-slate-900 mb-2">Skill Name</label>
                <input type="text" id="name" name="name" value="{{ $skill->name }}" required class="w-full px-4 py-3 border border-slate-200 text-slate-900 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all font-medium placeholder-slate-400">
            </div>

            <div>
                <label for="category_id" class="block text-sm font-bold text-slate-900 mb-2">Parent Category</label>
                <select id="category_id" name="category_id" required class="w-full px-4 py-3 border border-slate-200 text-slate-900 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all bg-white appearance-none">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @selected($skill->category_id == $category->id)>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="pt-4 flex items-center justify-end gap-4">
                <a href="{{ route('admin.skills.index') }}" class="px-6 py-3 font-medium text-slate-600 hover:text-slate-900 transition-colors">Cancel</a>
                <button type="submit" class="px-8 py-3 text-sm font-bold text-white bg-indigo-600 rounded-xl shadow hover:bg-indigo-700 transition-all">Update Skill</button>
            </div>
        </form>
    </div>
</div>
@endsection
