@extends('layouts.dashboard')

@section('content')
<div class="p-6 lg:p-8">
    <div class="mb-8">
        <a href="{{ url('/worker/requests') }}" class="inline-flex items-center text-sm font-semibold text-slate-500 hover:text-slate-900 mb-6 transition-colors">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to Marketplace
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Details -->
        <div class="lg:col-span-2">
            <div class="bg-white border border-slate-200/60 rounded-3xl p-8 shadow-sm mb-8">
                <div class="flex items-center gap-3 mb-6">
                    <span class="text-[10px] font-bold uppercase tracking-wider bg-sky-50 border border-sky-100 text-sky-600 px-2.5 py-1 rounded-md">Plumbing</span>
                    <span class="text-slate-500 text-sm font-medium">Casablanca</span>
                </div>
                
                <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight mb-6">Fix leaking sink pipe in Kitchen</h1>
                
                <div class="prose prose-slate max-w-none text-slate-600 font-light leading-relaxed mb-8">
                    <p>Kitchen sink is leaking from the U-bend. Needs urgent repair before weekend. Water is dripping continuously into a bucket.</p>
                    <p>Please bring necessary parts if possible, standard measurements.</p>
                </div>

                <div class="flex items-center gap-4 pt-6 border-t border-slate-100">
                    <div class="w-12 h-12 rounded-full bg-slate-100 flex items-center justify-center font-bold text-slate-600">S</div>
                    <div>
                        <div class="text-sm font-bold text-slate-900">Sarah M.</div>
                        <div class="text-xs text-slate-500 font-medium">Client • Joined 2025</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Apply Box -->
        <div class="lg:col-span-1">
            <div class="bg-slate-50 border border-slate-200/60 rounded-3xl p-6 shadow-sm sticky top-[2rem]">
                <h3 class="text-lg font-extrabold text-slate-900 mb-4">Apply for this mission</h3>
                
                <form action="#" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-bold text-slate-900 mb-2">Estimated Cost (MAD)</label>
                        <input type="number" name="bid" class="w-full bg-white border border-slate-200 text-slate-900 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 placeholder-slate-400 font-medium transition-all" placeholder="e.g. 150">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-900 mb-2">Message to client</label>
                        <textarea name="message" rows="4" class="w-full bg-white border border-slate-200 text-slate-900 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 placeholder-slate-400 resize-none font-medium transition-all" placeholder="Why should they choose you?"></textarea>
                    </div>
                    <button type="submit" class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl transition-all shadow-md hover:-translate-y-0.5">
                        Submit Application
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
