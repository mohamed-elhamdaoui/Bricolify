@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto px-6 lg:px-8 py-12 min-h-[calc(100vh-4rem)]">
    <div class="mb-8 flex justify-between items-end">
        <div>
            <h1 class="text-3xl font-extrabold text-slate-900 tracking-tight">Notifications</h1>
            <p class="mt-2 text-sm text-slate-500 font-light">Stay updated on your missions and account activity.</p>
        </div>
        <button class="text-sm font-semibold text-indigo-600 hover:text-indigo-800 transition-colors">Mark all as read</button>
    </div>

    <div class="space-y-4">
        <!-- Notification Item (Unread) -->
        <div class="bg-indigo-50/50 rounded-2xl border border-indigo-100 p-5 flex gap-4 items-start relative group">
            <div class="absolute w-2 h-2 rounded-full bg-indigo-500 top-7 left-4"></div>
            <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center shrink-0 border border-indigo-100 shadow-sm ml-4">
                <svg class="w-5 h-5 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
            </div>
            <div>
                <h4 class="font-bold text-slate-900 text-sm">New application received</h4>
                <p class="text-slate-600 text-sm font-light mt-1">Karim B. has applied to your request "Fix leaking sink pipe".</p>
                <div class="text-xs text-indigo-500 font-medium mt-2">Just now</div>
            </div>
        </div>

        <!-- Notification Item (Read) -->
        <div class="bg-white rounded-2xl border border-slate-200/60 p-5 flex gap-4 items-start hover:border-slate-300 transition-colors">
            <div class="w-10 h-10 rounded-full bg-slate-50 flex items-center justify-center shrink-0 border border-slate-100 ml-4">
                <svg class="w-5 h-5 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            </div>
            <div>
                <h4 class="font-bold text-slate-900 text-sm">Mission Completed</h4>
                <p class="text-slate-500 text-sm font-light mt-1">Your mission "Install 3 ceiling lights" has been marked as complete. Please leave a review!</p>
                <div class="text-xs text-slate-400 font-medium mt-2">2 days ago</div>
            </div>
            <a href="/client/reviews/create" class="ml-auto text-xs font-bold text-slate-700 bg-slate-100 hover:bg-slate-200 px-3 py-1.5 rounded-lg transition-colors border border-transparent whitespace-nowrap">Leave Review</a>
        </div>
    </div>
</div>
@endsection
