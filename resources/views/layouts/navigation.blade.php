{{-- ═══════════════════════════════════════════════════════
     Navigation — Tailwind CSS, Dark/Light Mode
═══════════════════════════════════════════════════════ --}}

<nav class="sticky top-0 z-[100] bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-700/60 shadow-sm transition-colors duration-200">
    <div class="max-w-[1440px] mx-auto px-6 h-16 flex items-center justify-between gap-4">

        {{-- Logo --}}
        <a href="{{ route('dashboard') }}" class="flex items-center gap-2.5 no-underline flex-shrink-0">
            <div class="w-9 h-9 bg-gradient-to-br from-indigo-500 to-violet-600 rounded-[10px] flex items-center justify-center shadow-[0_2px_8px_rgba(99,102,241,0.35)] flex-shrink-0">
                <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                </svg>
            </div>
            <div>
                <div class="text-[17px] font-extrabold text-slate-900 dark:text-white tracking-tight leading-none">SavePass</div>
                <div class="text-[11px] text-indigo-500 font-semibold tracking-wide leading-none mt-0.5">Account Manager</div>
            </div>
        </a>

        {{-- Desktop Right --}}
        <div class="hidden md:flex items-center gap-2">



            {{-- + Add Account --}}
            <a href="#" id="navAddBtn"
               class="flex items-center gap-1.5 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-[13px] font-semibold rounded-[10px] no-underline transition-all duration-150 hover:-translate-y-px hover:shadow-lg hover:shadow-indigo-200 dark:hover:shadow-indigo-900/40">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                    <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
                </svg>
                Add Account
            </a>

            {{-- Theme Toggle: lives on dashboard only --}}

            {{-- User Chip + Dropdown --}}
            <div class="relative" id="userMenuWrap">
                <button onclick="toggleUserMenu(this)" type="button" id="userMenuBtn"
                        class="flex items-center gap-2 pl-1.5 pr-3 py-1.5
                               bg-slate-50 dark:bg-slate-800
                               border border-slate-200 dark:border-slate-700
                               rounded-full text-[13px] font-semibold
                               text-slate-800 dark:text-slate-100
                               hover:border-indigo-400 dark:hover:border-indigo-500
                               hover:shadow-[0_0_0_3px_rgba(99,102,241,0.1)]
                               transition-all duration-150 cursor-pointer">
                    <span class="w-7 h-7 rounded-full bg-gradient-to-br from-indigo-500 to-violet-600 text-white flex items-center justify-center text-[11px] font-bold flex-shrink-0">
                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                    </span>
                    <span class="max-w-[110px] truncate">{{ Auth::user()->name }}</span>
                    <svg id="userChevron" class="w-3.5 h-3.5 text-slate-400 flex-shrink-0 transition-transform duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                        <polyline points="6 9 12 15 18 9"/>
                    </svg>
                </button>

                {{-- Dropdown --}}
                <div id="userDropdown"
                     class="hidden absolute top-[calc(100%+10px)] right-0 min-w-[220px]
                            bg-white dark:bg-slate-900
                            border border-slate-200 dark:border-slate-700
                            rounded-2xl shadow-xl dark:shadow-slate-900/60 p-1.5 z-[200] animate-drop-in">

                    <div class="px-3 pt-3 pb-2.5 border-b border-slate-100 dark:border-slate-700/60 mb-1">
                        <div class="text-[13.5px] font-bold text-slate-900 dark:text-white">{{ Auth::user()->name }}</div>
                        <div class="text-[11.5px] text-slate-500 dark:text-slate-400 mt-0.5 truncate">{{ Auth::user()->email }}</div>
                    </div>

                    <a href="{{ route('profile.edit') }}"
                       class="flex items-center gap-2 px-3 py-2.5 rounded-xl text-[13px] font-medium text-slate-600 dark:text-slate-300 no-underline hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-slate-900 dark:hover:text-white transition-colors duration-100">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
                        </svg>
                        Profile Settings
                    </a>

                    <div class="h-px bg-slate-100 dark:bg-slate-700/60 my-1"></div>

                    <form method="POST" action="{{ route('logout') }}" id="ddLogoutForm">
                        @csrf
                        <button type="button" onclick="document.getElementById('ddLogoutForm').submit()"
                                class="w-full flex items-center gap-2 px-3 py-2.5 rounded-xl text-[13px] font-medium text-red-500 dark:text-red-400 bg-transparent border-0 cursor-pointer text-left hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors duration-100 font-[inherit]">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                                <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/>
                            </svg>
                            Log Out
                        </button>
                    </form>
                </div>
            </div>

            {{-- Direct Logout --}}
            <form method="POST" action="{{ route('logout') }}" id="navLogoutForm">
                @csrf
                <button type="button" onclick="document.getElementById('navLogoutForm').submit()"
                        class="px-3.5 py-2 bg-red-50 dark:bg-red-900/20 text-red-600 dark:text-red-400 border border-red-200 dark:border-red-800/50 rounded-[10px] text-[13px] font-semibold hover:bg-red-100 dark:hover:bg-red-900/30 transition-all duration-150 cursor-pointer font-[inherit]">
                    Log Out
                </button>
            </form>
        </div>

        {{-- Mobile Hamburger --}}
        <button onclick="toggleMobileMenu()" type="button" id="hamburgerBtn"
                class="md:hidden flex items-center justify-center w-10 h-10 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-[10px] hover:border-indigo-400 transition-all duration-150 cursor-pointer">
            <svg id="iconOpen" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="text-slate-600 dark:text-slate-300">
                <line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/>
            </svg>
            <svg id="iconClose" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" class="hidden text-slate-600 dark:text-slate-300">
                <line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/>
            </svg>
        </button>
    </div>

    {{-- Mobile Drawer --}}
    <div id="mobileMenu" class="hidden md:hidden border-t border-slate-200 dark:border-slate-700/60 bg-white dark:bg-slate-900 px-5 py-4 space-y-2">

        {{-- User Info --}}
        <div class="flex items-center gap-3 p-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-2xl mb-2">
            <span class="w-10 h-10 rounded-full bg-gradient-to-br from-indigo-500 to-violet-600 text-white flex items-center justify-center text-[13px] font-bold flex-shrink-0">
                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
            </span>
            <div class="min-w-0">
                <div class="text-[14px] font-bold text-slate-900 dark:text-white truncate">{{ Auth::user()->name }}</div>
                <div class="text-[11.5px] text-slate-500 dark:text-slate-400 truncate">{{ Auth::user()->email }}</div>
            </div>
        </div>

        <a href="#" id="mobileAddBtn"
           class="flex items-center gap-2.5 w-full px-4 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl no-underline text-[14px] font-semibold transition-all duration-150">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                <line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/>
            </svg>
            Add Account
        </a>

        {{-- Theme Toggle: lives on dashboard only --}}

        <a href="{{ route('profile.edit') }}"
           class="flex items-center gap-2.5 w-full px-4 py-3 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:border-indigo-400 rounded-xl no-underline text-[14px] font-semibold text-slate-700 dark:text-slate-300 transition-all duration-150">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>
            </svg>
            Profile Settings
        </a>

        <form method="POST" action="{{ route('logout') }}" id="mobileLogoutForm">
            @csrf
            <button type="button" onclick="document.getElementById('mobileLogoutForm').submit()"
                    class="flex items-center gap-2.5 w-full px-4 py-3 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800/50 hover:border-red-400 rounded-xl text-[14px] font-semibold text-red-600 dark:text-red-400 transition-all duration-150 cursor-pointer font-[inherit] text-left">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/>
                </svg>
                Log Out
            </button>
        </form>
    </div>
</nav>

<script>
    /* ── Init theme label ── */
    (function() {
        var dark = document.documentElement.classList.contains('dark');
        var label = document.getElementById('themeLabel');
        var mLabel = document.getElementById('mobilethemeLabel');
        if (label) label.textContent = dark ? '☀️ Light' : '🌙 Dark';
        if (mLabel) mLabel.textContent = dark ? '☀️ Light Mode' : '🌙 Dark Mode';
    })();

    /* Override toggleTheme to also update nav labels */
    var _origToggle = window.toggleTheme;
    window.toggleTheme = function() {
        var dark = document.documentElement.classList.toggle('dark');
        localStorage.setItem('av_theme', dark ? 'dark' : 'light');
        var label = document.getElementById('themeLabel');
        var mLabel = document.getElementById('mobilethemeLabel');
        if (label) label.textContent = dark ? '☀️ Light' : '🌙 Dark';
        if (mLabel) mLabel.textContent = dark ? '☀️ Light Mode' : '🌙 Dark Mode';
    };

    /* ── User dropdown ── */
    function toggleUserMenu(btn) {
        var dd = document.getElementById('userDropdown');
        var chevron = document.getElementById('userChevron');
        var isOpen = dd.classList.toggle('hidden');
        // isOpen=true means it just became hidden (was open)
        var nowOpen = !dd.classList.contains('hidden');
        if (chevron) chevron.style.transform = nowOpen ? 'rotate(180deg)' : '';
    }
    document.addEventListener('click', function(e) {
        var wrap = document.getElementById('userMenuWrap');
        if (wrap && !wrap.contains(e.target)) {
            document.getElementById('userDropdown').classList.add('hidden');
            var chevron = document.getElementById('userChevron');
            if (chevron) chevron.style.transform = '';
        }
    });

    /* ── Mobile menu ── */
    function toggleMobileMenu() {
        var menu  = document.getElementById('mobileMenu');
        var open  = document.getElementById('iconOpen');
        var close = document.getElementById('iconClose');
        var nowOpen = menu.classList.toggle('hidden') === false;
        // classList.toggle returns true if class is now present (hidden)
        var isOpen = !menu.classList.contains('hidden');
        open.classList.toggle('hidden', isOpen);
        close.classList.toggle('hidden', !isOpen);
    }
</script>
