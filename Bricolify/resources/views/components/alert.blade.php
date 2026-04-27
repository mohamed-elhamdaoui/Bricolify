@props(['type' => 'default'])

@php
    $classes = match($type) {
        'success' => 'bg-emerald-50 text-emerald-800 border-emerald-200',
        'warning' => 'bg-amber-50 text-amber-800 border-amber-200',
        'danger' => 'bg-rose-50 text-rose-800 border-rose-200',
        'info' => 'bg-sky-50 text-sky-800 border-sky-200',
        default => 'bg-slate-50 text-slate-800 border-slate-200',
    };
@endphp

<div {{ $attributes->merge(['class' => "w-full p-4 rounded-xl border shadow-sm flex items-start gap-3 $classes"]) }} role="alert">
    @if($type == 'success')
        <svg class="w-5 h-5 mt-0.5 shrink-0 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    @elseif($type == 'danger')
        <svg class="w-5 h-5 mt-0.5 shrink-0 text-rose-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    @elseif($type == 'warning')
        <svg class="w-5 h-5 mt-0.5 shrink-0 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
    @else
        <svg class="w-5 h-5 mt-0.5 shrink-0 text-sky-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
    @endif
    
    <div class="flex-1 text-sm">
        {{ $slot }}
    </div>
</div>
