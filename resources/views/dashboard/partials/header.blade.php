<div class="flex items-end justify-between flex-wrap gap-4 mb-7">
    <div>
        <h1 class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight leading-none mb-1">My Accounts</h1>
        <p class="text-sm text-slate-500 dark:text-slate-400">All your registered accounts in one secure place</p>
    </div>
    <div class="flex items-center gap-2">
        {{-- 🌙 Theme Toggle (dashboard only) --}}
        <button onclick="toggleTheme()" id="dashThemeBtn" type="button"
                class="flex items-center gap-1.5 px-4 py-2.5
                       bg-white dark:bg-slate-800
                       border border-indigo-300 dark:border-slate-700
                       text-slate-600 dark:text-slate-300
                       rounded-xl text-[13px] font-semibold
                       hover:border-indigo-500 dark:hover:border-indigo-500
                       hover:text-indigo-600 dark:hover:text-indigo-400
                       transition-all duration-150 cursor-pointer shadow-sm">
            <span id="themeLabel">🌙 Dark</span>
        </button>

        <a href="#" id="addAccountBtn" onclick="openAddModal(); return false;"
           class="inline-flex items-center gap-2 px-5 py-2.5
                  bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-semibold
                  rounded-xl no-underline border-0 cursor-pointer transition-all duration-150
                  hover:-translate-y-px shadow-sm hover:shadow-indigo-200 dark:hover:shadow-indigo-900/40 hover:shadow-lg">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Add Account
        </a>
    </div>
</div>
