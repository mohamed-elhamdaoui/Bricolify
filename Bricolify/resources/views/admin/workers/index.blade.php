@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">
    <!-- Admin Navigation (Simulated) -->
    <div class="flex items-center gap-6 mb-8 overflow-x-auto pb-4 border-b border-slate-200">
        <a href="/admin/dashboard" class="text-sm font-medium text-slate-500 hover:text-slate-900 pb-4 whitespace-nowrap">Dashboard Overview</a>
        <a href="/admin/workers" class="text-sm font-bold text-indigo-600 border-b-2 border-indigo-600 pb-4 -mb-[17px] whitespace-nowrap">Worker Approvals</a>
        <a href="/admin/categories" class="text-sm font-medium text-slate-500 hover:text-slate-900 pb-4 whitespace-nowrap">Categories</a>
        <a href="/admin/skills" class="text-sm font-medium text-slate-500 hover:text-slate-900 pb-4 whitespace-nowrap">Skills Management</a>
    </div>

    <div class="mb-8 flex flex-col md:flex-row md:items-center justify-between gap-4">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Worker Approvals</h1>
            <p class="mt-2 text-sm text-slate-500 font-light">Review background checks and identities before activating worker accounts.</p>
        </div>
        <div class="relative w-full md:w-64">
            <svg class="w-5 h-5 absolute left-3 top-2.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            <input type="text" placeholder="Search workers..." class="w-full pl-10 pr-4 py-2 border border-slate-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 text-sm">
        </div>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200/60 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-slate-600">
                <thead class="bg-slate-50 text-xs uppercase text-slate-500 shadow-[0_1px_0_rgba(0,0,0,0.05)]">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-bold">Worker</th>
                        <th scope="col" class="px-6 py-4 font-bold">Registration Date</th>
                        <th scope="col" class="px-6 py-4 font-bold">Documents</th>
                        <th scope="col" class="px-6 py-4 font-bold">Status</th>
                        <th scope="col" class="px-6 py-4 font-bold text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($workers as $worker)
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold text-xs">{{ substr($worker->user->name, 0, 1) }}</div>
                                <div>
                                    <div class="font-bold text-slate-900">{{ $worker->user->name }}</div>
                                    <div class="text-xs text-slate-400">{{ $worker->user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-mono text-xs">{{ $worker->created_at->format('M d, Y') }}</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center text-xs text-emerald-600 bg-emerald-50 px-2 py-1 rounded border border-emerald-100">ID Uploaded</span>
                        </td>
                        <td class="px-6 py-4">
                            @if(!$worker->is_validated)
                                <x-badge type="warning">Pending</x-badge>
                            @else
                                <x-badge type="success">Active</x-badge>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            @if(!$worker->is_validated)
                            <form action="{{ route('admin.worker-profiles.validate', $worker) }}" method="POST" class="inline">
                                @csrf
                                <button type="submit" class="text-xs font-bold text-emerald-600 hover:bg-emerald-50 px-3 py-1.5 rounded-lg transition-colors border border-transparent hover:border-emerald-200">Approve</button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-slate-500 font-light">No workers found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
