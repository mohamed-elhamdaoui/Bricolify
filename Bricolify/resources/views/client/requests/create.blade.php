@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-6 lg:px-8 py-12">
    
    <div class="mb-8">
        <a href="{{ url('/client/requests') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-slate-900 mb-6 transition-colors">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to my requests
        </a>
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Post a New Request</h1>
        <p class="mt-2 text-sm text-slate-500 font-light">Describe your problem and connect with local professionals.</p>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200/60 p-8 shadow-sm relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-50/50 rounded-full blur-3xl z-0 pointer-events-none -translate-y-1/2 translate-x-1/3"></div>
        
        <form action="#" method="POST" class="relative z-10 space-y-8">
            @csrf
            
            <div class="space-y-6">
                <!-- Title -->
                <div>
                    <label for="title" class="block text-sm font-bold text-slate-900 mb-2">Request Title</label>
                    <input type="text" id="title" name="title" class="w-full px-4 py-3 border border-slate-200 text-slate-900 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all font-medium placeholder-slate-400" placeholder="e.g. Fix leaking sink pipe in Kitchen">
                </div>

                <!-- Category -->
                <div>
                    <label for="category_id" class="block text-sm font-bold text-slate-900 mb-2">Category</label>
                    <select id="category_id" name="category_id" class="w-full px-4 py-3 border border-slate-200 text-slate-700 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all bg-white appearance-none">
                        <option value="" disabled selected>Select a category...</option>
                        <option value="1">Plumbing</option>
                        <option value="2">Electrical</option>
                        <option value="3">Carpentry</option>
                        <option value="4">Cleaning</option>
                        <option value="5">Landscaping</option>
                    </select>
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-bold text-slate-900 mb-2">Details & Description</label>
                    <p class="text-xs text-slate-500 mb-2 font-light">Provide as much detail as possible so workers can give you accurate quotes.</p>
                    <textarea id="description" name="description" rows="5" class="w-full px-4 py-3 border border-slate-200 text-slate-900 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all placeholder-slate-400 resize-none" placeholder="Describe the issue, dimensions, materials needed..."></textarea>
                </div>

                <!-- Budget & Location -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="budget" class="block text-sm font-bold text-slate-900 mb-2">Estimated Budget (Optional)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <span class="text-slate-400 font-medium font-sans">MAD</span>
                            </div>
                            <input type="number" id="budget" name="budget" class="w-full pl-14 pr-4 py-3 border border-slate-200 text-slate-900 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all placeholder-slate-400" placeholder="0.00">
                        </div>
                    </div>
                    
                    <div>
                        <label for="location" class="block text-sm font-bold text-slate-900 mb-2">City / Location</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                            </div>
                            <input type="text" id="location" name="location" class="w-full pl-12 pr-4 py-3 border border-slate-200 text-slate-900 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all placeholder-slate-400" placeholder="e.g. Casablanca">
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-4">
                <a href="{{ url('/client/requests') }}" class="px-6 py-3 font-medium text-slate-600 hover:text-slate-900 transition-colors">Cancel</a>
                <button type="submit" class="inline-flex items-center justify-center px-8 py-3 text-sm font-bold text-white transition-all bg-slate-900 rounded-xl shadow-[0_4px_14px_0_rgb(0,0,0,0.1)] hover:shadow-[0_6px_20px_rgba(0,0,0,0.15)] hover:bg-slate-800 hover:-translate-y-0.5">
                    Publish Request
                </button>
            </div>
            
        </form>
    </div>
</div>
@endsection
