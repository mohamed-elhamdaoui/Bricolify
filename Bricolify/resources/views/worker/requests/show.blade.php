@extends('layouts.app')

@section('content')
<div class="bg-slate-950 min-h-[calc(100vh-4rem)] pt-12 pb-24 text-white relative overflow-hidden -mt-16 pt-[6rem]">
    <div class="absolute inset-0 z-0">
        <div class="absolute top-[-10%] right-0 w-[40%] h-[40%] bg-indigo-600/10 rounded-full blur-[100px]"></div>
    </div>

    <div class="max-w-5xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="mb-8">
            <a href="{{ url('/worker/requests') }}" class="inline-flex items-center text-sm font-medium text-slate-400 hover:text-white mb-6 transition-colors">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back to Marketplace
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Details -->
            <div class="lg:col-span-2">
                <div class="bg-slate-900/50 backdrop-blur-xl border border-white/10 rounded-3xl p-8 shadow-2xl mb-8">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="text-[10px] font-bold uppercase tracking-wider bg-sky-500/10 border border-sky-500/20 text-sky-400 px-2.5 py-1 rounded-full">Plumbing</span>
                        <span class="text-slate-400 text-sm">Casablanca</span>
                    </div>
                    
                    <h1 class="text-3xl font-extrabold text-white tracking-tight mb-6">Fix leaking sink pipe in Kitchen</h1>
                    
                    <div class="prose prose-invert max-w-none text-slate-300 font-light leading-relaxed mb-8">
                        <p>Kitchen sink is leaking from the U-bend. Needs urgent repair before weekend. Water is dripping continuously into a bucket.</p>
                        <p>Please bring necessary parts if possible, standard measurements.</p>
                    </div>

                    <div class="flex items-center gap-4 py-4 border-y border-white/10">
                        <div class="w-12 h-12 rounded-full bg-slate-800 flex items-center justify-center font-bold text-white">S</div>
                        <div>
                            <div class="text-sm font-bold text-white">Sarah M.</div>
                            <div class="text-xs text-slate-400">Client • Joined 2025</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Apply Box -->
            <div class="lg:col-span-1">
                <div class="bg-slate-900/80 border border-indigo-500/30 rounded-3xl p-6 shadow-2xl sticky top-[8rem]">
                    <h3 class="text-lg font-bold text-white mb-4">Apply for this mission</h3>
                    
                    <form action="#" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Estimated Cost (MAD)</label>
                            <input type="number" name="bid" class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 placeholder-slate-500" placeholder="e.g. 150">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-300 mb-2">Message to client</label>
                            <textarea name="message" rows="4" class="w-full bg-slate-800 border border-slate-700 text-white rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500/50 placeholder-slate-500 resize-none text-sm" placeholder="Why should they choose you?"></textarea>
                        </div>
                        <button type="submit" class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-xl transition-colors shadow-[0_0_15px_rgba(79,70,229,0.3)] hover:shadow-[0_0_25px_rgba(79,70,229,0.5)]">
                            Submit Application
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
