<x-guest-layout>
    <h1 class="text-2xl font-extrabold text-slate-900 dark:text-white tracking-tight mb-1">Forgot Password?</h1>
    <p class="text-[13px] text-slate-500 dark:text-slate-400 mb-7">
        Enter your email and we'll send you a reset link.
    </p>

    @if (session('status'))
        <div class="mb-5 px-4 py-3 bg-emerald-50 dark:bg-emerald-900/20 border border-emerald-200 dark:border-emerald-700/50 text-emerald-700 dark:text-emerald-400 text-[13px] font-medium rounded-xl">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="mb-5">
            <x-input-label for="email" :value="__('Email address')" />
            <x-text-input id="email" type="email" name="email"
                :value="old('email')" required autofocus placeholder="you@example.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-1.5" />
        </div>

        <x-primary-button class="w-full justify-center">
            {{ __('Send Reset Link') }}
        </x-primary-button>

        <div class="text-center mt-5">
            <a href="{{ route('login') }}"
               class="text-[13px] font-medium text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 no-underline transition-colors">
                ← Back to Sign In
            </a>
        </div>
    </form>
</x-guest-layout>
