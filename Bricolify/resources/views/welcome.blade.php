@extends('layouts.app')

@section('content')
    <section class="relative pt-32 pb-24 lg:pt-40 lg:pb-32 bg-slate-50 overflow-hidden">
    <div class="absolute inset-0 z-0">
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-indigo-500/5 rounded-full blur-[100px]"></div>
        <div class="absolute bottom-0 left-[-100px] w-[400px] h-[400px] bg-emerald-500/5 rounded-full blur-[100px]"></div>
    </div>

    <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-12 items-center">

            <div class="pr-0 lg:pr-8">
                <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-white border border-slate-200 shadow-sm mb-8">
                    <span class="w-2 h-2 rounded-full bg-indigo-500 animate-pulse"></span>
                    <span class="text-xs font-semibold text-slate-700 tracking-wide">
                        Sunday evening in Casablanca? <span class="text-indigo-600 font-bold">Pros are ready.</span>
                    </span>
                </div>

                <h1 class="text-5xl sm:text-6xl font-extrabold tracking-tight text-slate-900 leading-[1.1] mb-6">
                    Fix your home. <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-violet-600">Zero headache.</span>
                </h1>

                <p class="text-lg text-slate-500 mb-10 leading-relaxed font-light max-w-lg">
                    Book verified professionals for repairs and renovations. Clear pricing, guaranteed quality, and seamless tracking from start to finish.
                </p>

                <div class="bg-white p-2.5 rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.06)] border border-slate-200 flex items-center w-full max-w-md relative group hover:border-indigo-300 transition-colors">
                    <div class="pl-3 pr-2 text-indigo-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </div>
                    <input type="text" placeholder="What do you need help with?" class="w-full py-2.5 px-2 text-slate-700 bg-transparent border-none focus:ring-0 outline-none placeholder-slate-400 font-medium text-sm">
                    <button class="bg-indigo-600 text-white px-6 py-2.5 rounded-xl font-bold hover:bg-indigo-700 transition-colors shadow-md whitespace-nowrap text-sm">
                        Find Pro
                    </button>

                    <div class="absolute -right-12 -top-10 text-slate-300 hidden xl:block">
                        <svg width="60" height="60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="M12 5l7 7-7 7"></path></svg>
                    </div>
                </div>

                <div class="mt-8 flex items-center gap-6 text-xs font-semibold text-slate-500 uppercase tracking-wider">
                    <div class="flex items-center gap-2">
                        <div class="w-5 h-5 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600">&check;</div>
                        Vetted Experts
                    </div>
                    <div class="flex items-center gap-2">
                        <div class="w-5 h-5 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600">&#9733;</div>
                        Verified Reviews
                    </div>
                </div>
            </div>

            <div class="relative h-[650px] w-full">
                <div class="grid grid-cols-2 md:grid-cols-3 gap-5 h-full absolute inset-0 transform rotate-2 hover:rotate-0 transition-transform duration-700 ease-out">

                    <div class="flex flex-col gap-5 -mt-8">
                        <div class="h-64 w-full rounded-3xl overflow-hidden shadow-lg border border-slate-200/50 bg-white">
                            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?q=80&w=800&auto=format&fit=crop" alt="Clean Home Interior" class="w-full h-full object-cover">
                        </div>
                        <div class="h-40 w-full rounded-3xl bg-white shadow-xl border border-slate-100 p-5 flex flex-col justify-center relative overflow-hidden">
                            <div class="absolute -right-4 -top-4 w-16 h-16 bg-emerald-50 rounded-full"></div>
                            <div class="flex items-center gap-1 text-emerald-500 mb-2">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            </div>
                            <h4 class="font-bold text-slate-900 text-lg">4.9/5 Rating</h4>
                            <p class="text-xs text-slate-500 mt-1">Based on 2.5k reviews</p>
                        </div>
                        <div class="h-48 w-full rounded-3xl overflow-hidden shadow-lg border border-slate-200/50">
                            <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?q=80&w=800&auto=format&fit=crop" alt="Engineering tools" class="w-full h-full object-cover">
                        </div>
                    </div>

                    <div class="flex flex-col gap-5 mt-16 z-10">
                        <div class="bg-indigo-600 text-white rounded-3xl p-5 shadow-2xl shadow-indigo-600/30 flex items-center justify-between">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center backdrop-blur-md">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                </div>
                                <div>
                                    <p class="text-xs text-indigo-200 font-medium">Mission Status</p>
                                    <p class="font-bold text-sm">Completed</p>
                                </div>
                            </div>
                        </div>
                        <div class="h-72 w-full rounded-3xl overflow-hidden shadow-xl border border-slate-200/50 relative group">
                            <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-transparent transition-colors z-10"></div>
                            <img src="https://images.unsplash.com/photo-1584622650111-993a426fbf0a?q=80&w=800&auto=format&fit=crop" alt="Modern landscaping" class="w-full h-full object-cover">
                        </div>
                        <div class="h-40 w-full rounded-3xl overflow-hidden shadow-lg border border-slate-200/50">
                            <img src="https://images.unsplash.com/photo-1621905251189-08b45d6a269e?q=80&w=800&auto=format&fit=crop" alt="Clean electrical work" class="w-full h-full object-cover">
                        </div>
                    </div>

                    <div class="hidden md:flex flex-col gap-5 mt-4">
                        <div class="h-48 w-full rounded-3xl overflow-hidden shadow-lg border border-slate-200/50 bg-white">
                            <img src="https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?q=80&w=800&auto=format&fit=crop" alt="Modern carpentry" class="w-full h-full object-cover grayscale-[30%] hover:grayscale-0 transition-all">
                        </div>
                        <div class="h-56 w-full rounded-3xl overflow-hidden shadow-lg border border-slate-200/50 relative p-6 bg-slate-900 text-white flex flex-col justify-end">
                            <div class="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_top_right,_var(--tw-gradient-stops))] from-indigo-300 via-transparent to-transparent"></div>
                            <h4 class="font-bold text-lg relative z-10">100% Secure</h4>
                            <p class="text-xs text-slate-400 mt-2 relative z-10">No cash needed. Pay online securely after the mission is completed.</p>
                        </div>
                        <div class="h-32 w-full rounded-3xl overflow-hidden shadow-lg border border-slate-200/50">
                            <img src="https://images.unsplash.com/photo-1581578731548-c64695cc6952?q=80&w=800&auto=format&fit=crop" alt="Pristine cleaning" class="w-full h-full object-cover">
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>

    <section id="how-it-works" class="py-24 lg:py-32 bg-white relative">
        <div class="absolute inset-0 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:24px_24px] opacity-30"></div>
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">

            <div class="text-center mb-20">
                <h2 class="text-xs font-bold text-indigo-600 tracking-widest uppercase mb-3">Workflow</h2>
                <h3 class="text-3xl md:text-5xl font-extrabold text-slate-900 tracking-tight">From broken to fixed.</h3>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative">
                <div class="hidden md:block absolute top-10 left-[15%] right-[15%] h-px bg-gradient-to-r from-transparent via-slate-200 to-transparent">
                    <div class="absolute top-0 left-0 h-full w-1/3 bg-gradient-to-r from-transparent via-indigo-400 to-transparent opacity-50 blur-sm"></div>
                </div>

                <div class="flex flex-col items-center text-center group">
                    <div class="w-20 h-20 bg-white border border-slate-200 shadow-[0_8px_30px_rgb(0,0,0,0.04)] rounded-3xl flex items-center justify-center mb-8 relative transition-transform duration-500 group-hover:-translate-y-2 group-hover:shadow-[0_12px_40px_rgb(79,70,229,0.1)] group-hover:border-indigo-100">
                        <div class="absolute -top-3 -right-3 w-8 h-8 bg-slate-900 text-white text-sm font-bold rounded-full flex items-center justify-center shadow-lg">1</div>
                        <svg class="w-8 h-8 text-slate-700 group-hover:text-indigo-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3">Publish Request</h4>
                    <p class="text-slate-500 leading-relaxed font-light">Describe your problem, select the category, and post it to our marketplace in seconds.</p>
                </div>

                <div class="flex flex-col items-center text-center group">
                    <div class="w-20 h-20 bg-white border border-slate-200 shadow-[0_8px_30px_rgb(0,0,0,0.04)] rounded-3xl flex items-center justify-center mb-8 relative transition-transform duration-500 group-hover:-translate-y-2 group-hover:shadow-[0_12px_40px_rgb(79,70,229,0.1)] group-hover:border-indigo-100">
                        <div class="absolute -top-3 -right-3 w-8 h-8 bg-slate-900 text-white text-sm font-bold rounded-full flex items-center justify-center shadow-lg">2</div>
                        <svg class="w-8 h-8 text-slate-700 group-hover:text-indigo-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3">Compare & Choose</h4>
                    <p class="text-slate-500 leading-relaxed font-light">Review applications from local pros. Check their ratings, skills, and choose the best fit.</p>
                </div>

                <div class="flex flex-col items-center text-center group">
                    <div class="w-20 h-20 bg-white border border-slate-200 shadow-[0_8px_30px_rgb(0,0,0,0.04)] rounded-3xl flex items-center justify-center mb-8 relative transition-transform duration-500 group-hover:-translate-y-2 group-hover:shadow-[0_12px_40px_rgb(79,70,229,0.1)] group-hover:border-indigo-100">
                        <div class="absolute -top-3 -right-3 w-8 h-8 bg-slate-900 text-white text-sm font-bold rounded-full flex items-center justify-center shadow-lg">3</div>
                        <svg class="w-8 h-8 text-slate-700 group-hover:text-indigo-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    </div>
                    <h4 class="text-xl font-bold text-slate-900 mb-3">Mission Accomplished</h4>
                    <p class="text-slate-500 leading-relaxed font-light">The worker completes the job. You review their work and leave a rating for the community.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="services" class="py-24 lg:py-32 bg-[#fafafa]">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
                <div>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight mb-3">Browse Services</h2>
                    <p class="text-lg text-slate-500 font-light">Find the right expert for every corner of your home.</p>
                </div>
                <a href="{{ route('categories.index') }}" class="group inline-flex items-center gap-1.5 text-sm font-semibold text-indigo-600 bg-indigo-50 hover:bg-indigo-100 px-4 py-2 rounded-full transition-colors">
                    View all categories
                    <svg class="w-4 h-4 group-hover:translate-x-0.5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($categories as $category)
                <a href="{{ route('workers.index', ['category' => $category->slug]) }}" class="group relative bg-white p-6 rounded-3xl border border-slate-200/60 shadow-[0_2px_10px_rgba(0,0,0,0.02)] hover:shadow-[0_20px_40px_-15px_rgba(0,0,0,0.05)] hover:-translate-y-1.5 transition-all duration-300 overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-indigo-50/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:bg-indigo-600 group-hover:text-white transition-all duration-300 shadow-sm text-2xl">
                            @if($category->icon)
                                {{ $category->icon }}
                            @else
                                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                            @endif
                        </div>
                        <h3 class="text-lg font-bold text-slate-900 mb-1">{{ $category->name }}</h3>
                        <p class="text-sm text-slate-500 mb-6 font-light">{{ $category->description ?? 'Expert services available' }}</p>
                        <div class="flex items-center justify-between border-t border-slate-100 pt-4">
                            <div class="flex items-center gap-2">
                                <span class="relative flex h-2 w-2"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span><span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span></span>
                                <span class="text-xs font-medium text-slate-600">Available</span>
                            </div>
                            <svg class="w-4 h-4 text-slate-300 group-hover:text-indigo-600 transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>



    <section id="why-us" class="py-24 lg:py-32 bg-white relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">

            <div>
                <h2 class="text-xs font-bold text-indigo-600 tracking-widest uppercase mb-3">Infrastructure of Trust</h2>
                <h3 class="text-3xl md:text-5xl font-extrabold text-slate-900 tracking-tight mb-6 leading-tight">Designed to eliminate anxiety from repairs.</h3>

                <div class="space-y-8 mt-12">
                    <div class="flex gap-5 group">
                        <div class="w-12 h-12 rounded-2xl bg-slate-50 border border-slate-200 text-slate-700 flex items-center justify-center flex-shrink-0 group-hover:bg-emerald-50 group-hover:text-emerald-600 group-hover:border-emerald-200 transition-colors shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-slate-900 mb-2">Verified Professionals</h4>
                            <p class="text-slate-500 text-base leading-relaxed font-light">Every worker on our platform goes through admin validation. No anonymous accounts, just real experts.</p>
                        </div>
                    </div>

                    <div class="flex gap-5 group">
                        <div class="w-12 h-12 rounded-2xl bg-slate-50 border border-slate-200 text-slate-700 flex items-center justify-center flex-shrink-0 group-hover:bg-indigo-50 group-hover:text-indigo-600 group-hover:border-indigo-200 transition-colors shadow-sm">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-slate-900 mb-2">Total Transparency</h4>
                            <p class="text-slate-500 text-base leading-relaxed font-light">Read authentic reviews from previous clients before you make a decision. You are always in control.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative h-[500px] w-full bg-slate-50/50 rounded-[3rem] border border-slate-200/60 p-8 shadow-inner overflow-hidden flex flex-col gap-4">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-white/50 z-10 pointer-events-none"></div>

                <div class="bg-white border border-slate-200/80 rounded-3xl p-6 shadow-sm w-3/4 self-end transform translate-x-4 hover:-translate-x-2 transition-transform duration-500">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-tr from-indigo-100 to-indigo-50 flex items-center justify-center text-indigo-700 font-bold text-xl">4.9</div>
                        <div>
                            <div class="flex text-amber-400 text-sm">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                            <div class="text-xs font-bold text-slate-900 mt-1">Average Pro Rating</div>
                        </div>
                    </div>
                    <div class="h-2 bg-slate-100 rounded-full w-full overflow-hidden">
                        <div class="h-full bg-indigo-500 w-[98%] rounded-full"></div>
                    </div>
                </div>

                <div class="bg-slate-900 border border-slate-800 rounded-3xl p-6 shadow-2xl w-5/6 self-start transform -translate-x-4 z-20 hover:translate-x-2 transition-transform duration-500">
                    <div class="flex justify-between items-center mb-6">
                        <span class="text-slate-400 text-xs font-mono">auth_status: verified</span>
                        <div class="w-2 h-2 rounded-full bg-emerald-500 shadow-[0_0_10px_rgb(16,185,129)]"></div>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded-full bg-slate-800 border border-slate-700 flex items-center justify-center">
                            <svg class="w-6 h-6 text-emerald-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <div class="text-white font-bold text-sm">Identity Verified</div>
                            <div class="text-slate-400 text-xs mt-1">National ID &bull; Phone &bull; Email</div>
                        </div>
                    </div>
                </div>

                <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-indigo-500/10 rounded-full blur-3xl"></div>
            </div>

        </div>
    </section>

    <section id="workers" class="py-24 lg:py-32 bg-slate-950 text-white relative overflow-hidden border-t border-slate-800">
        <div class="absolute inset-0 z-0">
            <div class="absolute top-[-20%] right-[-10%] w-[50%] h-[50%] bg-indigo-600/20 rounded-full blur-[120px]"></div>
            <div class="absolute bottom-[-20%] left-[-10%] w-[50%] h-[50%] bg-violet-600/20 rounded-full blur-[120px]"></div>
            <div class="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px]"></div>
        </div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center relative z-10">

            <div>
                <h2 class="text-3xl md:text-5xl font-extrabold tracking-tight mb-6 leading-tight text-white">
                    Built for professionals. <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-400 to-violet-400">Expand your business.</span>
                </h2>
                <p class="text-slate-400 text-lg mb-10 leading-relaxed font-light">
                    Stop waiting for the phone to ring. Join Bricolify to browse hundreds of client requests in your city. Build your profile, collect reviews, and secure your schedule.
                </p>

                <div class="space-y-5 mb-10">
                    <div class="flex items-start gap-4">
                        <div class="w-6 h-6 rounded-full bg-indigo-500/20 border border-indigo-500/30 flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-3.5 h-3.5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <p class="text-slate-300 font-medium">Apply only to missions that fit your schedule.</p>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-6 h-6 rounded-full bg-indigo-500/20 border border-indigo-500/30 flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-3.5 h-3.5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <p class="text-slate-300 font-medium">Showcase your skills with multiple category tags.</p>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-6 h-6 rounded-full bg-indigo-500/20 border border-indigo-500/30 flex items-center justify-center flex-shrink-0 mt-1">
                            <svg class="w-3.5 h-3.5 text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                        </div>
                        <p class="text-slate-300 font-medium">Build reputation through a verified review system.</p>
                    </div>
                </div>

                <a href="{{ route('register.view') }}" class="inline-flex justify-center items-center bg-white text-slate-900 text-base font-bold px-8 py-4 rounded-2xl hover:bg-slate-100 transition-all shadow-[0_0_20px_rgba(255,255,255,0.1)] hover:-translate-y-1">
                    Create Worker Account
                </a>
            </div>

            <div class="bg-slate-900/50 backdrop-blur-xl border border-white/10 rounded-3xl p-6 shadow-2xl relative">
                <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-indigo-500/50 to-transparent"></div>

                <div class="flex justify-between items-center mb-8">
                    <div class="flex items-center gap-3">
                        <div class="w-3 h-3 rounded-full bg-emerald-500 shadow-[0_0_10px_rgb(16,185,129)]"></div>
                        <h4 class="text-white font-bold tracking-wide text-sm">Marketplace Feed</h4>
                    </div>
                    <span class="bg-white/5 border border-white/10 text-xs px-3 py-1.5 rounded-full text-slate-300 font-mono">Casablanca</span>
                </div>

                <div class="space-y-4">
                    @forelse($requests as $request)
                    <div class="bg-white/5 p-5 rounded-2xl border border-white/5 hover:border-white/20 transition-all cursor-pointer group">
                        <div class="flex justify-between items-start mb-3">
                            <h5 class="font-bold text-slate-100 group-hover:text-indigo-400 transition-colors">{{ $request->title }}</h5>
                            <span class="text-[10px] font-bold uppercase tracking-wider bg-sky-500/10 border border-sky-500/20 text-sky-400 px-2 py-1 rounded-full">{{ $request->category->name ?? 'General' }}</span>
                        </div>
                        <p class="text-sm text-slate-400 mb-4 font-light">{{ Str::limit($request->description, 80) }}</p>
                        <div class="flex justify-between items-center text-xs font-medium text-slate-500">
                            <span>By {{ $request->client->name ?? 'Client' }}</span>
                            <span>{{ $request->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    @empty
                    <div class="text-slate-400 text-sm">No recent missions in your area.</div>
                    @endforelse
                </div>
            </div>

        </div>
    </section>

    <section class="py-24 bg-[#fafafa] border-t border-slate-200/60">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">

            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-24">
                <div class="flex flex-col items-center justify-center p-6 bg-white rounded-3xl border border-slate-200/50 shadow-sm">
                    <div class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-slate-900 to-slate-600 mb-2">2.5k+</div>
                    <div class="text-xs font-bold text-slate-500 uppercase tracking-widest">Missions Done</div>
                </div>
                <div class="flex flex-col items-center justify-center p-6 bg-white rounded-3xl border border-slate-200/50 shadow-sm">
                    <div class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-slate-900 to-slate-600 mb-2">450+</div>
                    <div class="text-xs font-bold text-slate-500 uppercase tracking-widest">Verified Pros</div>
                </div>
                <div class="flex flex-col items-center justify-center p-6 bg-white rounded-3xl border border-slate-200/50 shadow-sm">
                    <div class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-slate-900 to-slate-600 mb-2">4.8</div>
                    <div class="text-xs font-bold text-slate-500 uppercase tracking-widest">Avg Rating</div>
                </div>
                <div class="flex flex-col items-center justify-center p-6 bg-white rounded-3xl border border-slate-200/50 shadow-sm">
                    <div class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-slate-900 to-slate-600 mb-2">12</div>
                    <div class="text-xs font-bold text-slate-500 uppercase tracking-widest">Cities</div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white p-8 rounded-3xl border border-slate-200/60 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex text-amber-400 mb-6 text-sm">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                    <p class="text-slate-600 mb-8 font-light leading-relaxed">"Absolutely brilliant platform. My heater broke down on a weekend. I posted a request and within 10 minutes I had 3 quotes. The guy who came was professional."</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-100 to-indigo-50 flex items-center justify-center text-indigo-700 font-bold text-sm">Y</div>
                        <div>
                            <div class="text-sm font-bold text-slate-900">Youssef T.</div>
                            <div class="text-xs text-slate-500">Client</div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl border border-slate-200/60 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex text-amber-400 mb-6 text-sm">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                    <p class="text-slate-600 mb-8 font-light leading-relaxed">"As a freelance carpenter, this app changed my life. I don't need to hunt for clients anymore. The dashboard is clean, and applying to jobs is seamless."</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-emerald-100 to-emerald-50 flex items-center justify-center text-emerald-700 font-bold text-sm">A</div>
                        <div>
                            <div class="text-sm font-bold text-slate-900">Ahmed M.</div>
                            <div class="text-xs text-slate-500">Pro Worker</div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-3xl border border-slate-200/60 shadow-sm hover:shadow-md transition-shadow">
                    <div class="flex text-amber-400 mb-6 text-sm">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                    <p class="text-slate-600 mb-8 font-light leading-relaxed">"The UI is so clean. No complicated menus. I just select 'Cleaning', write what I need, and wait. Seeing reviews before accepting gives total peace of mind."</p>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-br from-rose-100 to-rose-50 flex items-center justify-center text-rose-700 font-bold text-sm">N</div>
                        <div>
                            <div class="text-sm font-bold text-slate-900">Nadia K.</div>
                            <div class="text-xs text-slate-500">Client</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white relative overflow-hidden">
        <div class="max-w-5xl mx-auto px-6 lg:px-8">
            <div class="bg-slate-900 rounded-[3rem] p-12 md:p-20 text-center relative overflow-hidden shadow-2xl border border-slate-800">
                <div class="absolute top-0 right-0 w-96 h-96 bg-indigo-500/20 rounded-full blur-[80px] -translate-y-1/2 translate-x-1/3"></div>
                <div class="absolute bottom-0 left-0 w-96 h-96 bg-violet-500/20 rounded-full blur-[80px] translate-y-1/2 -translate-x-1/3"></div>

                <div class="relative z-10">
                    <h2 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight mb-6">Ready to get started?</h2>
                    <p class="text-slate-400 text-lg mb-10 max-w-2xl mx-auto font-light">
                        Join thousands of users who have modernized how they handle home maintenance. Create a free account today.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('register.view') }}" class="bg-white text-slate-900 text-base font-bold px-10 py-4 rounded-2xl hover:scale-105 transition-transform shadow-[0_0_30px_rgba(255,255,255,0.15)]">
                            Sign Up Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

