<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Manage all your registered accounts securely">

    <title>{{ config('app.name', 'AuthVault') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Apply saved theme BEFORE paint to prevent flash --}}
    <script>
        (function () {
            var saved = localStorage.getItem('av_theme');
            var prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            document.documentElement.classList.toggle('dark', saved ? saved === 'dark' : prefersDark);
        })();
    </script>
</head>

<body class="min-h-screen bg-gradient-to-br from-slate-50 via-indigo-50/40 to-slate-100 dark:from-slate-950 dark:via-slate-900 dark:to-slate-950 font-sans transition-colors duration-200">


    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-10 gap-6">

        {{-- Logo --}}
        <a href="/" class="flex items-center gap-3 no-underline">
            <div class="w-12 h-12 bg-gradient-to-br from-indigo-500 to-violet-600 rounded-[14px] flex items-center justify-center shadow-[0_4px_14px_rgba(99,102,241,0.35)] flex-shrink-0">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                </svg>
            </div>
            <div class="leading-none">
                <div class="text-[22px] font-extrabold text-slate-900 dark:text-white tracking-tight">{{ config('app.name', 'AuthVault') }}</div>
                <div class="text-[11px] text-indigo-500 font-semibold tracking-widest uppercase mt-1">SavePass</div>
            </div>
        </a>

        {{-- Auth Card --}}
        <div class="w-full max-w-[420px]
                    bg-white dark:bg-slate-900
                    border border-slate-200 dark:border-slate-700/70
                    rounded-2xl shadow-xl dark:shadow-slate-950/50
                    px-8 py-8
                    animate-slide-up">
            {{ $slot }}
        </div>

        {{-- Footer --}}
        <p class="text-xs text-slate-400 dark:text-slate-600">
            © {{ date('Y') }} {{ config('app.name') }} · Secure Account Management
        </p>
    </div>

    <script>
        // Init icon
        (function() {
            var dark = document.documentElement.classList.contains('dark');
            var icon = document.getElementById('guestThemeIcon');
            if (icon) icon.textContent = dark ? '☀️' : '🌙';
        })();

        
    </script>
</body>
</html>
