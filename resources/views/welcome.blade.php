<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SavePass - Secure Password & Note Manager</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        (function () {
            var saved = localStorage.getItem('av_theme');
            var prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            document.documentElement.classList.toggle('dark', saved ? saved === 'dark' : prefersDark);
        })();
    </script>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 via-indigo-50/40 to-slate-100 dark:from-slate-950 dark:via-slate-900 dark:to-slate-950 font-sans text-slate-900 dark:text-slate-100 transition-colors duration-200 selection:bg-indigo-500 selection:text-white">

    {{-- Navbar --}}
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-violet-600 rounded-[12px] flex items-center justify-center shadow-[0_4px_14px_rgba(99,102,241,0.35)] flex-shrink-0">
                <x-svg.logo class="w-5 h-5 text-white" />
            </div>
            <div class="text-xl font-extrabold tracking-tight">SavePass</div>
        </div>
        <div class="flex items-center gap-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm font-medium hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-medium hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-xl shadow-lg shadow-indigo-600/20 transition-all">Create Account</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    {{-- Hero Section --}}
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center justify-center pt-16 pb-32 text-center">
        <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded-full bg-indigo-100 dark:bg-indigo-500/10 text-indigo-700 dark:text-indigo-300 text-sm font-medium mb-8 border border-indigo-200 dark:border-indigo-500/20">
            <span class="flex h-2 w-2 rounded-full bg-indigo-600 dark:bg-indigo-400"></span>
            Your Ultimate Digital Vault
        </div>
        
        <h1 class="text-5xl sm:text-6xl lg:text-7xl font-extrabold tracking-tight mb-8 max-w-4xl leading-tight">
            Keep Your Passwords & <br class="hidden sm:block" />
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-violet-500 dark:from-indigo-400 dark:to-violet-400">Notes Secure</span>
        </h1>
        
        <p class="text-lg sm:text-xl text-slate-600 dark:text-slate-400 max-w-2xl mb-12 leading-relaxed">
            SavePass provides a simple, secure, and intuitive way to manage all your accounts, passwords, and private notes in one safe place. Never forget a credential again.
        </p>

        <div class="flex flex-col sm:flex-row items-center gap-4">
            <a href="{{ route('register') }}" class="w-full sm:w-auto px-8 py-3.5 bg-indigo-600 hover:bg-indigo-700 text-white text-base font-semibold rounded-xl shadow-[0_8px_30px_rgb(79,70,229,0.3)] hover:shadow-[0_8px_30px_rgb(79,70,229,0.4)] transition-all transform hover:-translate-y-0.5">
                Get Started for Free
            </a>
            <a href="{{ route('login') }}" class="w-full sm:w-auto px-8 py-3.5 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-900 dark:text-white text-base font-semibold rounded-xl transition-all">
                Sign In to Account
            </a>
        </div>

        {{-- Features Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-24 text-left w-full max-w-5xl">
            <div class="bg-white/60 dark:bg-slate-900/50 backdrop-blur-xl border border-slate-200 dark:border-slate-700 rounded-3xl p-8 hover:shadow-xl transition-all">
                <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-500/20 text-emerald-600 dark:text-emerald-400 rounded-2xl flex items-center justify-center mb-6">
                    <x-svg.shield class="w-6 h-6" />
                </div>
                <h3 class="text-xl font-bold mb-3">Top-Tier Security</h3>
                <p class="text-slate-600 dark:text-slate-400">Your data is locked away. Only you have the key to access your passwords and private notes.</p>
            </div>
            
            <div class="bg-white/60 dark:bg-slate-900/50 backdrop-blur-xl border border-slate-200 dark:border-slate-700 rounded-3xl p-8 hover:shadow-xl transition-all">
                <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-500/20 text-indigo-600 dark:text-indigo-400 rounded-2xl flex items-center justify-center mb-6">
                    <x-svg.notes class="w-6 h-6" />
                </div>
                <h3 class="text-xl font-bold mb-3">Private Notes</h3>
                <p class="text-slate-600 dark:text-slate-400">Beyond just passwords, write down secure thoughts, recovery codes, and sensitive information.</p>
            </div>
            
            <div class="bg-white/60 dark:bg-slate-900/50 backdrop-blur-xl border border-slate-200 dark:border-slate-700 rounded-3xl p-8 hover:shadow-xl transition-all">
                <div class="w-12 h-12 bg-violet-100 dark:bg-violet-500/20 text-violet-600 dark:text-violet-400 rounded-2xl flex items-center justify-center mb-6">
                    <x-svg.lightning class="w-6 h-6" />
                </div>
                <h3 class="text-xl font-bold mb-3">Fast & Easy</h3>
                <p class="text-slate-600 dark:text-slate-400">Instantly retrieve what you need with our beautifully designed, highly responsive interface.</p>
            </div>
        </div>
    </main>
    
    <footer class="max-w-7xl mx-auto px-4 py-8 text-center text-sm text-slate-500 border-t border-slate-200 dark:border-slate-800">
        &copy; {{ date('Y') }} SavePass. All rights reserved.
    </footer>
</body>
</html>
