@extends('layouts.auth')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-16">
    <div class="relative z-10 w-full max-w-3xl">

        {{-- Logo --}}
        <div class="flex items-center justify-center gap-3 mb-10">
            <div class="bg-slate-900 text-white font-bold text-xl w-9 h-9 flex items-center justify-center rounded-lg shadow-sm">B</div>
            <span class="text-xl font-extrabold tracking-tight text-slate-900">Bricolify</span>
        </div>

        {{-- Header --}}
        <div class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">How do you want to use Bricolify?</h1>
            <p class="text-slate-500 font-light mt-2 text-base">Click a card to get started. You can always switch later.</p>
        </div>

        {{-- Hidden form for client submit --}}
        <form id="clientForm" action="{{ route('onboarding.client') }}" method="POST" class="hidden">
            @csrf
        </form>

        {{-- Choice Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Card 1 — Client --}}
            <div id="clientCard"
                 class="border-2 border-slate-200 hover:border-indigo-400 bg-white rounded-3xl p-8 cursor-pointer transition-all duration-200 hover:-translate-y-1 hover:shadow-xl hover:shadow-indigo-100/50 group flex flex-col select-none">

                <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-200">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </div>

                <h2 class="text-xl font-extrabold text-slate-900 mb-2 group-hover:text-indigo-600 transition-colors">I want to hire</h2>
                <p class="text-slate-500 font-light text-sm leading-relaxed mb-8 flex-grow">Post jobs and find verified professionals near you. Get your home fixed fast.</p>

                <div class="w-full bg-indigo-600 text-white py-3 rounded-xl font-semibold text-sm text-center group-hover:bg-indigo-700 transition-colors">
                    Continue as Client
                </div>
            </div>

            {{-- Card 2 — Worker --}}
            <a id="workerCard"
               href="{{ route('onboarding.worker.create') }}"
               class="border-2 border-slate-200 hover:border-violet-400 bg-white rounded-3xl p-8 cursor-pointer transition-all duration-200 hover:-translate-y-1 hover:shadow-xl hover:shadow-violet-100/50 group flex flex-col select-none no-underline">

                <div class="w-14 h-14 bg-violet-50 text-violet-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-violet-600 group-hover:text-white transition-all duration-200">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    </svg>
                </div>

                <h2 class="text-xl font-extrabold text-slate-900 mb-2 group-hover:text-violet-600 transition-colors">I want to work</h2>
                <p class="text-slate-500 font-light text-sm leading-relaxed mb-8 flex-grow">Apply to jobs, build your reputation, and grow your income in Morocco.</p>

                <div class="w-full bg-slate-900 text-white py-3 rounded-xl font-semibold text-sm text-center group-hover:bg-slate-800 transition-colors">
                    Become a Professional
                </div>
            </a>

        </div>

        {{-- Footer note --}}
        <p class="text-center text-xs text-slate-400 font-light mt-8">
            Signed in as <span class="font-semibold text-slate-500">{{ auth()->user()->email }}</span> ·
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-indigo-600 hover:text-indigo-700 font-medium">Sign out</button>
            </form>
        </p>

    </div>
</div>

{{-- Vanilla JS: make entire client card submit the hidden form --}}
<script>
    document.getElementById('clientCard').addEventListener('click', function () {
        document.getElementById('clientForm').submit();
    });
</script>
@endsection
