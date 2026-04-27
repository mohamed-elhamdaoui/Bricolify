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
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-700 font-bold text-xs">M</div>
                                <div>
                                    <div class="font-bold text-slate-900">Mourad Said</div>
                                    <div class="text-xs text-slate-400">mourad@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-mono text-xs">Oct 24, 2026</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center text-xs text-emerald-600 bg-emerald-50 px-2 py-1 rounded border border-emerald-100">ID Uploaded</span>
                        </td>
                        <td class="px-6 py-4">
                            <x-badge type="warning">Pending</x-badge>
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button class="text-xs font-bold text-emerald-600 hover:bg-emerald-50 px-3 py-1.5 rounded-lg transition-colors border border-transparent hover:border-emerald-200">Approve</button>
                            <button class="text-xs font-bold text-rose-600 hover:bg-rose-50 px-3 py-1.5 rounded-lg transition-colors border border-transparent hover:border-rose-200">Reject</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-slate-100 flex items-center justify-center text-slate-700 font-bold text-xs">A</div>
                                <div>
                                    <div class="font-bold text-slate-900">Amine B.</div>
                                    <div class="text-xs text-slate-400">amine@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-mono text-xs">Oct 23, 2026</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center text-xs text-rose-600 bg-rose-50 px-2 py-1 rounded border border-rose-100">Missing ID</span>
                        </td>
                        <td class="px-6 py-4">
                            <x-badge type="danger">Incomplete</x-badge>
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button class="text-xs font-bold text-indigo-600 hover:bg-indigo-50 px-3 py-1.5 rounded-lg transition-colors border border-transparent hover:border-indigo-200">Remind</button>
                        </td>
                    </tr>
                    <tr class="hover:bg-slate-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <img src="https://ui-avatars.com/api/?name=Karim+B&background=6366f1&color=fff" class="w-8 h-8 rounded-full" alt="Worker">
                                <div>
                                    <div class="font-bold text-slate-900">Karim B.</div>
                                    <div class="text-xs text-slate-400">karim@example.com</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-mono text-xs">Oct 20, 2026</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center text-xs text-emerald-600 bg-emerald-50 px-2 py-1 rounded border border-emerald-100">All Clear</span>
                        </td>
                        <td class="px-6 py-4">
                            <x-badge type="success">Active</x-badge>
                        </td>
                        <td class="px-6 py-4 text-right space-x-2">
                            <button class="text-xs font-bold text-slate-600 hover:bg-slate-100 px-3 py-1.5 rounded-lg transition-colors border border-transparent hover:border-slate-200">Suspend</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
