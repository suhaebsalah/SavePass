<div class="bg-white dark:bg-slate-800/60
            border border-indigo-300 dark:border-slate-700/60
            rounded-2xl shadow-sm p-4 sm:p-5 mb-6">
    <div class="flex flex-wrap items-center gap-3">

        {{-- Search --}}
        <div class="relative flex-1 min-w-[200px]">
            <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 dark:text-slate-500 pointer-events-none"
                 width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/>
            </svg>
            <input type="text" id="searchInput"
                   placeholder="Search by name, username, URL…"
                   class="w-full pl-10 pr-4 py-2.5
                          bg-slate-50 dark:bg-slate-900
                          border border-indigo-300 dark:border-slate-700
                          rounded-xl text-sm text-slate-900 dark:text-slate-100
                          placeholder-slate-400 dark:placeholder-slate-500
                          focus:outline-none focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 dark:focus:ring-indigo-900/40
                          transition duration-150">
        </div>

        {{-- Tabs --}}
        <div class="flex bg-slate-50 dark:bg-slate-900 border border-indigo-300 dark:border-slate-700 rounded-xl p-1 gap-0.5">
            <button id="tab-all"
                    class="tab-btn flex items-center gap-1.5 px-4 py-1.5 rounded-[9px] text-[13px] font-semibold transition-all duration-150 cursor-pointer border-0 font-[inherit]
                           bg-indigo-600 text-white shadow-sm"><x-svg.platform class="w-4 h-4" /> All</button>
            <button id="tab-web"
                    class="tab-btn flex items-center gap-1.5 px-4 py-1.5 rounded-[9px] text-[13px] font-semibold transition-all duration-150 cursor-pointer border-0 font-[inherit]
                           text-slate-500 dark:text-slate-400 bg-transparent hover:bg-slate-100 dark:hover:bg-slate-800"><x-svg.other class="w-4 h-4" /> Web</button>
            <button id="tab-app"
                    class="tab-btn flex items-center gap-1.5 px-4 py-1.5 rounded-[9px] text-[13px] font-semibold transition-all duration-150 cursor-pointer border-0 font-[inherit]
                           text-slate-500 dark:text-slate-400 bg-transparent hover:bg-slate-100 dark:hover:bg-slate-800"><svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg> App</button>
        </div>
    </div>
</div>
