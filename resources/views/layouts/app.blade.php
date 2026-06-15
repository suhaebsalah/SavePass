<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Manage all your registered accounts across apps and websites">

    <title>{{ config('app.name', 'AuthVault') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Apply saved theme BEFORE paint to prevent flash --}}
    <script>
        (function () {
            var saved = localStorage.getItem('av_theme');
            var prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            var dark = saved ? saved === 'dark' : prefersDark;
            document.documentElement.classList.toggle('dark', dark);
        })();
    </script>
</head>
<body class="min-h-screen bg-slate-100 dark:bg-slate-900 text-slate-900 dark:text-slate-100 transition-colors duration-200 font-sans">
    @include('layouts.navigation')
    <main>{{ $slot }}</main>

    <script>
        function toggleTheme() {
            var dark = document.documentElement.classList.toggle('dark');
            localStorage.setItem('av_theme', dark ? 'dark' : 'light');
            // Update icon label
            var label = document.getElementById('themeLabel');
            if (label) label.textContent = dark ? '☀️ Light' : '🌙 Dark';
        }
    </script>
</body>
</html>
