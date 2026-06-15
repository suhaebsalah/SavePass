<x-guest-layout>
    <h1 class="text-2xl font-extrabold text-slate-900 dark:text-white tracking-tight mb-1">Welcome back</h1>
    <p class="text-[13px] text-slate-500 dark:text-slate-400 mb-7">Sign in to your account to continue</p>

    {{-- Session Status --}}
    @if (session('status'))
        <div class="mb-5 px-4 py-3 bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-700/50 text-emerald-700 dark:text-emerald-400 text-[13px] font-medium rounded-xl">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        {{-- Email --}}
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email address')" />
            <x-text-input id="email" type="email" name="email"
                :value="old('email')" required autofocus autocomplete="username"
                placeholder="you@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
        </div>

        {{-- Password --}}
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <div class="relative">
                <x-text-input id="password" type="password" name="password"
                    required autocomplete="current-password"
                    placeholder="••••••••" class="pr-11" />
                <button type="button" onclick="toggleLoginPwd()"
                        class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 cursor-pointer border-0 bg-transparent transition-colors">
                    <svg id="loginPwdEye" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-1.5" />
        </div>

        {{-- Remember Me --}}
        <div class="mb-5">
            <label class="flex items-center gap-2.5 cursor-pointer">
                <input id="remember_me" type="checkbox" name="remember"
                       class="w-4 h-4 rounded accent-indigo-600 cursor-pointer border-slate-300 dark:border-slate-600">
                <span class="text-[13px] font-medium text-slate-600 dark:text-slate-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        {{-- Submit --}}
        <x-primary-button class="w-full justify-center">
            {{ __('Sign In') }}
        </x-primary-button>

        {{-- Links --}}
        <div class="flex items-center justify-between flex-wrap gap-2 mt-5">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}"
                   class="text-[13px] font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 no-underline transition-colors">
                    Forgot password?
                </a>
            @endif
            <a href="{{ route('register') }}"
               class="text-[13px] font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 no-underline transition-colors">
                Create an account →
            </a>
        </div>
    </form>

    <script>
        function toggleLoginPwd() {
            var inp = document.getElementById('password');
            inp.type = inp.type === 'password' ? 'text' : 'password';
        }
    </script>
</x-guest-layout>
