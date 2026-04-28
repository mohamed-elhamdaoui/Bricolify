@extends('layouts.dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">


    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Categories</h1>
            <p class="mt-2 text-sm text-slate-500 font-light">Manage service categories shown to clients.</p>
        </div>
        <a href="{{ route('admin.categories.create') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white transition-all bg-indigo-600 rounded-xl shadow-[0_4px_14px_0_rgb(79,70,229,0.39)] hover:shadow-[0_6px_20px_rgba(79,70,229,0.23)] hover:bg-indigo-700 hover:-translate-y-0.5">
            + New Category
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200/60 shadow-sm overflow-hidden">
        <table class="w-full text-left text-sm text-slate-600">
            <thead class="bg-slate-50 text-xs uppercase text-slate-500 shadow-[0_1px_0_rgba(0,0,0,0.05)]">
                <tr>
                    <th scope="col" class="px-6 py-4 font-bold">Category Name</th>
                    <th scope="col" class="px-6 py-4 font-bold">Active Missions</th>
                    <th scope="col" class="px-6 py-4 font-bold">Status</th>
                    <th scope="col" class="px-6 py-4 font-bold text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($categories as $category)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-6 py-4 font-bold text-slate-900">{{ $category->name }}</td>
                    <td class="px-6 py-4">{{ $category->active_missions_count }}</td>
                    <td class="px-6 py-4"><x-badge type="success">Active</x-badge></td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.categories.edit', $category) }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-semibold inline-block">Edit</a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-rose-600 hover:text-rose-800 text-sm font-semibold" onclick="return confirm('Delete this category?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="px-6 py-4 text-center text-slate-500 font-light">No categories found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
