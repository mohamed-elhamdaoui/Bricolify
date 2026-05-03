@extends('layouts.dashboard')

@section('content')
<div class="max-w-3xl mx-auto px-6 lg:px-8 py-12">
    
    <div class="mb-8">
        <a href="{{ route('worker.applications.index') }}" class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-slate-900 mb-6 transition-colors">
            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
            Back to my applications
        </a>
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Edit Application</h1>
        <p class="mt-2 text-sm text-slate-500 font-light">Update your message for this request.</p>
    </div>

    <div class="bg-white rounded-3xl border border-slate-200/60 p-8 shadow-sm relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-50/50 rounded-full blur-3xl z-0 pointer-events-none -translate-y-1/2 translate-x-1/3"></div>

        @if(session('success'))
            <div class="mb-6 bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl flex items-center relative z-10" role="alert">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                <span class="block sm:inline font-medium">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 bg-rose-50 border border-rose-200 text-rose-700 px-4 py-3 rounded-xl flex items-center relative z-10" role="alert">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <span class="block sm:inline font-medium">{{ session('error') }}</span>
            </div>
        @endif

        <!-- Request Info -->
        <div class="mb-8 p-4 bg-slate-50 rounded-2xl relative z-10">
            <h3 class="font-bold text-slate-900 mb-2">{{ $application->serviceRequest->title }}</h3>
            <p class="text-sm text-slate-500 line-clamp-2">{{ $application->serviceRequest->description }}</p>
            <div class="mt-3 flex items-center gap-4 text-xs text-slate-400">
                <span>{{ $application->serviceRequest->location }}</span>
                <span>•</span>
                <span>{{ $application->serviceRequest->scheduled_date ? $application->serviceRequest->scheduled_date->format('M d, Y') : 'Not scheduled' }}</span>
            </div>
        </div>
        
        <form action="{{ route('worker.applications.update', $application) }}" method="POST" class="relative z-10 space-y-8">
            @csrf
            @method('PUT')
            
            <div class="space-y-6">
                <!-- Cover Message -->
                <div>
                    <label for="cover_message" class="block text-sm font-bold text-slate-900 mb-2">Cover Message</label>
                    <p class="text-xs text-slate-500 mb-2 font-light">Explain why you're the best fit for this job and highlight your relevant experience.</p>
                    <textarea id="cover_message" name="cover_message" rows="6" class="w-full px-4 py-3 border @error('cover_message') border-rose-300 ring-rose-500/20 @else border-slate-200 @enderror text-slate-900 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all placeholder-slate-400 resize-none" placeholder="I have 5 years of experience in...">{{ old('cover_message', $application->cover_message) }}</textarea>
                    @error('cover_message')
                        <p class="mt-2 text-sm text-rose-500 font-medium">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-4">
                <a href="{{ route('worker.applications.index') }}" class="px-6 py-3 font-medium text-slate-600 hover:text-slate-900 transition-colors">Cancel</a>
                <button type="submit" class="inline-flex items-center justify-center px-8 py-3 text-sm font-bold text-white transition-all bg-slate-900 rounded-xl shadow-[0_4px_14px_0_rgb(0,0,0,0.1)] hover:shadow-[0_6px_20px_rgba(0,0,0,0.15)] hover:bg-slate-800 hover:-translate-y-0.5">
                    Update Application
                </button>
            </div>
            
        </form>
    </div>
</div>
@endsection
