<x-app-layout>

<div class="max-w-[860px] mx-auto px-4 sm:px-6 py-8 pb-16">

    {{-- ── Page Header ── --}}
    <div class="mb-7">
        <h1 class="flex items-center gap-3 text-2xl font-extrabold text-slate-900 dark:text-white tracking-tight mb-1.5">
            <span class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-violet-600 rounded-[11px] flex items-center justify-center text-lg shadow-[0_2px_8px_rgba(99,102,241,0.3)] flex-shrink-0">👤</span>
            Profile Settings
        </h1>
        <p class="text-sm text-slate-500 dark:text-slate-400">Manage your personal information, password and account security.</p>
    </div>

    {{-- ── Profile Information Card ── --}}
    <div class="bg-white dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700/60 rounded-2xl shadow-sm hover:shadow-md dark:hover:shadow-slate-900/40 p-6 sm:p-7 mb-4 transition-shadow duration-200">
        <div class="flex items-center gap-3 pb-5 mb-5 border-b border-slate-100 dark:border-slate-700/60">
            <div class="w-9 h-9 bg-indigo-50 dark:bg-indigo-900/30 border border-indigo-100 dark:border-indigo-800/40 rounded-[10px] flex items-center justify-center flex-shrink-0">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6366f1" stroke-width="2" stroke-linecap="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                </svg>
            </div>
            <div>
                <div class="text-[14px] font-bold text-slate-900 dark:text-white">Profile Information</div>
                <div class="text-[12px] text-slate-500 dark:text-slate-400">Update your display name and email address</div>
            </div>
        </div>
        <div class="max-w-xl">
            @include('profile.partials.update-profile-information-form')
        </div>
    </div>

    {{-- ── Update Password Card ── --}}
    <div class="bg-white dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700/60 rounded-2xl shadow-sm hover:shadow-md dark:hover:shadow-slate-900/40 p-6 sm:p-7 mb-4 transition-shadow duration-200">
        <div class="flex items-center gap-3 pb-5 mb-5 border-b border-slate-100 dark:border-slate-700/60">
            <div class="w-9 h-9 bg-indigo-50 dark:bg-indigo-900/30 border border-indigo-100 dark:border-indigo-800/40 rounded-[10px] flex items-center justify-center flex-shrink-0">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#6366f1" stroke-width="2" stroke-linecap="round">
                    <rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                </svg>
            </div>
            <div>
                <div class="text-[14px] font-bold text-slate-900 dark:text-white">Update Password</div>
                <div class="text-[12px] text-slate-500 dark:text-slate-400">Use a long, random password for maximum security</div>
            </div>
        </div>
        <div class="max-w-xl">
            @include('profile.partials.update-password-form')
        </div>
    </div>

    {{-- ── Delete Account Card ── --}}
    <div class="bg-white dark:bg-slate-800/60 border border-red-200 dark:border-red-900/40 rounded-2xl shadow-sm hover:shadow-md p-6 sm:p-7 mb-4 transition-shadow duration-200">
        <div class="flex items-center gap-3 pb-5 mb-5 border-b border-red-100 dark:border-red-900/30">
            <div class="w-9 h-9 bg-red-50 dark:bg-red-900/20 border border-red-100 dark:border-red-800/40 rounded-[10px] flex items-center justify-center flex-shrink-0">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round">
                    <polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                    <path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4h6v2"/>
                </svg>
            </div>
            <div>
                <div class="text-[14px] font-bold text-red-600 dark:text-red-400">Delete Account</div>
                <div class="text-[12px] text-slate-500 dark:text-slate-400">Permanently remove your account — this cannot be undone</div>
            </div>
        </div>
        <div class="max-w-xl">
            @include('profile.partials.delete-user-form')
        </div>
    </div>
</div>

</x-app-layout>
