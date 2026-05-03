<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Bricolify | Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- AlpineJS for interactive components -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-[#f1f5f9] text-slate-900 font-sans antialiased overflow-x-hidden selection:bg-indigo-500/20 selection:text-indigo-900 flex h-screen">

    <!-- Fixed Background Blur Orbs -->
    <div class="fixed inset-0 z-[-1] pointer-events-none overflow-hidden">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] rounded-full bg-indigo-500/8 blur-[120px]"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] rounded-full bg-violet-500/6 blur-[100px]"></div>
    </div>

    <!-- Sidebar (w-64) -->
    <aside class="w-64 bg-white/60 backdrop-blur-xl border-r border-white/80 flex flex-col hidden lg:flex shrink-0">
        <!-- Logo -->
        <div class="h-16 flex items-center px-6 mb-6 mt-4">
            <a href="{{ route('home') }}" class="flex items-center gap-3 group cursor-pointer transition-opacity hover:opacity-90">
                <div class="bg-slate-900 text-white font-bold text-xl w-8 h-8 flex items-center justify-center rounded-lg shadow-[0_2px_10px_rgba(0,0,0,0.1)] group-hover:shadow-[0_4px_15px_rgba(0,0,0,0.15)] transition-all">B</div>
                <span class="text-xl font-extrabold tracking-tight text-slate-900">Bricolify</span>
            </a>
        </div>

        <!-- Nav -->
        <nav class="flex-1 px-4 space-y-1.5 overflow-y-auto pb-4">
            @if(auth()->user() && auth()->user()->isClient())
                <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('dashboard') ? 'bg-indigo-50/80 text-indigo-600' : 'text-slate-500 hover:bg-white/60 hover:text-slate-900' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('dashboard') ? 'text-indigo-600' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>
                <a href="{{ route('client.requests.index') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('client.requests.*') && !request()->routeIs('client.requests.create') ? 'bg-indigo-50/80 text-indigo-600' : 'text-slate-500 hover:bg-white/60 hover:text-slate-900' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('client.requests.*') && !request()->routeIs('client.requests.create') ? 'text-indigo-600' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path></svg>
                    My Requests
                </a>
                <a href="{{ route('client.requests.create') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('client.requests.create') ? 'bg-indigo-50/80 text-indigo-600' : 'text-slate-500 hover:bg-white/60 hover:text-slate-900' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('client.requests.create') ? 'text-indigo-600' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    Post a Request
                </a>
            @elseif(auth()->user() && auth()->user()->isWorker())
                <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('dashboard') ? 'bg-indigo-50/80 text-indigo-600' : 'text-slate-500 hover:bg-white/60 hover:text-slate-900' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('dashboard') ? 'text-indigo-600' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>
                <a href="{{ route('worker.requests.index') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('worker.requests.*') ? 'bg-indigo-50/80 text-indigo-600' : 'text-slate-500 hover:bg-white/60 hover:text-slate-900' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('worker.requests.*') ? 'text-indigo-600' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    Browse Requests
                </a>
                <a href="{{ route('worker.applications.index') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('worker.applications.*') ? 'bg-indigo-50/80 text-indigo-600' : 'text-slate-500 hover:bg-white/60 hover:text-slate-900' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('worker.applications.*') ? 'text-indigo-600' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                    My Applications
                </a>
            @elseif(auth()->user() && auth()->user()->isAdmin())
                <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('dashboard') ? 'bg-indigo-50/80 text-indigo-600' : 'text-slate-500 hover:bg-white/60 hover:text-slate-900' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('dashboard') ? 'text-indigo-600' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                    Dashboard
                </a>
                <a href="{{ route('admin.workers.index') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('admin.workers.*') ? 'bg-indigo-50/80 text-indigo-600' : 'text-slate-500 hover:bg-white/60 hover:text-slate-900' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.workers.*') ? 'text-indigo-600' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                    Manage Workers
                </a>
                <a href="{{ route('admin.categories.index') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl transition-all {{ request()->routeIs('admin.categories.*') ? 'bg-indigo-50/80 text-indigo-600' : 'text-slate-500 hover:bg-white/60 hover:text-slate-900' }}">
                    <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.categories.*') ? 'text-indigo-600' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                    Manage Categories
                </a>
            @endif
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-w-0 overflow-y-auto relative z-10">
        <!-- Top Header -->
        <header class="bg-white/70 backdrop-blur-xl border-b border-white/80 h-16 flex items-center justify-between px-6 lg:px-8 sticky top-0 z-20">
            <div class="flex items-center gap-4">
                <button class="lg:hidden text-slate-500 hover:text-slate-900">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>
                <h1 class="text-xl font-extrabold text-slate-900 tracking-tight hidden sm:block capitalize">{{ $title ?? 'Dashboard' }}</h1>
            </div>

            <!-- Right Profile / Notifications -->
            <div class="flex items-center gap-4">
                
                <!-- Notifications Dropdown -->
                <div class="relative" x-data="{ notifOpen: false }">
                    <button @click="notifOpen = !notifOpen" class="text-slate-400 hover:text-indigo-600 transition-colors bg-white/50 p-2 rounded-xl border border-white/60 shadow-sm relative">
                        @if(auth()->user()->unreadNotifications->count() > 0)
                            <div class="absolute w-2 h-2 rounded-full bg-indigo-500 top-0 right-0 shadow-[0_0_8px_rgba(99,102,241,0.6)] animate-pulse"></div>
                        @endif
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                    </button>
                    
                    <div x-show="notifOpen" @click.away="notifOpen = false" style="display: none;" 
                         x-transition:enter="transition ease-out duration-200" 
                         x-transition:enter-start="opacity-0 scale-95 translate-y-2" 
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0" 
                         x-transition:leave="transition ease-in duration-150" 
                         x-transition:leave-start="opacity-100 scale-100 translate-y-0" 
                         x-transition:leave-end="opacity-0 scale-95 translate-y-2"
                         class="absolute right-0 mt-3 w-80 bg-white/90 backdrop-blur-2xl rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.08)] border border-white p-3 z-50">
                        <div class="flex items-center justify-between px-2 pb-2 mb-2 border-b border-slate-100">
                            <span class="text-sm font-extrabold text-slate-900">Notifications</span>
                            @if(auth()->user()->unreadNotifications->count() > 0)
                                <span class="text-[10px] font-bold text-indigo-600 bg-indigo-50 px-2 py-0.5 rounded-full">{{ auth()->user()->unreadNotifications->count() }} New</span>
                            @endif
                        </div>
                        <div class="space-y-1 max-h-64 overflow-y-auto custom-scrollbar">
                            @forelse(auth()->user()->unreadNotifications->take(5) as $notification)
                                <div class="flex gap-3 p-2 rounded-xl hover:bg-slate-50 transition-colors cursor-pointer group relative">
                                    <div class="w-8 h-8 rounded-full bg-indigo-50 text-indigo-500 flex items-center justify-center shrink-0 border border-indigo-100">
                                        @if(str_contains(strtolower($notification->type), 'application'))
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        @else
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                                        @endif
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-xs font-bold text-slate-900 group-hover:text-indigo-600 transition-colors">{{ $notification->type }}</p>
                                        <p class="text-[10px] text-slate-500 line-clamp-1 mt-0.5">{{ $notification->message }}</p>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-4">
                                    <p class="text-xs text-slate-400 font-medium">No new notifications</p>
                                </div>
                            @endforelse
                        </div>
                        <a href="{{ route('notifications') }}" class="block text-center text-xs font-bold text-indigo-600 mt-2 pt-2 border-t border-slate-100 hover:text-indigo-700">View All</a>
                    </div>
                </div>
                
                <!-- Profile Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center gap-2 bg-white/50 border border-white/60 p-1 pr-3 rounded-xl shadow-sm hover:bg-white/80 transition-all">
                        <div class="w-8 h-8 rounded-lg bg-slate-900 text-white flex items-center justify-center font-bold text-sm shadow-[0_2px_8px_rgba(0,0,0,0.1)]">
                            {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
                        </div>
                        <div class="text-left hidden md:block">
                            <div class="text-xs font-extrabold text-slate-900 leading-tight">{{ auth()->user()->name ?? 'User' }}</div>
                            <div class="text-[10px] font-bold text-slate-500 uppercase tracking-wider">{{ auth()->user()->role ?? 'Guest' }}</div>
                        </div>
                        <svg class="w-4 h-4 text-slate-400 ml-1 hidden md:block" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div x-show="open" @click.away="open = false" style="display: none;" 
                         x-transition:enter="transition ease-out duration-200" 
                         x-transition:enter-start="opacity-0 scale-95 translate-y-2" 
                         x-transition:enter-end="opacity-100 scale-100 translate-y-0" 
                         x-transition:leave="transition ease-in duration-150" 
                         x-transition:leave-start="opacity-100 scale-100 translate-y-0" 
                         x-transition:leave-end="opacity-0 scale-95 translate-y-2"
                         class="absolute right-0 mt-3 w-48 bg-white/90 backdrop-blur-2xl rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.08)] border border-white py-2 z-50">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="w-full flex items-center px-4 py-2.5 text-sm font-bold text-rose-600 hover:bg-rose-50 transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                                Log out
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <main class="flex-1 p-6 lg:p-8">
            @yield('content')
        </main>
    </div>
</body>
</html>
