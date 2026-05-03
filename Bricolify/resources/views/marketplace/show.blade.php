@extends('layouts.app')

@section('content')
<div class="bg-[#f8fafc] min-h-screen pt-24 pb-20">
    <div class="max-w-4xl mx-auto px-6 lg:px-8">
        {{-- Back Button --}}
        <a href="{{ route('requests.index') }}" class="inline-flex items-center gap-2 text-sm font-bold text-slate-500 hover:text-indigo-600 transition-colors mb-8 group">
            <svg class="w-4 h-4 transition-transform group-hover:-translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to Marketplace
        </a>

        <div class="bg-white rounded-[2.5rem] border border-slate-200/60 shadow-xl overflow-hidden">
            {{-- Content --}}
            <div class="p-8 md:p-12">
                <div class="flex flex-wrap items-center gap-3 mb-8">
                    <span class="px-4 py-1.5 rounded-full bg-indigo-50 text-indigo-600 text-xs font-bold border border-indigo-100 uppercase tracking-widest">
                        {{ $serviceRequest->category->name }}
                    </span>
                    <span class="px-4 py-1.5 rounded-full bg-slate-50 text-slate-500 text-xs font-bold border border-slate-100 uppercase tracking-widest flex items-center gap-2">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path></svg>
                        {{ $serviceRequest->location }}
                    </span>
                </div>

                @if($serviceRequest->image_url)
                    <div class="mb-10 rounded-3xl overflow-hidden border border-slate-200/60 shadow-sm">
                        <img src="{{ asset('storage/' . $serviceRequest->image_url) }}" alt="{{ $serviceRequest->title }}" class="w-full h-auto">
                    </div>
                @endif

                <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight mb-6">
                    {{ $serviceRequest->title }}
                </h1>

                <div class="flex items-center gap-4 mb-10 pb-8 border-b border-slate-50">
                    <div class="w-12 h-12 rounded-2xl bg-slate-900 text-white flex items-center justify-center font-bold text-lg shadow-lg">
                        {{ substr($serviceRequest->client->name ?? 'U', 0, 1) }}
                    </div>
                    <div>
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-0.5">Posted by</p>
                        <h4 class="text-base font-extrabold text-slate-900">{{ $serviceRequest->client->name ?? 'User' }}</h4>
                    </div>
                    <div class="ml-auto text-right">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-0.5">Date</p>
                        <h4 class="text-sm font-bold text-slate-900">{{ $serviceRequest->created_at->format('M d, Y') }}</h4>
                    </div>
                </div>

                <div class="prose prose-slate max-w-none mb-12">
                    <h3 class="text-xl font-bold text-slate-900 mb-4">Description</h3>
                    <p class="text-slate-600 leading-relaxed font-light whitespace-pre-line">{{ $serviceRequest->description }}</p>
                </div>

                {{-- Action Bar --}}
                <div class="flex items-center justify-between p-6 bg-slate-50 rounded-3xl border border-slate-100">
                    <div class="hidden sm:block">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Status</p>
                        <div class="flex items-center gap-2">
                            <div class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></div>
                            <span class="text-sm font-bold text-slate-900 uppercase">Open for Applications</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-4 w-full sm:w-auto">
                        @auth
                            @if(auth()->id() !== $serviceRequest->client_id && auth()->user()->isWorker())
                                @if($hasApplied)
                                    <div class="w-full px-8 py-4 bg-emerald-50 text-emerald-700 rounded-2xl font-bold border border-emerald-200 text-center">
                                        You have already applied
                                    </div>
                                @elseif(!auth()->user()->isApprovedWorker())
                                    <div class="w-full px-8 py-4 bg-amber-50 text-amber-700 rounded-2xl font-bold border border-amber-200 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                                            Pending Admin Approval
                                        </div>
                                    </div>
                                @else
                                    <form action="{{ route('worker.applications.store', $serviceRequest->id) }}" method="POST" class="flex-1 sm:flex-none">
                                        @csrf
                                        <button type="submit" class="w-full px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-xl shadow-indigo-600/20 hover:bg-indigo-700 hover:-translate-y-1 transition-all">
                                            Apply for this Mission
                                        </button>
                                    </form>
                                @endif
                            @elseif(auth()->id() === $serviceRequest->client_id)
                                <a href="{{ route('client.requests.show', $serviceRequest->id) }}" class="w-full sm:w-auto px-8 py-4 bg-slate-900 text-white rounded-2xl font-bold shadow-xl shadow-slate-900/10 hover:bg-slate-800 transition-all text-center">
                                    Manage My Request
                                </a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="w-full sm:w-auto px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold shadow-xl shadow-indigo-600/20 hover:bg-indigo-700 transition-all text-center">
                                Login to Apply
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
