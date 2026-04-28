@extends('layouts.app')

@section('content')
<div class="bg-[#fafafa] min-h-screen pt-32 pb-24">
    <!-- Background Blur Orbs -->
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="absolute top-[-10%] right-[-10%] w-[40%] h-[40%] rounded-full bg-violet-500/5 blur-[120px]"></div>
    </div>

    @if($worker->status !== 'active' || !$worker->is_validated)
        @php abort(404) @endphp
    @endif

    <div class="max-w-4xl mx-auto px-6 lg:px-8 relative z-10">
        <div class="mb-8">
            <a href="javascript:history.back()" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-slate-900 mb-6 transition-colors">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                Back
            </a>
        </div>

        <!-- Profile Hero -->
        <div class="bg-white rounded-[3rem] border border-slate-200/60 p-8 md:p-12 shadow-sm relative overflow-hidden mb-8">
            <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-50/50 rounded-full blur-3xl z-0 pointer-events-none -translate-y-1/2 translate-x-1/3"></div>

            <div class="relative z-10 flex flex-col md:flex-row gap-8 items-start">
                <div class="shrink-0 relative">
                    <div class="w-32 h-32 md:w-40 md:h-40 rounded-[2rem] bg-indigo-50 border-4 border-white shadow-[0_8px_30px_rgb(0,0,0,0.06)] flex items-center justify-center overflow-hidden">
                        @if($worker->user->avatar)
                            <img src="{{ $worker->user->avatar }}" alt="{{ $worker->user->name }}" class="w-full h-full object-cover">
                        @else
                            <span class="text-5xl font-black text-indigo-200">{{ substr($worker->user->name, 0, 1) }}</span>
                        @endif
                    </div>
                    <!-- Verified Badge -->
                    <div class="absolute -bottom-3 -right-3 w-10 h-10 bg-emerald-500 text-white rounded-full flex items-center justify-center border-4 border-white shadow-sm" title="Verified Professional">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"></path></svg>
                    </div>
                </div>

                <div class="flex-grow pt-2">
                    <h1 class="text-3xl md:text-4xl font-extrabold text-slate-900 tracking-tight mb-3">{{ $worker->user->name }}</h1>
                    
                    <div class="flex flex-wrap items-center gap-4 mb-6">
                        <div class="flex items-center gap-1.5 px-3 py-1 bg-amber-50 rounded-full border border-amber-200/50">
                            <svg class="w-4 h-4 text-amber-500" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            <span class="text-sm font-bold text-amber-700">{{ number_format($worker->rating_average, 1) }}</span>
                            <span class="text-xs font-medium text-amber-600/70">({{ $worker->rating_count }} reviews)</span>
                        </div>
                        <div class="flex items-center gap-1.5 px-3 py-1 bg-indigo-50 rounded-full border border-indigo-100">
                            <svg class="w-4 h-4 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                            <span class="text-sm font-bold text-indigo-700">{{ $worker->experience_years }} Years Exp.</span>
                        </div>
                    </div>

                    @if($worker->bio)
                        <div class="prose prose-slate max-w-none text-slate-500 font-light text-sm md:text-base leading-relaxed">
                            <p>{{ $worker->bio }}</p>
                        </div>
                    @endif
                </div>

                <!-- CTA Box -->
                <div class="shrink-0 w-full md:w-auto bg-slate-50 rounded-2xl p-6 border border-slate-200/60 text-center">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Want to hire {{ explode(' ', trim($worker->user->name))[0] }}?</p>
                    <a href="{{ route('register.view') }}" class="inline-flex w-full items-center justify-center px-6 py-3 text-sm font-bold text-white transition-all bg-slate-900 rounded-xl shadow-[0_4px_14px_0_rgb(0,0,0,0.1)] hover:shadow-[0_6px_20px_rgba(0,0,0,0.15)] hover:bg-slate-800 hover:-translate-y-0.5">
                        Create Free Account
                    </a>
                    <p class="text-[10px] text-slate-400 mt-3 font-medium">No hidden fees. Book in minutes.</p>
                </div>
            </div>
        </div>

        <!-- Skills Section -->
        <div class="bg-white rounded-3xl border border-slate-200/60 p-8 md:p-10 shadow-sm mb-8">
            <h3 class="text-xl font-extrabold text-slate-900 tracking-tight mb-6">Verified Skills</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @php 
                    $groupedSkills = $worker->skills->groupBy('category.name'); 
                @endphp
                
                @forelse($groupedSkills as $categoryName => $skills)
                    <div class="bg-slate-50 rounded-2xl p-6 border border-slate-100">
                        <h4 class="text-sm font-bold text-slate-900 mb-4 flex items-center gap-2">
                            <div class="w-6 h-6 rounded-md bg-indigo-100 text-indigo-600 flex items-center justify-center">
                                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                            </div>
                            {{ $categoryName }}
                        </h4>
                        <div class="flex flex-wrap gap-2">
                            @foreach($skills as $skill)
                                <span class="px-3 py-1.5 bg-white border border-slate-200 text-slate-600 text-xs font-bold rounded-lg shadow-sm">{{ $skill->name }}</span>
                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="col-span-full py-8 text-center border-2 border-dashed border-slate-200 rounded-2xl">
                        <p class="text-slate-500 font-light text-sm">This professional hasn't listed specific skills yet.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="bg-white rounded-3xl border border-slate-200/60 p-8 md:p-10 shadow-sm">
            <div class="flex items-center justify-between mb-8">
                <h3 class="text-xl font-extrabold text-slate-900 tracking-tight">Client Reviews</h3>
                <div class="text-sm font-bold text-slate-500">{{ $worker->rating_count }} total</div>
            </div>

            <div class="space-y-6">
                @forelse($worker->reviews as $review)
                    <div class="bg-white p-6 rounded-2xl border border-slate-100 shadow-sm hover:border-slate-200 transition-colors">
                        <div class="flex items-start justify-between gap-4 mb-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center font-bold text-slate-500">
                                    {{ substr($review->client->name, 0, 1) }}
                                </div>
                                <div>
                                    <h5 class="text-sm font-bold text-slate-900">{{ $review->client->name }}</h5>
                                    <p class="text-xs text-slate-400 font-medium">{{ $review->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <!-- Stars -->
                            <div class="flex gap-0.5">
                                @for($i = 1; $i <= 5; $i++)
                                    <svg class="w-4 h-4 {{ $i <= $review->rating ? 'text-amber-400' : 'text-slate-200' }}" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                @endfor
                            </div>
                        </div>
                        @if($review->comment)
                            <p class="text-slate-600 font-light text-sm leading-relaxed">{{ $review->comment }}</p>
                        @endif
                    </div>
                @empty
                    <div class="text-center py-12 bg-slate-50 rounded-2xl border border-slate-100 border-dashed">
                        <div class="w-12 h-12 bg-slate-100 text-slate-400 rounded-xl flex items-center justify-center mx-auto mb-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path></svg>
                        </div>
                        <h4 class="text-sm font-bold text-slate-900 mb-1">No Reviews Yet</h4>
                        <p class="text-xs text-slate-500 font-light">This professional hasn't received any reviews yet.</p>
                    </div>
                @endforelse
            </div>
        </div>

    </div>
</div>
@endsection
