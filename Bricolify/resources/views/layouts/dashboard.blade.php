<!DOCTYPE html>
<html lang="en" class="scroll-smooth bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Bricolify | Dashboard' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- AlpineJS for interactive components -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="text-slate-900 font-sans antialiased overflow-x-hidden flex h-screen bg-slate-50 selection:bg-indigo-500/20 selection:text-indigo-900">

    <!-- Sidebar -->
    <aside class="w-64 bg-white border-r border-slate-200/60 shadow-sm flex flex-col hidden lg:flex">
        <div class="h-16 flex items-center px-6 border-b border-slate-100 mb-6">
            <a href="/" class="text-2xl font-black tracking-tighter text-indigo-600 flex items-center gap-1.5 hover:opacity-90 transition-opacity">
                <div class="w-7 h-7 bg-indigo-600 rounded-lg flex items-center justify-center shadow-sm shadow-indigo-500/20 w-8 h-8 rounded-xl">
                    <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                </div>
                <span>Bricolify<span class="text-slate-900">.</span></span>
            </a>
        </div>

        <nav class="flex-1 px-4 space-y-1.5 overflow-y-auto">
            @if(auth()->user() && auth()->user()->isClient())
                <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 font-semibold hover:bg-slate-50 hover:text-slate-900' }} transition-colors">
                    Dashboard
                </a>
                <a href="{{ route('client.requests.index') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl {{ request()->routeIs('client.requests.*') && !request()->routeIs('client.requests.create') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 font-semibold hover:bg-slate-50 hover:text-slate-900' }} transition-colors">
                    My Requests
                </a>
                <a href="{{ route('client.requests.create') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl {{ request()->routeIs('client.requests.create') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 font-semibold hover:bg-slate-50 hover:text-slate-900' }} transition-colors">
                    Post a Request
                </a>
                <a href="{{ route('notifications') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl {{ request()->routeIs('notifications') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 font-semibold hover:bg-slate-50 hover:text-slate-900' }} transition-colors">
                    Notifications
                </a>
                <a href="#" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl text-slate-600 font-semibold hover:bg-slate-50 hover:text-slate-900 transition-colors">
                    Profile
                </a>
            @elseif(auth()->user() && auth()->user()->isWorker())
                <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 font-semibold hover:bg-slate-50 hover:text-slate-900' }} transition-colors">
                    Dashboard
                </a>
                <a href="{{ route('worker.requests.index') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl {{ request()->routeIs('worker.requests.*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 font-semibold hover:bg-slate-50 hover:text-slate-900' }} transition-colors">
                    Browse Requests
                </a>
                <a href="{{ route('worker.applications.index') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl {{ request()->routeIs('worker.applications.*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 font-semibold hover:bg-slate-50 hover:text-slate-900' }} transition-colors">
                    My Applications
                </a>
                <a href="{{ route('worker.profile.show') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl {{ request()->routeIs('worker.profile.*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 font-semibold hover:bg-slate-50 hover:text-slate-900' }} transition-colors">
                    My Profile
                </a>
                <a href="{{ route('notifications') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl {{ request()->routeIs('notifications') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 font-semibold hover:bg-slate-50 hover:text-slate-900' }} transition-colors">
                    Notifications
                </a>
            @elseif(auth()->user() && auth()->user()->isAdmin())
                <a href="{{ route('dashboard') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 font-semibold hover:bg-slate-50 hover:text-slate-900' }} transition-colors">
                    Dashboard
                </a>
                <a href="{{ route('admin.workers.index') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl {{ request()->routeIs('admin.workers.*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 font-semibold hover:bg-slate-50 hover:text-slate-900' }} transition-colors">
                    Manage Workers
                </a>
                <a href="{{ route('admin.categories.index') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl {{ request()->routeIs('admin.categories.*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 font-semibold hover:bg-slate-50 hover:text-slate-900' }} transition-colors">
                    Manage Categories
                </a>
                <a href="{{ route('admin.skills.index') }}" class="flex items-center px-3 py-2.5 text-sm font-bold rounded-xl {{ request()->routeIs('admin.skills.*') ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600 font-semibold hover:bg-slate-50 hover:text-slate-900' }} transition-colors">
                    Manage Skills
                </a>
            @endif
        </nav>

        <div class="p-4 border-t border-slate-100">
            <div class="flex items-center gap-3 px-2 mb-4">
                <div class="w-10 h-10 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center font-bold text-slate-700">
                    {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
                </div>
                <div class="w-full truncate">
                    <div class="text-sm font-bold text-slate-900 truncate">{{ auth()->user()->name ?? 'User' }}</div>
                    <div class="text-xs font-medium text-slate-500 capitalize">{{ auth()->user()->role ?? 'Guest' }}</div>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex justify-center items-center w-full px-3 py-2.5 text-sm font-bold text-slate-600 hover:text-rose-600 hover:bg-rose-50 rounded-xl transition-colors border border-transparent shadow-sm hover:border-rose-100">
                    Log out
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-w-0 overflow-y-auto">
        <!-- Mobile Header (Minimal) -->
        <header class="bg-white border-b border-slate-200 h-16 flex items-center justify-between px-6 lg:hidden sticky top-0 z-10 shadow-sm">
            <a href="/" class="text-xl font-black tracking-tighter text-indigo-600 flex items-center gap-1.5">
                <div class="w-6 h-6 bg-indigo-600 rounded flex items-center justify-center">
                    <svg class="w-3.5 h-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                </div>
                <span>Bricolify</span>
            </a>
            <button class="text-slate-400 hover:text-slate-600 bg-slate-50 p-2 rounded-lg border border-slate-100">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </header>

        <main class="flex-1">
            @yield('content')
        </main>
    </div>
</body>
</html>
