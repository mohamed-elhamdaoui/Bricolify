@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">
    <!-- Admin Navigation (Simulated) -->
    <div class="flex items-center gap-6 mb-8 overflow-x-auto pb-4 border-b border-slate-200">
        <a href="/admin/dashboard" class="text-sm font-medium text-slate-500 hover:text-slate-900 pb-4 whitespace-nowrap">Dashboard Overview</a>
        <a href="/admin/workers" class="text-sm font-medium text-slate-500 hover:text-slate-900 pb-4 whitespace-nowrap">Worker Approvals</a>
        <a href="/admin/categories" class="text-sm font-medium text-slate-500 hover:text-slate-900 pb-4 whitespace-nowrap">Categories</a>
        <a href="/admin/skills" class="text-sm font-bold text-indigo-600 border-b-2 border-indigo-600 pb-4 -mb-[17px] whitespace-nowrap">Skills Management</a>
    </div>

    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Skills</h1>
            <p class="mt-2 text-sm text-slate-500 font-light">Manage granular skills assigned to workers and categories.</p>
        </div>
        <button class="inline-flex items-center justify-center px-4 py-2 text-sm font-semibold text-white transition-all bg-indigo-600 rounded-xl shadow-[0_4px_14px_0_rgb(79,70,229,0.39)] hover:shadow-[0_6px_20px_rgba(79,70,229,0.23)] hover:bg-indigo-700 hover:-translate-y-0.5">
            + Add Skill
        </button>
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
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-6 py-4 font-bold text-slate-900">Pipe Installation</td>
                    <td class="px-6 py-4"><span class="bg-slate-100 text-slate-600 px-2 py-1 rounded text-xs">Plumbing</span></td>
                    <td class="px-6 py-4">120</td>
                    <td class="px-6 py-4 text-right">
                        <button class="text-indigo-600 hover:text-indigo-800 text-sm font-semibold">Edit</button>
                    </td>
                </tr>
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-6 py-4 font-bold text-slate-900">Leak Detection</td>
                    <td class="px-6 py-4"><span class="bg-slate-100 text-slate-600 px-2 py-1 rounded text-xs">Plumbing</span></td>
                    <td class="px-6 py-4">85</td>
                    <td class="px-6 py-4 text-right">
                        <button class="text-indigo-600 hover:text-indigo-800 text-sm font-semibold">Edit</button>
                    </td>
                </tr>
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-6 py-4 font-bold text-slate-900">Circuit Wiring</td>
                    <td class="px-6 py-4"><span class="bg-slate-100 text-slate-600 px-2 py-1 rounded text-xs">Electrical</span></td>
                    <td class="px-6 py-4">64</td>
                    <td class="px-6 py-4 text-right">
                        <button class="text-indigo-600 hover:text-indigo-800 text-sm font-semibold">Edit</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
