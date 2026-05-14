<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Bricolify | Authentication' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#fafafa] text-slate-900 font-sans antialiased selection:bg-indigo-500/20 selection:text-indigo-900 overflow-x-hidden flex flex-col min-h-screen">

    <div class="fixed inset-0 z-[-1] pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] rounded-full bg-indigo-500/5 blur-[120px]"></div>
        <div class="absolute top-[20%] right-[-10%] w-[30%] h-[50%] rounded-full bg-violet-500/5 blur-[120px]"></div>
    </div>

    <main class="flex-grow">
        @yield('content')
    </main>

</body>
</html>
