<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Bricolify | Premium Home Services' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- AlpineJS for interactive components -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-[#fafafa] text-slate-900 font-sans antialiased selection:bg-indigo-500/20 selection:text-indigo-900 overflow-x-hidden flex flex-col min-h-screen">

    <!-- Global Background Elements -->
    <div class="fixed inset-0 z-[-1] pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] rounded-full bg-indigo-500/5 blur-[120px]"></div>
        <div class="absolute top-[20%] right-[-10%] w-[30%] h-[50%] rounded-full bg-violet-500/5 blur-[120px]"></div>
    </div>

    @include('components.navbar')

    <main class="flex-grow pt-16">
        @yield('content')
    </main>

    <footer class="bg-white border-t border-slate-200/60 pt-16 pb-8 mt-auto">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12 mb-16">

                <div class="col-span-1 md:col-span-4">
                    <div class="flex items-center gap-2 mb-6">
                        <div class="bg-slate-900 text-white font-bold text-lg w-7 h-7 flex items-center justify-center rounded-md">B</div>
                        <span class="text-lg font-bold tracking-tight text-slate-900">Bricolify</span>
                    </div>
                    <p class="text-sm text-slate-500 mb-6 font-light leading-relaxed max-w-xs">
                        The modern infrastructure platform that connects humans for home repairs. Reliable, scalable, and simple.
                    </p>
                </div>

                <div class="col-span-1 md:col-span-2 md:col-start-7">
                    <h4 class="text-sm font-bold text-slate-900 mb-4">Platform</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-sm text-slate-500 font-light hover:text-indigo-600 transition-colors">How it Works</a></li>
                        <li><a href="#" class="text-sm text-slate-500 font-light hover:text-indigo-600 transition-colors">Browse Services</a></li>
                        <li><a href="#" class="text-sm text-slate-500 font-light hover:text-indigo-600 transition-colors">Trust & Safety</a></li>
                    </ul>
                </div>

                <div class="col-span-1 md:col-span-2">
                    <h4 class="text-sm font-bold text-slate-900 mb-4">For Workers</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-sm text-slate-500 font-light hover:text-indigo-600 transition-colors">Apply as Pro</a></li>
                        <li><a href="#" class="text-sm text-slate-500 font-light hover:text-indigo-600 transition-colors">Guidelines</a></li>
                    </ul>
                </div>

                <div class="col-span-1 md:col-span-2">
                    <h4 class="text-sm font-bold text-slate-900 mb-4">Company</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-sm text-slate-500 font-light hover:text-indigo-600 transition-colors">About Us</a></li>
                        <li><a href="#" class="text-sm text-slate-500 font-light hover:text-indigo-600 transition-colors">Terms of Service</a></li>
                    </ul>
                </div>

            </div>

            <div class="border-t border-slate-100 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-sm text-slate-400 font-light">
                    &copy; {{ date('Y') }} Bricolify Inc. Made with ❤️.
                </p>

                <div class="flex items-center gap-2 bg-slate-50 border border-slate-200/60 px-3 py-1.5 rounded-full">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                    </span>
                    <span class="text-xs font-medium text-slate-600 tracking-wide">All Systems Operational</span>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
