<div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">

    <div class="flex items-center gap-4 p-5 sm:p-6
                bg-white dark:bg-slate-800/60
                border border-indigo-300 dark:border-slate-700/60
                rounded-2xl shadow-sm hover:shadow-md hover:shadow-indigo-100 dark:hover:shadow-slate-900/40
                transition-all duration-200 hover:-translate-y-0.5">
        <div class="w-12 h-12 rounded-[14px] bg-indigo-50 dark:bg-indigo-900/30 flex items-center justify-center text-2xl flex-shrink-0">
            <x-svg.platform class="w-6 h-6 text-indigo-600 dark:text-indigo-400" />
        </div>
        <div>
            <div id="statTotal" class="text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight leading-none">{{ $accounts->count() }}</div>
            <div class="mt-1 text-[11px] font-semibold text-slate-400 uppercase tracking-widest">Total Accounts</div>
        </div>
    </div>
   

    <div class="flex items-center gap-4 p-5 sm:p-6
                bg-white dark:bg-slate-800/60
                border border-indigo-300 dark:border-slate-700/60
                rounded-2xl shadow-sm hover:shadow-md hover:shadow-indigo-100 dark:hover:shadow-slate-900/40
                transition-all duration-200 hover:-translate-y-0.5">
        <div class="w-12 h-12 rounded-[14px] bg-emerald-50 dark:bg-emerald-900/30 flex items-center justify-center text-2xl flex-shrink-0">
            <x-svg.other class="w-6 h-6 text-emerald-600 dark:text-emerald-400" />
        </div>
        <div>
            <div id="statWeb" class="text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight leading-none">{{ $accounts->where('type', 'web')->count() }}</div>
            <div class="mt-1 text-[11px] font-semibold text-slate-400 uppercase tracking-widest">Web Accounts</div>
        </div>
    </div>

    <div class="flex items-center gap-4 p-5 sm:p-6
                bg-white dark:bg-slate-800/60
                border border-indigo-300 dark:border-slate-700/60
                rounded-2xl shadow-sm hover:shadow-md hover:shadow-indigo-100 dark:hover:shadow-slate-900/40
                transition-all duration-200 hover:-translate-y-0.5">
        <div class="w-12 h-12 rounded-[14px] bg-violet-50 dark:bg-violet-900/30 flex items-center justify-center text-2xl flex-shrink-0">
            <svg class="w-6 h-6 text-violet-600 dark:text-violet-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
        </div>
        <div>
            <div id="statApp" class="text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight leading-none">{{ $accounts->where('type', 'app')->count() }}</div>
            <div class="mt-1 text-[11px] font-semibold text-slate-400 uppercase tracking-widest">App Accounts</div>
        </div>
    </div>
</div>
