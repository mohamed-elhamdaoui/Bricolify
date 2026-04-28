@extends('layouts.dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">


    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Skills</h1>
            <p class="mt-2 text-sm text-slate-500 font-light">Manage granular skills assigned to workers and categories.</p>
        </div>
        <a href="{{ route('admin.skills.create') }}" class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white transition-all bg-indigo-600 rounded-xl shadow-[0_4px_14px_0_rgb(79,70,229,0.39)] hover:shadow-[0_6px_20px_rgba(79,70,229,0.23)] hover:bg-indigo-700 hover:-translate-y-0.5">
            + Add Skill
        </a>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200/60 shadow-sm overflow-hidden">
        <table class="w-full text-left text-sm text-slate-600">
            <thead class="bg-slate-50 text-xs uppercase text-slate-500 shadow-[0_1px_0_rgba(0,0,0,0.05)]">
                <tr>
                    <th scope="col" class="px-6 py-4 font-bold">Skill Name</th>
                    <th scope="col" class="px-6 py-4 font-bold">Parent Category</th>
                    <th scope="col" class="px-6 py-4 font-bold">Workers w/ Skill</th>
                    <th scope="col" class="px-6 py-4 font-bold text-right">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($skills as $skill)
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-6 py-4 font-bold text-slate-900">{{ $skill->name }}</td>
                    <td class="px-6 py-4"><span class="bg-slate-100 text-slate-600 px-2 py-1 rounded text-xs">{{ $skill->category->name ?? 'None' }}</span></td>
                    <td class="px-6 py-4">{{ $skill->worker_profiles_count }}</td>
                    <td class="px-6 py-4 text-right space-x-2">
                        <a href="{{ route('admin.skills.edit', $skill) }}" class="text-indigo-600 hover:text-indigo-800 text-sm font-semibold inline-block">Edit</a>
                        <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-rose-600 hover:text-rose-800 text-sm font-semibold" onclick="return confirm('Delete this skill?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr><td colspan="4" class="px-6 py-4 text-center text-slate-500 font-light">No skills found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
