@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-12">
    
    <div class="mb-8">
        <a href="{{ url('/client/requests') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-slate-900 mb-6 transition-colors">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to my requests
        </a>
        <div class="flex flex-col md:flex-row md:items-start justify-between gap-4">
            <div>
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Fix leaking sink pipe in Kitchen</h1>
                <div class="flex gap-3 mt-3 items-center">
                    <span class="text-xs font-bold uppercase tracking-wider bg-sky-50 text-sky-600 px-2.5 py-1 rounded-full border border-sky-100">Plumbing</span>
                    <span class="text-slate-400 text-sm font-medium">Casablanca</span>
                    <span class="text-slate-400 text-sm font-medium">•</span>
                    <span class="text-slate-400 text-sm font-medium">Posted 2 days ago</span>
                </div>
            </div>
            <x-badge type="warning">3 Quotes Received</x-badge>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-3xl border border-slate-200/60 p-8 shadow-sm">
                <h2 class="text-lg font-bold text-slate-900 mb-4">Description</h2>
                <div class="prose prose-slate max-w-none font-light text-slate-600 leading-relaxed">
                    <p>The pipe under the kitchen sink is leaking continuously. It seems to be coming from the U-bend section. I have placed a bucket under it for now, but it fills up quite fast when we use the water.</p>
                    <p>Need someone to replace the U-bend and check the seals. Parts might be needed.</p>
                </div>
            </div>

            <x-alert type="info">Review the applicants below and choose the one that best fits your needs. Once accepted, they will be notified.</x-alert>
        </div>

        <!-- Sidebar / Applicants -->
        <div class="lg:col-span-1 space-y-6">
            <h2 class="text-lg font-bold text-slate-900">Applicants (3)</h2>
            
            <div class="space-y-4">
                <!-- Applicant 1 -->
                <div class="bg-white rounded-2xl border border-slate-200/60 p-5 shadow-sm hover:border-indigo-200 transition-colors group">
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex items-center gap-3">
                            <img src="https://ui-avatars.com/api/?name=Karim+B&background=6366f1&color=fff" class="w-10 h-10 rounded-full" alt="Worker">
                            <div>
                                <h4 class="font-bold text-sm text-slate-900 group-hover:text-indigo-600 transition-colors">Karim B.</h4>
                                <div class="flex items-center text-xs text-amber-400">
                                    <span>★ 4.9</span>
                                    <span class="text-slate-400 ml-1">(120 reviews)</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="font-bold text-slate-900">150 MAD</div>
                            <div class="text-[10px] text-slate-400 uppercase">Est. Cost</div>
                        </div>
                    </div>
                    <p class="text-sm text-slate-500 font-light mb-4 line-clamp-2">I can bring the replacement parts for standard sizes. Available tomorrow morning.</p>
                    <button class="w-full py-2 bg-indigo-50 text-indigo-700 font-semibold rounded-xl text-sm hover:bg-indigo-600 hover:text-white transition-all">Accept Offer</button>
                </div>

                <!-- Applicant 2 -->
                <div class="bg-white rounded-2xl border border-slate-200/60 p-5 shadow-sm hover:border-emerald-200 transition-colors group">
                    <div class="flex items-start justify-between mb-3">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-slate-900 text-white flex items-center justify-center font-bold">M</div>
                            <div>
                                <h4 class="font-bold text-sm text-slate-900 group-hover:text-emerald-600 transition-colors">Mourad S.</h4>
                                <div class="flex items-center text-xs text-amber-400">
                                    <span>★ 4.7</span>
                                    <span class="text-slate-400 ml-1">(45 reviews)</span>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <div class="font-bold text-slate-900">120 MAD</div>
                            <div class="text-[10px] text-slate-400 uppercase">Est. Cost</div>
                        </div>
                    </div>
                    <p class="text-sm text-slate-500 font-light mb-4 line-clamp-2">Experienced plumber. Can fix this today if you need it urgently.</p>
                    <button class="w-full py-2 bg-slate-50 text-slate-700 font-semibold rounded-xl text-sm hover:bg-slate-900 hover:text-white transition-all">Accept Offer</button>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
