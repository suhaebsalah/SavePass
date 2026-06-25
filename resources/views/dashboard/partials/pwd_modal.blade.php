<div id="pwdModal" class="hidden fixed inset-0 z-[600] flex items-center justify-center p-4">
    <div onclick="closePwdModal()" class="absolute inset-0 bg-slate-900/40 dark:bg-slate-950/60 backdrop-blur-sm"></div>
    <div class="relative w-full max-w-[360px] bg-white dark:bg-slate-900
                border border-slate-200 dark:border-slate-700
                rounded-2xl shadow-2xl p-6 animate-slide-up z-10">
        <div class="flex items-center justify-between mb-4">
            <div class="text-base font-bold text-slate-900 dark:text-white" id="pwdModalService">Password</div>
            <button onclick="closePwdModal()" class="w-7 h-7 flex items-center justify-center bg-slate-100 dark:bg-slate-800 rounded-lg text-slate-400 hover:text-slate-700 dark:hover:text-slate-200 text-base cursor-pointer border-0 transition-all">×</button>
        </div>
        <div class="mb-3">
            <div class="text-[11px] font-semibold text-slate-400 uppercase tracking-widest mb-1">Username</div>
            <div id="pwdModalUser" class="text-sm font-medium text-slate-700 dark:text-slate-300 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl px-3 py-2 break-all"></div>
        </div>
        <div class="mb-4">
            <div class="text-[11px] font-semibold text-slate-400 uppercase tracking-widest mb-1">Password</div>
            <div class="relative">
                <div id="pwdModalPwd" class="text-sm font-mono text-slate-700 dark:text-slate-300 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl px-3 py-2 break-all pr-10"></div>
                <button onclick="togglePwdView()" class="absolute right-2.5 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 cursor-pointer border-0 bg-transparent transition-colors">
                    <svg id="pwdViewEye" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                    </svg>
                </button>
            </div>
        </div>
        <div class="flex gap-2">
            <button onclick="copyPwd()" class="flex-1 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-[13px] font-semibold cursor-pointer transition-all border-0 font-[inherit]">Copy Password</button>
            <button onclick="copyUser()" class="flex-1 py-2 bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 border border-slate-200 dark:border-slate-700 rounded-xl text-[13px] font-semibold text-slate-600 dark:text-slate-300 cursor-pointer transition-all font-[inherit]">Copy User</button>
        </div>
    </div>
</div>
