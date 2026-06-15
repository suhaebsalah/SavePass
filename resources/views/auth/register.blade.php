<x-guest-layout>
    <h1 class="text-2xl font-extrabold text-slate-900 dark:text-white tracking-tight mb-1">Create account</h1>
    <p class="text-[13px] text-slate-500 dark:text-slate-400 mb-7">Start managing your accounts securely</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        {{-- Name --}}
        <div class="mb-4">
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input id="name" type="text" name="name"
                :value="old('name')" required autofocus autocomplete="name"
                placeholder="John Doe" />
            <x-input-error :messages="$errors->get('name')" class="mt-1.5" />
        </div>

        {{-- Email --}}
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email address')" />
            <x-text-input id="email" type="email" name="email"
                :value="old('email')" required autocomplete="username"
                placeholder="you@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
        </div>

        {{-- Password --}}
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <div class="relative">
                <x-text-input id="password" type="password" name="password"
                    required autocomplete="new-password"
                    placeholder="At least 8 characters" class="pr-11" />
                <button type="button" onclick="toggleRegPwd('password')"
                        class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 cursor-pointer border-0 bg-transparent transition-colors">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-1.5" />
        </div>

        {{-- Confirm Password --}}
        <div class="mb-6">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <div class="relative">
                <x-text-input id="password_confirmation" type="password"
                    name="password_confirmation" required autocomplete="new-password"
                    placeholder="Repeat your password" class="pr-11" />
                <button type="button" onclick="toggleRegPwd('password_confirmation')"
                        class="absolute right-3.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 cursor-pointer border-0 bg-transparent transition-colors">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                    </svg>
                </button>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1.5" />
        </div>

        <x-primary-button class="w-full justify-center">
            {{ __('Create Account') }}
        </x-primary-button>

        <div class="text-center mt-5">
            <a href="{{ route('login') }}"
               class="text-[13px] font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 no-underline transition-colors">
                Already have an account? Sign in
            </a>
        </div>
    </form>

    <script>
        function toggleRegPwd(id) {
            var inp = document.getElementById(id);
            inp.type = inp.type === 'password' ? 'text' : 'password';
        }
    </script>
</x-guest-layout>
