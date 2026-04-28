@extends('layouts.app')

@section('content')
<div class="bg-white min-h-screen pt-24 pb-0 overflow-hidden">
    <!-- Hero Section -->
    <div class="relative bg-slate-50 py-24 lg:py-32 overflow-hidden border-b border-slate-200/60">
        <!-- Background Decor -->
        <div class="absolute inset-0 z-0 pointer-events-none">
            <div class="absolute top-[-20%] left-[-10%] w-[50%] h-[50%] rounded-full bg-indigo-500/5 blur-[120px]"></div>
            <div class="absolute bottom-[-20%] right-[-10%] w-[50%] h-[50%] rounded-full bg-violet-500/5 blur-[120px]"></div>
            
            <svg class="absolute top-0 right-0 w-full h-full opacity-[0.03] text-indigo-900" viewBox="0 0 100 100" preserveAspectRatio="none">
                <path d="M0,0 L100,0 L100,100 L0,100 Z" fill="url(#grid)"></path>
                <defs>
                    <pattern id="grid" width="4" height="4" patternUnits="userSpaceOnUse">
                        <path d="M 4 0 L 0 0 0 4" fill="none" stroke="currentColor" stroke-width="0.1"></path>
                    </pattern>
                </defs>
            </svg>
        </div>

        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10 text-center">
            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-indigo-50 text-indigo-700 text-sm font-bold uppercase tracking-widest border border-indigo-100 mb-8 shadow-sm">
                <span class="w-2 h-2 rounded-full bg-indigo-500 animate-pulse"></span>
                About Us
            </span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-slate-900 tracking-tight mb-6 leading-tight">
                Empowering Home <br class="hidden md:block"/> Service Connections
            </h1>
            <p class="text-lg md:text-xl text-slate-500 font-light max-w-3xl mx-auto leading-relaxed">
                Bricolify is Morocco's premier marketplace designed to effortlessly connect homeowners with vetted, high-quality service professionals. We are redefining trust and convenience in the home service industry.
            </p>
        </div>
    </div>

    <!-- Our Story Section -->
    <div class="py-24 max-w-7xl mx-auto px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-6">Our Story</h2>
                <div class="prose prose-slate text-slate-500 font-light leading-relaxed">
                    <p class="mb-4">
                        It started with a simple problem: finding reliable, skilled professionals for home repairs was too hard. Countless phone calls, unverified recommendations, and unpredictable pricing made a simple plumbing fix feel like a monumental task.
                    </p>
                    <p>
                        We built Bricolify to change that. By creating a transparent, review-driven platform, we empower clients to make informed decisions and give talented professionals a stage to showcase their skills and grow their businesses independently.
                    </p>
                </div>
            </div>
            
            <!-- Visual Mockup -->
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-tr from-indigo-500 to-violet-500 rounded-[3rem] transform rotate-3 scale-105 opacity-20 blur-xl"></div>
                <div class="bg-white rounded-[3rem] p-8 border border-slate-200/60 shadow-[0_20px_60px_rgb(0,0,0,0.08)] relative z-10">
                    <div class="flex gap-4 items-center border-b border-slate-100 pb-6 mb-6">
                        <div class="flex gap-2">
                            <div class="w-3 h-3 rounded-full bg-rose-400"></div>
                            <div class="w-3 h-3 rounded-full bg-amber-400"></div>
                            <div class="w-3 h-3 rounded-full bg-emerald-400"></div>
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="h-4 bg-slate-100 rounded-full w-3/4"></div>
                        <div class="h-4 bg-slate-100 rounded-full w-full"></div>
                        <div class="h-4 bg-slate-100 rounded-full w-5/6"></div>
                        <div class="grid grid-cols-2 gap-4 pt-6">
                            <div class="h-24 bg-indigo-50 rounded-2xl border border-indigo-100/50"></div>
                            <div class="h-24 bg-violet-50 rounded-2xl border border-violet-100/50"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- How it Works (Reused flow concept) -->
    <div class="bg-slate-50 py-24 border-y border-slate-200/60">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-4">How it works</h2>
                <p class="text-slate-500 font-light">Three simple steps to solve your home service needs.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
                <!-- Connecting Line (Desktop) -->
                <div class="hidden md:block absolute top-1/2 left-0 w-full h-0.5 bg-gradient-to-r from-indigo-200 via-violet-200 to-indigo-200 -z-0 -translate-y-1/2"></div>

                <!-- Step 1 -->
                <div class="bg-white p-8 rounded-3xl border border-slate-200/60 shadow-sm relative z-10 text-center hover:-translate-y-1.5 transition-all duration-300">
                    <div class="w-16 h-16 mx-auto bg-indigo-50 text-indigo-600 rounded-2xl flex items-center justify-center font-black text-xl mb-6 shadow-[0_4px_14px_0_rgb(79,70,229,0.2)]">1</div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Publish</h3>
                    <p class="text-sm text-slate-500 font-light">Post your service request with details, photos, and your preferred schedule.</p>
                </div>

                <!-- Step 2 -->
                <div class="bg-white p-8 rounded-3xl border border-slate-200/60 shadow-sm relative z-10 text-center hover:-translate-y-1.5 transition-all duration-300">
                    <div class="w-16 h-16 mx-auto bg-violet-50 text-violet-600 rounded-2xl flex items-center justify-center font-black text-xl mb-6 shadow-[0_4px_14px_0_rgb(139,92,246,0.2)]">2</div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Compare</h3>
                    <p class="text-sm text-slate-500 font-light">Review applications from verified professionals, check their ratings and past work.</p>
                </div>

                <!-- Step 3 -->
                <div class="bg-white p-8 rounded-3xl border border-slate-200/60 shadow-sm relative z-10 text-center hover:-translate-y-1.5 transition-all duration-300">
                    <div class="w-16 h-16 mx-auto bg-emerald-50 text-emerald-600 rounded-2xl flex items-center justify-center font-black text-xl mb-6 shadow-[0_4px_14px_0_rgb(16,185,129,0.2)]">3</div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Complete</h3>
                    <p class="text-sm text-slate-500 font-light">Hire the best fit, get the job done, and leave a review to help the community.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Why Trust Us -->
    <div class="py-24 max-w-7xl mx-auto px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-4">Why trust us</h2>
            <p class="text-slate-500 font-light">Built on transparency and quality.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-3xl border border-slate-200/60 shadow-sm hover:border-indigo-200 transition-colors">
                <div class="w-12 h-12 bg-emerald-50 text-emerald-600 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Verified Pros</h3>
                <p class="text-slate-500 font-light text-sm">Every professional undergoes a strict background and identity check before joining.</p>
            </div>
            
            <div class="bg-white p-8 rounded-3xl border border-slate-200/60 shadow-sm hover:border-violet-200 transition-colors">
                <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">Transparent Reviews</h3>
                <p class="text-slate-500 font-light text-sm">Real reviews from real clients. No edits, no deletions, just honest community feedback.</p>
            </div>

            <div class="bg-white p-8 rounded-3xl border border-slate-200/60 shadow-sm hover:border-rose-200 transition-colors">
                <div class="w-12 h-12 bg-rose-50 text-rose-600 rounded-xl flex items-center justify-center mb-6">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-900 mb-3">No Hidden Fees</h3>
                <p class="text-slate-500 font-light text-sm">What you agree on is what you pay. We don't take sneaky cuts from your agreed project price.</p>
            </div>
        </div>
    </div>

    <!-- Dark CTA Section -->
    <div class="bg-slate-950 py-24 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
        <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-indigo-600/20 rounded-full blur-[120px] -translate-y-1/2 translate-x-1/3"></div>
        
        <div class="max-w-4xl mx-auto px-6 lg:px-8 text-center relative z-10">
            <h2 class="text-4xl md:text-5xl font-extrabold text-white tracking-tight mb-6">
                Ready to transform how you maintain your home?
            </h2>
            <p class="text-lg text-slate-400 font-light mb-10 max-w-2xl mx-auto">
                Join thousands of homeowners and professionals building a better community on Bricolify.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register.view') }}" class="inline-flex justify-center items-center px-8 py-4 text-base font-bold text-slate-900 bg-white rounded-2xl shadow-[0_8px_30px_rgb(255,255,255,0.2)] hover:scale-105 transition-all duration-300">
                    Join Bricolify Today
                </a>
                <a href="{{ route('requests.index') }}" class="inline-flex justify-center items-center px-8 py-4 text-base font-bold text-white bg-white/10 backdrop-blur-md rounded-2xl border border-white/20 hover:bg-white/20 transition-all duration-300">
                    Browse Requests
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
