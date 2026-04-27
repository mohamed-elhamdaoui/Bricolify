@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-6 lg:px-8 py-12">
    <div class="bg-white rounded-[2.5rem] border border-slate-200/60 p-8 md:p-12 shadow-sm relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-50/50 rounded-full blur-3xl z-0 pointer-events-none -translate-y-1/2 translate-x-1/3"></div>

        <div class="relative z-10 flex flex-col md:flex-row gap-8 items-start">
            <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-white shadow-xl shrink-0">
                <img src="https://ui-avatars.com/api/?name=Karim+B&background=6366f1&color=fff&size=256" alt="Profile" class="w-full h-full object-cover">
            </div>
            
            <div class="flex-grow">
                <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-4 mb-4">
                    <div>
                        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Karim B.</h1>
                        <p class="text-slate-500 font-medium">Professional Plumber</p>
                        <div class="flex items-center gap-2 mt-2 text-sm text-slate-500">
                            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            Casablanca, Morocco
                        </div>
                    </div>
                    
                    <a href="{{ url('/worker/profile/edit') }}" class="inline-flex px-5 py-2 text-sm font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 rounded-full transition-colors">
                        Edit Profile
                    </a>
                </div>

                <div class="flex items-center gap-6 mb-8">
                    <div>
                        <div class="text-2xl font-bold text-slate-900">4.9</div>
                        <div class="text-xs text-amber-400">★★★★★</div>
                    </div>
                    <div class="w-px h-8 bg-slate-200"></div>
                    <div>
                        <div class="text-2xl font-bold text-slate-900">120</div>
                        <div class="text-xs text-slate-500 font-medium uppercase tracking-wide">Jobs Done</div>
                    </div>
                    <div class="w-px h-8 bg-slate-200"></div>
                    <div>
                        <div class="text-xs font-mono font-bold text-emerald-600 bg-emerald-50 px-2 py-1 rounded border border-emerald-100">VERIFIED</div>
                        <div class="text-xs text-slate-500 font-medium mt-1">Identity Check</div>
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-sm font-bold text-slate-900 uppercase tracking-widest mb-3">About Me</h3>
                    <p class="text-slate-600 font-light leading-relaxed">
                        I am a certified plumber with over 8 years of experience. I specialize in leak detection, pipe replacement, and general bathroom renovations. I always make sure to leave the workspace clean and provide warranties for my jobs.
                    </p>
                </div>

                <div>
                    <h3 class="text-sm font-bold text-slate-900 uppercase tracking-widest mb-3">Skills</h3>
                    <div class="flex flex-wrap gap-2">
                        <span class="px-3 py-1 bg-white border border-slate-200 text-slate-600 text-sm rounded-full shadow-sm">Plumbing</span>
                        <span class="px-3 py-1 bg-white border border-slate-200 text-slate-600 text-sm rounded-full shadow-sm">Pipe Installation</span>
                        <span class="px-3 py-1 bg-white border border-slate-200 text-slate-600 text-sm rounded-full shadow-sm">Leak Repair</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
