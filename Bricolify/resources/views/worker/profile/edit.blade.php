@extends('layouts.dashboard')

@section('content')
<div class="p-6 lg:p-8 max-w-4xl">
    <div class="mb-8">
        <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Edit Profile</h1>
        <p class="mt-2 text-sm text-slate-500 font-light">Update your professional information and skills.</p>
    </div>

    <div class="bg-white rounded-[2.5rem] border border-slate-200/60 p-8 shadow-sm">
        <form action="#" method="POST" class="space-y-8">
            @csrf
            
            <div class="flex items-center gap-6 pb-8 border-b border-slate-100">
                <div class="w-20 h-20 rounded-full bg-slate-100 flex items-center justify-center font-bold text-slate-400 text-2xl border-2 border-dashed border-slate-300">
                    +
                </div>
                <div>
                    <button type="button" class="px-4 py-2 bg-white border border-slate-200 shadow-sm rounded-xl text-sm font-semibold text-slate-700 hover:bg-slate-50 hover:text-indigo-600 transition-colors">
                        Upload Photo
                    </button>
                    <p class="text-xs text-slate-500 mt-2 font-light">JPG, GIF or PNG. Max size of 2MB.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-2">First Name</label>
                    <input type="text" value="Karim" class="w-full px-4 py-3 border border-slate-200 text-slate-900 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all font-medium">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-900 mb-2">Last Name</label>
                    <input type="text" value="B." class="w-full px-4 py-3 border border-slate-200 text-slate-900 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all font-medium">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-slate-900 mb-2">Professional Title</label>
                    <input type="text" value="Professional Plumber" class="w-full px-4 py-3 border border-slate-200 text-slate-900 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-slate-900 mb-2">About Me</label>
                    <textarea rows="4" class="w-full px-4 py-3 border border-slate-200 text-slate-900 rounded-2xl focus:outline-none focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 transition-all font-light resize-none">I am a certified plumber with over 8 years of experience. I specialize in leak detection, pipe replacement, and general bathroom renovations.</textarea>
                </div>
            </div>

            <div class="pt-6 border-t border-slate-100 flex items-center justify-end gap-4">
                <a href="{{ url('/worker/profile/show') }}" class="px-6 py-3 font-medium text-slate-600 hover:text-slate-900 transition-colors">Cancel</a>
                <button type="submit" class="inline-flex items-center justify-center px-8 py-3 text-sm font-bold text-white transition-all bg-slate-900 rounded-xl shadow-[0_4px_14px_0_rgb(0,0,0,0.1)] hover:shadow-[0_6px_20px_rgba(0,0,0,0.15)] hover:bg-slate-800 hover:-translate-y-0.5">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
