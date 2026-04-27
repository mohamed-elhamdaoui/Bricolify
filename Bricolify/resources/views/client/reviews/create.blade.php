@extends('layouts.app')

@section('content')
<div class="min-h-[calc(100vh-4rem)] flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8 relative z-10">
    <div class="max-w-xl w-full bg-white p-10 rounded-[2.5rem] shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-200/60 relative overflow-hidden">
        <div class="absolute -top-10 -right-10 w-32 h-32 bg-amber-500/10 rounded-full blur-2xl z-0 pointer-events-none"></div>

        <div class="text-center relative z-10 mb-8">
            <h2 class="text-3xl font-extrabold text-slate-900 tracking-tight">Rate your experience</h2>
            <p class="mt-2 text-sm text-slate-500 font-light">
                Mission: Fix leaking sink pipe
            </p>
        </div>

        <div class="flex items-center justify-center gap-4 mb-8 bg-slate-50 p-4 rounded-2xl border border-slate-100 relative z-10">
            <img src="https://ui-avatars.com/api/?name=Karim+B&background=6366f1&color=fff" class="w-12 h-12 rounded-full" alt="Worker">
            <div class="text-left">
                <h4 class="font-bold text-slate-900">Karim B.</h4>
                <div class="text-xs text-slate-500">Professional Plumber</div>
            </div>
        </div>
        
        <form action="#" method="POST" class="relative z-10 space-y-6">
            @csrf
            
            <div class="space-y-4">
                <div class="flex flex-col items-center">
                    <label class="block text-sm font-bold text-slate-900 mb-3 text-center">How many stars?</label>
                    <div class="flex items-center justify-center gap-2 flex-row-reverse group cursor-pointer">
                        <input type="radio" id="star5" name="rating" value="5" class="peer hidden" />
                        <label for="star5" class="text-slate-300 peer-checked:text-amber-400 hover:text-amber-400 cursor-pointer text-4xl transition-colors">★</label>
                        
                        <input type="radio" id="star4" name="rating" value="4" class="peer hidden" />
                        <label for="star4" class="text-slate-300 peer-checked:text-amber-400 hover:text-amber-400 cursor-pointer text-4xl transition-colors">★</label>
                        
                        <input type="radio" id="star3" name="rating" value="3" class="peer hidden" />
                        <label for="star3" class="text-slate-300 peer-checked:text-amber-400 hover:text-amber-400 cursor-pointer text-4xl transition-colors">★</label>
                        
                        <input type="radio" id="star2" name="rating" value="2" class="peer hidden" />
                        <label for="star2" class="text-slate-300 peer-checked:text-amber-400 hover:text-amber-400 cursor-pointer text-4xl transition-colors">★</label>
                        
                        <input type="radio" id="star1" name="rating" value="1" class="peer hidden" />
                        <label for="star1" class="text-slate-300 peer-checked:text-amber-400 hover:text-amber-400 cursor-pointer text-4xl transition-colors">★</label>
                    </div>
                </div>

                <div>
                    <label for="comment" class="block text-sm font-bold text-slate-900 mb-2">Leave a review (Optional)</label>
                    <textarea id="comment" name="comment" rows="4" class="w-full px-4 py-3 border border-slate-200 text-slate-900 rounded-2xl focus:outline-none focus:ring-2 focus:ring-amber-500/20 focus:border-amber-500 transition-all font-light placeholder-slate-400 resize-none" placeholder="Share your experience working with Karim..."></textarea>
                </div>
            </div>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-bold rounded-2xl text-slate-900 bg-amber-400 hover:bg-amber-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-400 shadow-[0_4px_14px_0_rgb(251,191,36,0.3)] hover:shadow-[0_6px_20px_rgba(251,191,36,0.2)] hover:-translate-y-0.5 transition-all">
                    Submit Review
                </button>
            </div>
            
            <div class="text-center mt-4">
                <a href="{{ url('/client/requests/show') }}" class="text-sm font-semibold text-slate-500 hover:text-slate-900">Skip for now</a>
            </div>
        </form>
    </div>
</div>
@endsection
