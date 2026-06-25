<div id="addModal" class="hidden fixed inset-0 z-[500] flex items-start sm:items-center justify-center p-3 sm:p-6 overflow-y-auto">
    {{-- Overlay --}}
    <div onclick="closeAddModal()" class="absolute inset-0 bg-slate-900/40 dark:bg-slate-950/60 backdrop-blur-sm"></div>

    {{-- Card --}}
    <div class="relative w-full max-w-[420px] sm:max-w-[460px] mx-auto my-auto bg-white dark:bg-slate-900
                border border-indigo-300 dark:border-slate-700
                rounded-2xl sm:rounded-3xl shadow-2xl dark:shadow-slate-950/60 p-5 sm:p-7 lg:p-8 animate-slide-up z-10">

        {{-- Header --}}
        <div class="flex items-start justify-between mb-4 sm:mb-6">
            <div>
                <div id="modalTitle" class="text-lg sm:text-xl font-extrabold text-slate-900 dark:text-white tracking-tight">Add New Account</div>
                <div class="text-[13px] text-slate-500 dark:text-slate-400 mt-1">Save your account credentials securely</div>
            </div>
            <button onclick="closeAddModal()"
                    class="w-8 h-8 flex items-center justify-center bg-slate-100 dark:bg-slate-800 hover:bg-slate-200 dark:hover:bg-slate-700 border border-slate-200 dark:border-slate-700 rounded-lg text-slate-400 hover:text-slate-700 dark:hover:text-slate-200 text-lg cursor-pointer transition-all duration-150 flex-shrink-0">
                ×
            </button>
        </div>

        {{-- Form --}}
        <form onsubmit="saveAccount(event)" id="accountForm">
            <input type="hidden" id="editId" value="">

            {{-- Service Name --}}
            <div class="mb-3 sm:mb-4">
                <label class="block text-[13px] font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Service Name *</label>
                <input id="f-service" type="text" required placeholder="e.g. Gmail, GitHub, Netflix"
                       class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-indigo-300 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-500 outline-none transition duration-150 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-indigo-900/40">
            </div>

            {{-- Username --}}
            <div class="mb-4">
                <label class="block text-[13px] font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Username / Email *</label>
                <input id="f-username" type="text" required placeholder="your@email.com or @handle"
                       class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-indigo-300 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-500 outline-none transition duration-150 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-indigo-900/40">
            </div>

            {{-- Phone --}}
            <div class="mb-4">
                <label class="block text-[13px] font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Phone Number</label>
                <input id="f-phone" type="tel" placeholder="+1 (555) 000-0000"
                       class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-indigo-300 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-500 outline-none transition duration-150 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-indigo-900/40">
            </div>

            {{-- Password --}}
            <div class="mb-3 sm:mb-4">
                <label class="block text-[13px] font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Password</label>
                <div class="relative">
                    <input id="f-password" type="password" placeholder="Enter password (optional)"
                           class="w-full px-4 py-2.5 pr-11 bg-slate-50 dark:bg-slate-800 border border-indigo-300 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-500 outline-none transition duration-150 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-indigo-900/40">
                    <button type="button" onclick="toggleModalPwd()"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 transition-colors cursor-pointer border-0 bg-transparent p-0">
                        <svg id="pwdEye" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/>
                        </svg>
                    </button>
                </div>
            </div>

            {{-- URL --}}
            <div class="mb-3 sm:mb-4">
                <label class="block text-[13px] font-semibold text-slate-700 dark:text-slate-300 mb-1.5">URL / Website</label>
                <input id="f-url" type="text" placeholder="https://example.com"
                       class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-indigo-300 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-500 outline-none transition duration-150 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-indigo-900/40">
            </div>


            {{-- Type --}}
            <div class="mb-4 sm:mb-6">
                <label class="block text-[13px] font-semibold text-slate-700 dark:text-slate-300 mb-2">Account Type *</label>
                <div class="flex gap-3">
                    <label id="typeWeb"
                           class="flex-1 flex items-center gap-2.5 p-3 border-2 border-indigo-500 dark:border-indigo-500 bg-indigo-50 dark:bg-indigo-900/20 rounded-xl cursor-pointer transition-all duration-150">
                        <input type="radio" name="type" value="web" checked onchange="selectType('web')" class="accent-indigo-600">
                        <span class="flex items-center gap-1.5 text-[13px] font-semibold text-slate-700 dark:text-slate-200"><x-svg.other class="w-4 h-4" /> Website</span>
                    </label>
                    <label id="typeApp"
                           class="flex-1 flex items-center gap-2.5 p-3 border-2 border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 rounded-xl cursor-pointer transition-all duration-150">
                        <input type="radio" name="type" value="app" onchange="selectType('app')" class="accent-indigo-600">
                        <span class="flex items-center gap-1.5 text-[13px] font-semibold text-slate-700 dark:text-slate-200">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="5" y="2" width="14" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg> App
                        </span>
                    </label>
                </div>
            </div>

             {{-- Note --}}
            <div class="mb-3 sm:mb-4">
                <label class="block text-[13px] font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Note</label>
                <textarea id="f-note" rows="2" placeholder="Write a note for this account"
                       class="w-full px-3.5 sm:px-4 py-2 sm:py-2.5 bg-slate-50 dark:bg-slate-800 border border-indigo-300 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-500 outline-none transition duration-150 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-indigo-900/40 resize-none"></textarea>
            </div>

            {{-- Buttons --}}
            <div class="flex gap-2 sm:gap-3 mt-1">
                <button type="button" onclick="closeAddModal()"
                        class="flex-1 py-2 sm:py-2.5 bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 border border-indigo-300 dark:border-slate-700 rounded-xl text-sm font-semibold text-slate-600 dark:text-slate-300 cursor-pointer transition-all duration-150 font-[inherit]">
                    Cancel
                </button>
                <button type="submit"
                        class="flex-[2] py-2 sm:py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-sm font-bold cursor-pointer transition-all duration-150 font-[inherit] shadow-sm hover:shadow-indigo-200 dark:hover:shadow-indigo-900/40 hover:shadow-lg hover:-translate-y-px">
                    <span id="submitLabel">Save Account</span>
                </button>
            </div>
        </form>
    </div>
</div>
