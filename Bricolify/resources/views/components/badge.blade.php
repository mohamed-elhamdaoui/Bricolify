@props(['type' => 'default'])

@php
    $classes = match($type) {
        'success' => 'bg-emerald-100 text-emerald-700 border-emerald-200',
        'warning' => 'bg-amber-100 text-amber-700 border-amber-200',
        'danger' => 'bg-rose-100 text-rose-700 border-rose-200',
        'info' => 'bg-sky-100 text-sky-700 border-sky-200',
        'primary' => 'bg-indigo-100 text-indigo-700 border-indigo-200',
        default => 'bg-slate-100 text-slate-700 border-slate-200',
    };
@endphp

<span {{ $attributes->merge(['class' => "inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-semibold border $classes"]) }}>
    {{ $slot }}
</span>
