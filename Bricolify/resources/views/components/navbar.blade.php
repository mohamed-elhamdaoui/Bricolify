<nav class="fixed top-0 inset-x-0 z-50 bg-white/70 backdrop-blur-xl border-b border-slate-200/50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-6 lg:px-8 h-16 flex items-center justify-between">
        <div class="flex items-center gap-3 group cursor-pointer" onclick="window.location.href='/'">
            <div class="bg-gradient-to-br from-slate-900 to-slate-800 text-white font-bold text-xl w-8 h-8 flex items-center justify-center rounded-lg shadow-[0_2px_10px_rgba(0,0,0,0.1)] group-hover:shadow-[0_4px_15px_rgba(0,0,0,0.15)] transition-all">B</div>
            <span class="text-xl font-extrabold tracking-tight text-slate-900">Bricolify</span>
        </div>

        <div class="hidden md:flex items-center space-x-1">
            <a href="/#how-it-works" class="px-4 py-2 text-sm font-medium text-slate-500 hover:text-slate-900 hover:bg-slate-100/50 rounded-full transition-all">How it Works</a>
            <a href="/#services" class="px-4 py-2 text-sm font-medium text-slate-500 hover:text-slate-900 hover:bg-slate-100/50 rounded-full transition-all">Services</a>
            <a href="/#why-us" class="px-4 py-2 text-sm font-medium text-slate-500 hover:text-slate-900 hover:bg-slate-100/50 rounded-full transition-all">Why Bricolify</a>
        </div>

        <div class="flex items-center gap-3">
            @auth
                <!-- Added dummy user dropdown since actual auth state matters -->
                <a href="/dashboard" class="hidden sm:block text-sm font-medium text-slate-500 hover:text-slate-900 transition-colors px-3 py-2">Dashboard</a>
            @else
                <a href="/login" class="hidden sm:block text-sm font-medium text-slate-500 hover:text-slate-900 transition-colors px-3 py-2">Sign In</a>
                <a href="/register" class="relative inline-flex items-center justify-center px-5 py-2 text-sm font-semibold text-white transition-all bg-slate-900 rounded-full shadow-[0_4px_14px_0_rgb(0,0,0,0.1)] hover:shadow-[0_6px_20px_rgba(0,0,0,0.15)] hover:bg-slate-800 hover:-translate-y-0.5">
                    Get Started
                </a>
            @endauth
        </div>
    </div>
</nav>
