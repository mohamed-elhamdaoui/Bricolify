<nav class="fixed top-0 inset-x-0 z-50 bg-white/70 backdrop-blur-xl border-b border-slate-200/50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 h-16 flex items-center justify-between">
        <div class="flex items-center gap-3 group cursor-pointer" onclick="window.location.href='/'">
            <div class="bg-gradient-to-br from-slate-900 to-slate-800 text-white font-bold text-xl w-8 h-8 flex items-center justify-center rounded-lg shadow-[0_2px_10px_rgba(0,0,0,0.1)] group-hover:shadow-[0_4px_15px_rgba(0,0,0,0.15)] transition-all">B</div>
            <span class="text-xl font-extrabold tracking-tight text-slate-900">Bricolify</span>
        </div>

        <div class="hidden md:flex items-center space-x-1">
            <a href="{{ url('/') }}#how-it-works" class="px-4 py-2 text-sm font-medium text-slate-500 hover:text-slate-900 hover:bg-slate-100/50 rounded-full transition-all">How it Works</a>
            <a href="{{ url('/') }}#services" class="px-4 py-2 text-sm font-medium text-slate-500 hover:text-slate-900 hover:bg-slate-100/50 rounded-full transition-all">Services</a>
            <a href="{{ url('/') }}#why-us" class="px-4 py-2 text-sm font-medium text-slate-500 hover:text-slate-900 hover:bg-slate-100/50 rounded-full transition-all">Why Bricolify</a>
        </div>

        <div class="flex items-center gap-3">
            @auth
                <!-- Notification Bell -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" @click.away="open = false" class="relative p-2 text-slate-400 hover:text-slate-600 transition-colors rounded-full hover:bg-slate-100">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                        @php $unreadCount = auth()->user()->notifications()->where('is_read', false)->count(); @endphp
                        @if($unreadCount > 0)
                            <span class="absolute top-1 right-1 flex h-4 w-4">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-75"></span>
                                <span class="relative flex justify-center items-center rounded-full h-4 w-4 bg-rose-500 text-[9px] font-bold text-white border border-white">{{ $unreadCount }}</span>
                            </span>
                        @endif
                    </button>

                    <!-- Notifications Dropdown -->
                    <div x-show="open" style="display: none;" class="absolute right-0 mt-2 w-80 bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden z-50">
                        <div class="p-4 border-b border-slate-100 flex items-center justify-between">
                            <h3 class="font-bold text-slate-900">Notifications</h3>
                            @if($unreadCount > 0)
                                <form action="{{ route('notifications.readAll') ?? '#' }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-xs font-semibold text-indigo-600 hover:text-indigo-700">Mark all read</button>
                                </form>
                            @endif
                        </div>
                        <div class="max-h-[24rem] overflow-y-auto divide-y divide-slate-50">
                            @php $latestNotifications = auth()->user()->notifications()->latest()->take(5)->get(); @endphp
                            @forelse($latestNotifications as $notification)
                                <div class="p-4 {{ !$notification->is_read ? 'bg-indigo-50/30' : 'hover:bg-slate-50' }} transition-colors">
                                    <p class="text-sm text-slate-800 {{ !$notification->is_read ? 'font-semibold' : 'font-medium' }}">{{ $notification->message }}</p>
                                    <p class="text-xs text-slate-500 mt-1 font-medium">{{ $notification->created_at->diffForHumans() }}</p>
                                </div>
                            @empty
                                <div class="p-6 text-center text-sm text-slate-500">No new notifications.</div>
                            @endforelse
                        </div>
                        <div class="p-3 border-t border-slate-100 bg-slate-50 text-center">
                            <a href="{{ route('notifications') }}" class="text-xs font-bold text-slate-600 hover:text-indigo-600 uppercase tracking-wider block w-full">View All</a>
                        </div>
                    </div>
                </div>

                <!-- Profile Dropdown -->
                <div class="relative ml-1" x-data="{ openProfile: false }">
                    <button @click="openProfile = !openProfile" @click.away="openProfile = false" class="flex items-center gap-2 hover:opacity-80 transition-opacity">
                        <div class="w-10 h-10 rounded-full bg-slate-100 border border-slate-200 flex items-center justify-center font-bold text-slate-700 shadow-sm">
                            {{ substr(auth()->user()->name ?? 'U', 0, 1) }}
                        </div>
                    </button>
                    
                    <!-- Profile Menu -->
                    <div x-show="openProfile" style="display: none;" class="absolute right-0 mt-2 w-48 bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden z-50">
                        <div class="px-4 py-3 border-b border-slate-100 bg-slate-50">
                            <p class="text-sm font-bold text-slate-900 truncate">{{ auth()->user()->name }}</p>
                            <p class="text-xs font-medium text-slate-500 capitalize">{{ auth()->user()->role }}</p>
                        </div>
                        <div class="py-2">
                            <a href="{{ route('dashboard') }}" class="flex items-center px-4 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50 hover:text-indigo-600 transition-colors">Dashboard</a>
                            <a href="#" class="flex items-center px-4 py-2.5 text-sm font-medium text-slate-700 hover:bg-slate-50 hover:text-indigo-600 transition-colors">Profile</a>
                        </div>
                        <div class="py-2 border-t border-slate-100">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="flex w-full items-center px-4 py-2.5 text-sm font-bold text-rose-600 hover:bg-rose-50 transition-colors">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <a href="{{ route('login') }}" class="hidden sm:block text-sm font-medium text-slate-500 hover:text-slate-900 transition-colors px-3 py-2">Sign In</a>
                <a href="{{ route('register.view') }}" class="relative inline-flex items-center justify-center px-5 py-2 text-sm font-semibold text-white transition-all bg-slate-900 rounded-full shadow-[0_4px_14px_0_rgb(0,0,0,0.1)] hover:shadow-[0_6px_20px_rgba(0,0,0,0.15)] hover:bg-slate-800 hover:-translate-y-0.5">
                    Get Started
                </a>
            @endauth
        </div>
    </div>
</nav>
