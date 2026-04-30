@extends('layouts.auth')

@section('content')
<div class="min-h-screen flex items-center justify-center px-4 py-16">
    <div class="bg-white rounded-3xl shadow-[0_8px_30px_rgb(0,0,0,0.06)] border border-slate-200/50 p-8 md:p-12 w-full max-w-2xl">

        {{-- Logo --}}
        <div class="flex items-center justify-center gap-3 mb-8">
            <div class="bg-slate-900 text-white font-bold text-xl w-9 h-9 flex items-center justify-center rounded-lg shadow-sm">B</div>
            <span class="text-xl font-extrabold tracking-tight text-slate-900">Bricolify</span>
        </div>

        {{-- Title --}}
        <div class="text-center mb-10">
            <h1 class="text-2xl font-extrabold text-slate-900 tracking-tight">Set up your professional profile</h1>
            <p class="text-sm text-slate-500 font-light mt-1">Your profile will be reviewed by our team before activation. This usually takes less than 24h.</p>
        </div>

        {{-- Flash Error --}}
        @if(session('error'))
            <div class="mb-6 flex items-start gap-3 bg-red-50 border border-red-100 text-red-600 rounded-xl px-4 py-3 text-sm font-medium">
                <svg class="w-4 h-4 mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path></svg>
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('onboarding.worker.store') }}" method="POST" class="space-y-10">
            @csrf

            {{-- SECTION 1: About You --}}
            <div>
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-7 h-7 rounded-full bg-slate-900 text-white text-xs font-extrabold flex items-center justify-center shrink-0">1</div>
                    <h2 class="text-base font-extrabold text-slate-900 uppercase tracking-wider">About You</h2>
                </div>

                <div class="space-y-5">
                    {{-- Bio --}}
                    <div>
                        <label for="bio" class="block text-sm font-semibold text-slate-700 mb-1.5">
                            Bio <span class="text-slate-400 font-normal">(optional)</span>
                        </label>
                        <textarea id="bio" name="bio" rows="4"
                                  placeholder="Describe your experience and what makes you stand out..."
                                  class="w-full px-4 py-3 rounded-xl border {{ $errors->has('bio') ? 'border-red-400 bg-red-50' : 'border-slate-200' }} focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none text-sm text-slate-700 transition-all resize-none">{{ old('bio') }}</textarea>
                        @error('bio')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Experience Years --}}
                    <div>
                        <label for="experience_years" class="block text-sm font-semibold text-slate-700 mb-1.5">Years of Experience</label>
                        <input id="experience_years" name="experience_years" type="number"
                               min="0" max="50" required
                               value="{{ old('experience_years', 0) }}"
                               class="w-full px-4 py-3 rounded-xl border {{ $errors->has('experience_years') ? 'border-red-400 bg-red-50' : 'border-slate-200' }} focus:ring-2 focus:ring-indigo-500 focus:border-transparent outline-none text-sm text-slate-700 transition-all">
                        @error('experience_years')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Divider --}}
            <div class="border-t border-slate-100"></div>

            {{-- SECTION 2: Your Skills --}}
            <div>
                <div class="flex items-center gap-3 mb-2">
                    <div class="w-7 h-7 rounded-full bg-slate-900 text-white text-xs font-extrabold flex items-center justify-center shrink-0">2</div>
                    <h2 class="text-base font-extrabold text-slate-900 uppercase tracking-wider">Your Skills</h2>
                </div>
                <p class="text-xs text-slate-500 font-light ml-10 mb-6">Select at least one skill that best represents your expertise.</p>

                @error('skills')
                    <div class="mb-4 flex items-center gap-2 bg-red-50 border border-red-100 text-red-600 rounded-xl px-4 py-2.5 text-sm font-medium">
                        <svg class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                        {{ $message }}
                    </div>
                @enderror

                <div class="space-y-7">
                    @foreach($categories as $category)
                        <div>
                            {{-- Category Label --}}
                            <p class="text-xs font-extrabold text-slate-400 uppercase tracking-widest mb-3">{{ $category->name }}</p>

                            {{-- Skills --}}
                            @if($category->skills->isNotEmpty())
                                <div class="flex flex-wrap gap-2">
                                    @foreach($category->skills as $skill)
                                        <label class="cursor-pointer">
                                            <input type="checkbox"
                                                   name="skills[]"
                                                   value="{{ $skill->id }}"
                                                   class="peer sr-only"
                                                   {{ in_array($skill->id, old('skills', [])) ? 'checked' : '' }}>
                                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold border border-slate-200 bg-white text-slate-600
                                                         peer-checked:bg-indigo-600 peer-checked:text-white peer-checked:border-indigo-600
                                                         hover:border-indigo-300 hover:text-indigo-600
                                                         transition-all select-none">
                                                {{ $skill->name }}
                                            </span>
                                        </label>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-xs text-slate-400 italic">No skills listed for this category yet.</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Submit --}}
            <div class="pt-2">
                <button type="submit" class="w-full bg-slate-900 text-white py-3.5 rounded-xl font-semibold hover:bg-slate-800 hover:-translate-y-0.5 transition-all shadow-sm">
                    Submit My Profile
                </button>
                <p class="text-center text-xs text-slate-400 font-light mt-3">
                    Your profile will be reviewed by our team before activation.
                </p>
            </div>

        </form>

        {{-- Back link --}}
        <div class="mt-6 text-center">
            <a href="{{ route('onboarding') }}" class="text-sm text-slate-400 hover:text-slate-600 font-medium transition-colors">
                ← Go back
            </a>
        </div>

    </div>
</div>
@endsection
