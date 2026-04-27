@extends('layouts.app')

@section('content')
<div class="bg-slate-950 min-h-[calc(100vh-4rem)] pt-12 pb-24 text-white relative overflow-hidden -mt-16 pt-[6rem]">
    <div class="absolute inset-0 z-0">
        <div class="absolute top-0 right-[20%] w-[30%] h-[50%] bg-emerald-600/10 rounded-full blur-[120px]"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="mb-12 border-b border-white/10 pb-6">
            <h1 class="text-3xl font-extrabold tracking-tight mb-2 text-white">My Applications</h1>
            <p class="text-slate-400 font-light">Track the status of the missions you've applied for.</p>
        </div>

        <div class="overflow-hidden rounded-3xl border border-white/10 bg-slate-900/50 backdrop-blur-xl shadow-2xl">
            <table class="w-full text-left text-sm text-slate-300">
                <thead class="bg-white/5 text-xs uppercase text-slate-400">
                    <tr>
                        <th scope="col" class="px-6 py-4 font-semibold">Mission</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Client</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Your Bid</th>
                        <th scope="col" class="px-6 py-4 font-semibold">Status</th>
                        <th scope="col" class="px-6 py-4 font-semibold text-right">Action</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    <tr class="hover:bg-white/5 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="font-bold text-white group-hover:text-indigo-400 transition-colors">Fix leaking sink pipe</div>
                            <div class="text-xs text-slate-500 mt-1">Applied 2 hours ago</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-slate-800 flex items-center justify-center text-xs font-bold text-white">S</div>
                                <span>Sarah M.</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-mono">150 MAD</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-amber-500/10 text-amber-400 border border-amber-500/20">Pending</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="/worker/requests/show" class="text-indigo-400 hover:text-white transition-colors">View</a>
                        </td>
                    </tr>
                    <tr class="hover:bg-white/5 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="font-bold text-white group-hover:text-indigo-400 transition-colors">Paint living room walls</div>
                            <div class="text-xs text-slate-500 mt-1">Applied yesterday</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-slate-800 flex items-center justify-center text-xs font-bold text-white">Y</div>
                                <span>Youssef T.</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-mono">800 MAD</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-400 border border-emerald-500/20">Accepted</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="text-indigo-400 hover:text-white transition-colors">Contact</a>
                        </td>
                    </tr>
                    <tr class="hover:bg-white/5 transition-colors group opacity-50">
                        <td class="px-6 py-4">
                            <div class="font-bold text-white group-hover:text-indigo-400 transition-colors">Assemble IKEA Wardrobe</div>
                            <div class="text-xs text-slate-500 mt-1">Applied 3 days ago</div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 rounded-full bg-slate-800 flex items-center justify-center text-xs font-bold text-white">N</div>
                                <span>Nawal K.</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 font-mono">250 MAD</td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold bg-rose-500/10 text-rose-400 border border-rose-500/20">Declined</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <span class="text-slate-600 cursor-not-allowed">Closed</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
