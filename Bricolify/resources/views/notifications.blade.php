@extends('layouts.dashboard')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-10">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Notifications</h1>
            <p class="mt-2 text-base text-slate-500 font-light">Stay updated on your mission progress and applications.</p>
        </div>
        @if(auth()->user()->unreadNotifications->count() > 0)
            <form action="{{ route('notifications.mark-all-read') }}" method="POST">
                @csrf
                <button type="submit" class="text-sm font-bold text-indigo-600 hover:text-indigo-700 bg-indigo-50 px-4 py-2 rounded-xl transition-all flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    Mark all as read
                </button>
            </form>
        @endif
    </div>

    {{-- Notifications List --}}
    <div class="space-y-4">
        @forelse($notifications as $notification)
            <div class="group relative bg-white/70 backdrop-blur-sm border {{ $notification->read_at ? 'border-white/90 opacity-75' : 'border-indigo-100 bg-indigo-50/30' }} rounded-[1.5rem] p-5 transition-all hover:shadow-md">
                <div class="flex gap-5 items-start">
                    {{-- Mark as Read Link (Overlay) --}}
                    @if(!$notification->read_at)
                        <form action="{{ route('notifications.mark-as-read', $notification->id) }}" method="POST" class="absolute inset-0 z-10 cursor-pointer">
                            @csrf
                            <button type="submit" class="w-full h-full opacity-0"></button>
                        </form>
                    @endif

                    {{-- Status Indicator --}}
                    @if(!$notification->read_at)
                        <div class="absolute top-6 left-2 w-2 h-2 rounded-full bg-indigo-500 shadow-[0_0_8px_rgba(99,102,241,0.6)] animate-pulse"></div>
                    @endif

                    {{-- Icon Box --}}
                    <div class="w-12 h-12 rounded-2xl {{ $notification->read_at ? 'bg-slate-50 text-slate-400' : 'bg-white text-indigo-600 border border-indigo-100 shadow-sm' }} flex items-center justify-center shrink-0">
                        @if(str_contains(strtolower($notification->type), 'application'))
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                        @elseif(str_contains(strtolower($notification->type), 'status') || str_contains(strtolower($notification->type), 'completed'))
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        @else
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        @endif
                    </div>

                    {{-- Content --}}
                    <div class="flex-1 min-w-0 relative z-20">
                        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-1">
                            <h4 class="text-base font-extrabold text-slate-900 truncate">
                                {{ $notification->type }}
                            </h4>
                            <div class="flex items-center gap-3">
                                <span class="text-xs font-bold text-slate-400 whitespace-nowrap">
                                    {{ $notification->created_at->diffForHumans() }}
                                </span>
                                
                                {{-- Delete Button --}}
                                <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST" onsubmit="return confirm('Delete this notification?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-1.5 text-slate-300 hover:text-rose-500 hover:bg-rose-50 rounded-lg transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <p class="text-sm font-light text-slate-500 mt-1 leading-relaxed">
                            {{ $notification->message }}
                        </p>
                        
                        {{-- Action Link --}}
                        @if(isset($notification->data['action_url']))
                            <div class="mt-4">
                                <a href="{{ $notification->data['action_url'] }}" class="inline-flex items-center text-xs font-bold text-indigo-600 hover:text-indigo-700 gap-1 group/link">
                                    View Details
                                    <svg class="w-3.5 h-3.5 transition-transform group-hover/link:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="bg-white/60 backdrop-blur-xl border border-white/90 rounded-[2.5rem] shadow-sm p-16 flex flex-col items-center justify-center text-center">
                <div class="w-20 h-20 bg-slate-50 rounded-3xl flex items-center justify-center mb-6 border border-slate-100">
                    <svg class="w-10 h-10 text-slate-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                </div>
                <h3 class="text-xl font-extrabold text-slate-900 mb-2">All caught up!</h3>
                <p class="text-slate-500 font-light max-w-xs mx-auto">No notifications to show right now. We'll alert you when something happens.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection
