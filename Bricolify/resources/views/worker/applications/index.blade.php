@extends('layouts.dashboard')

@section('content')
<div class="p-6 lg:p-8">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">My Applications</h1>
        <p class="mt-2 text-sm text-slate-500 font-light">Track the status of the missions you've applied for.</p>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200/60 shadow-sm overflow-hidden">
        <table class="w-full text-left text-sm text-slate-600">
            <thead class="bg-slate-50 text-xs uppercase text-slate-500 shadow-[0_1px_0_rgba(0,0,0,0.05)]">
                <tr>
                    <th scope="col" class="px-6 py-4 font-bold">Mission</th>
                    <th scope="col" class="px-6 py-4 font-bold">Client</th>
                    <th scope="col" class="px-6 py-4 font-bold">Your Bid</th>
                    <th scope="col" class="px-6 py-4 font-bold">Status</th>
                    <th scope="col" class="px-6 py-4 font-bold text-right">Action</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="font-bold text-slate-900 hover:text-indigo-600 transition-colors cursor-pointer">Fix leaking sink pipe</div>
                        <div class="text-xs text-slate-500 mt-1">Applied 2 hours ago</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-slate-100 flex items-center justify-center text-xs font-bold text-slate-700">S</div>
                            <span class="font-medium text-slate-700">Sarah M.</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 font-mono font-medium">150 MAD</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-bold bg-amber-50 text-amber-600 border border-amber-200">Pending</span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="{{ url('/worker/requests/show') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold text-sm transition-colors">View</a>
                    </td>
                </tr>
                <tr class="hover:bg-slate-50 transition-colors">
                    <td class="px-6 py-4">
                        <div class="font-bold text-slate-900 hover:text-indigo-600 transition-colors cursor-pointer">Paint living room walls</div>
                        <div class="text-xs text-slate-500 mt-1">Applied yesterday</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-slate-100 flex items-center justify-center text-xs font-bold text-slate-700">Y</div>
                            <span class="font-medium text-slate-700">Youssef T.</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 font-mono font-medium">800 MAD</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-bold bg-emerald-50 text-emerald-600 border border-emerald-200">Accepted</span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="#" class="text-indigo-600 hover:text-indigo-800 font-semibold text-sm transition-colors">Contact</a>
                    </td>
                </tr>
                <tr class="hover:bg-slate-50 transition-colors opacity-60">
                    <td class="px-6 py-4">
                        <div class="font-bold text-slate-900 hover:text-indigo-600 transition-colors cursor-pointer">Assemble IKEA Wardrobe</div>
                        <div class="text-xs text-slate-500 mt-1">Applied 3 days ago</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-2">
                            <div class="w-6 h-6 rounded-full bg-slate-100 flex items-center justify-center text-xs font-bold text-slate-700">N</div>
                            <span class="font-medium text-slate-700">Nawal K.</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 font-mono font-medium">250 MAD</td>
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md text-xs font-bold bg-rose-50 text-rose-600 border border-rose-200">Declined</span>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <span class="text-slate-400 font-medium text-sm">Closed</span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
