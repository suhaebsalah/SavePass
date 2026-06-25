<div id="deleteModal" class="hidden fixed inset-0 z-[600] flex items-center justify-center p-4">
    <div onclick="closeDeleteModal()" class="absolute inset-0 bg-slate-900/40 dark:bg-slate-950/60 backdrop-blur-sm"></div>
    <div dir="rtl" class="relative w-full max-w-[360px] bg-white dark:bg-slate-900
                border border-slate-200 dark:border-slate-700
                rounded-2xl shadow-2xl p-6 animate-slide-up z-10">

        {{-- Close Button --}}
        <button onclick="closeDeleteModal()" class="absolute top-4 right-4 w-7 h-7 flex items-center justify-center bg-slate-100 dark:bg-slate-800 rounded-lg text-slate-400 hover:text-slate-700 dark:hover:text-slate-200 text-base cursor-pointer border-0 transition-all">×</button>

        {{-- Icon --}}
        <div class="flex flex-col items-center text-center mb-5">
            <div class="w-16 h-16 rounded-2xl bg-red-50 dark:bg-red-900/20 border border-red-100 dark:border-red-800/40 flex items-center justify-center mb-4">
                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" class="text-red-500">
                    <polyline points="3 6 5 6 21 6"/>
                    <path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/>
                    <path d="M10 11v6"/>
                    <path d="M14 11v6"/>
                    <path d="M9 6V4h6v2"/>
                </svg>
            </div>
            <div class="text-base font-bold text-slate-900 dark:text-white mb-1">Delete Account</div>

            <div class="text-sm text-slate-500 dark:text-slate-400 leading-relaxed">
                Are you sure to delete? This action <span class="font-semibold text-red-500">cannot be undone</span>.
            </div>
        </div>

        {{-- Buttons --}}
        <div class="flex gap-2">
            <button onclick="closeDeleteModal()" class="flex-1 py-2 bg-transparent hover:bg-red-50 dark:hover:bg-red-900/20 border border-red-400 dark:border-red-500 rounded-xl text-[13px] font-semibold text-red-500 hover:text-red-600 cursor-pointer transition-all font-[inherit]">Cancel</button>
            <button onclick="confirmDelete()" class="flex-1 py-2 bg-red-600 hover:bg-red-700 text-white rounded-xl text-[13px] font-semibold cursor-pointer transition-all border-0 font-[inherit] shadow-sm hover:shadow-red-200 dark:hover:shadow-red-900/40 hover:shadow-md">Delete</button>
        </div>
    </div>
</div>
