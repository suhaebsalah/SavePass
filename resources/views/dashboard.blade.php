<x-app-layout>

{{-- ══════════════════════════════════════════
     Dashboard — Tailwind CSS · Dark/Light Mode
     Accounts with: service, username, password, url, type
══════════════════════════════════════════ --}}

<div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 py-8 pb-16">

    {{-- ── Page Header ── --}}
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

    {{-- ── Stats Grid ── --}}
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">

        <div class="flex items-center gap-4 p-5 sm:p-6
                    bg-white dark:bg-slate-800/60
                    border border-indigo-300 dark:border-slate-700/60
                    rounded-2xl shadow-sm hover:shadow-md hover:shadow-indigo-100 dark:hover:shadow-slate-900/40
                    transition-all duration-200 hover:-translate-y-0.5">
            <div class="w-12 h-12 rounded-[14px] bg-indigo-50 dark:bg-indigo-900/30 flex items-center justify-center text-2xl flex-shrink-0">📋</div>
            <div>
                <div id="statTotal" class="text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight leading-none">0</div>
                <div class="mt-1 text-[11px] font-semibold text-slate-400 uppercase tracking-widest">Total Accounts</div>
            </div>
        </div>

        <div class="flex items-center gap-4 p-5 sm:p-6
                    bg-white dark:bg-slate-800/60
                    border border-indigo-300 dark:border-slate-700/60
                    rounded-2xl shadow-sm hover:shadow-md hover:shadow-indigo-100 dark:hover:shadow-slate-900/40
                    transition-all duration-200 hover:-translate-y-0.5">
            <div class="w-12 h-12 rounded-[14px] bg-emerald-50 dark:bg-emerald-900/30 flex items-center justify-center text-2xl flex-shrink-0">🌐</div>
            <div>
                <div id="statWeb" class="text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight leading-none">0</div>
                <div class="mt-1 text-[11px] font-semibold text-slate-400 uppercase tracking-widest">Web Accounts</div>
            </div>
        </div>

        <div class="flex items-center gap-4 p-5 sm:p-6
                    bg-white dark:bg-slate-800/60
                    border border-indigo-300 dark:border-slate-700/60
                    rounded-2xl shadow-sm hover:shadow-md hover:shadow-indigo-100 dark:hover:shadow-slate-900/40
                    transition-all duration-200 hover:-translate-y-0.5">
            <div class="w-12 h-12 rounded-[14px] bg-violet-50 dark:bg-violet-900/30 flex items-center justify-center text-2xl flex-shrink-0">📱</div>
            <div>
                <div id="statApp" class="text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight leading-none">0</div>
                <div class="mt-1 text-[11px] font-semibold text-slate-400 uppercase tracking-widest">App Accounts</div>
            </div>
        </div>
    </div>

    {{-- ── Search & Filter Toolbar ── --}}
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
                <input type="text" id="searchInput" oninput="render()"
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
                <button id="tab-all" onclick="setTab('all',this)"
                        class="tab-btn flex items-center gap-1.5 px-4 py-1.5 rounded-[9px] text-[13px] font-semibold transition-all duration-150 cursor-pointer border-0 font-[inherit]
                               bg-indigo-600 text-white shadow-sm">📋 All</button>
                <button id="tab-web" onclick="setTab('web',this)"
                        class="tab-btn flex items-center gap-1.5 px-4 py-1.5 rounded-[9px] text-[13px] font-semibold transition-all duration-150 cursor-pointer border-0 font-[inherit]
                               text-slate-500 dark:text-slate-400 bg-transparent hover:bg-slate-100 dark:hover:bg-slate-800">🌐 Web</button>
                <button id="tab-app" onclick="setTab('app',this)"
                        class="tab-btn flex items-center gap-1.5 px-4 py-1.5 rounded-[9px] text-[13px] font-semibold transition-all duration-150 cursor-pointer border-0 font-[inherit]
                               text-slate-500 dark:text-slate-400 bg-transparent hover:bg-slate-100 dark:hover:bg-slate-800">📱 App</button>
            </div>
        </div>
    </div>

    {{-- ── Section Header ── --}}
    <div class="flex items-center justify-between mb-4">
        <span class="text-base font-bold text-slate-900 dark:text-white">Accounts</span>
        <span id="resultCount" class="text-xs font-semibold text-slate-400 bg-slate-100 dark:bg-slate-800 dark:text-slate-400 px-3 py-1 rounded-full">0 accounts</span>
    </div>

    {{-- ── Account Cards Grid ── --}}
    <div id="accountsGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        {{-- Rendered by JS --}}
    </div>
</div>

{{-- ════════════════════════════════════
     Add / Edit Account Modal
════════════════════════════════════ --}}
<div id="addModal" class="hidden fixed inset-0 z-[500] flex items-center justify-center p-4">
    {{-- Overlay --}}
    <div onclick="closeAddModal()" class="absolute inset-0 bg-slate-900/40 dark:bg-slate-950/60 backdrop-blur-sm"></div>

    {{-- Card --}}
    <div class="relative w-full max-w-[480px] bg-white dark:bg-slate-900
                border border-indigo-300 dark:border-slate-700
                rounded-3xl shadow-2xl dark:shadow-slate-950/60 p-7 sm:p-8 animate-slide-up z-10">

        {{-- Header --}}
        <div class="flex items-start justify-between mb-6">
            <div>
                <div id="modalTitle" class="text-xl font-extrabold text-slate-900 dark:text-white tracking-tight">Add New Account</div>
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
            <div class="mb-4">
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

            {{-- Password --}}
            <div class="mb-4">
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
            <div class="mb-4">
                <label class="block text-[13px] font-semibold text-slate-700 dark:text-slate-300 mb-1.5">URL / Website</label>
                <input id="f-url" type="text" placeholder="https://example.com"
                       class="w-full px-4 py-2.5 bg-slate-50 dark:bg-slate-800 border border-indigo-300 dark:border-slate-700 rounded-xl text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-500 outline-none transition duration-150 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100 dark:focus:ring-indigo-900/40">
            </div>

            {{-- Type --}}
            <div class="mb-6">
                <label class="block text-[13px] font-semibold text-slate-700 dark:text-slate-300 mb-2">Account Type *</label>
                <div class="flex gap-3">
                    <label id="typeWeb"
                           class="flex-1 flex items-center gap-2.5 p-3 border-2 border-indigo-500 bg-indigo-50 dark:bg-indigo-900/20 dark:border-indigo-500 rounded-xl cursor-pointer transition-all duration-150">
                        <input type="radio" name="type" value="web" checked onchange="selectType('web')" class="accent-indigo-600">
                        <span class="text-[13px] font-semibold text-slate-700 dark:text-slate-200">🌐 Website</span>
                    </label>
                    <label id="typeApp"
                           class="flex-1 flex items-center gap-2.5 p-3 border-2 border-indigo-300 dark:border-slate-700 bg-white dark:bg-slate-800 rounded-xl cursor-pointer transition-all duration-150">
                        <input type="radio" name="type" value="app" onchange="selectType('app')" class="accent-indigo-600">
                        <span class="text-[13px] font-semibold text-slate-700 dark:text-slate-200">📱 App</span>
                    </label>
                </div>
            </div>

            {{-- Buttons --}}
            <div class="flex gap-3">
                <button type="button" onclick="closeAddModal()"
                        class="flex-1 py-2.5 bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 border border-indigo-300 dark:border-slate-700 rounded-xl text-sm font-semibold text-slate-600 dark:text-slate-300 cursor-pointer transition-all duration-150 font-[inherit]">
                    Cancel
                </button>
                <button type="submit"
                        class="flex-[2] py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-sm font-bold cursor-pointer transition-all duration-150 font-[inherit] shadow-sm hover:shadow-indigo-200 dark:hover:shadow-indigo-900/40 hover:shadow-lg hover:-translate-y-px">
                    <span id="submitLabel">Save Account</span>
                </button>
            </div>
        </form>
    </div>
</div>

{{-- ════════════════════════════════════
     View Password Modal
════════════════════════════════════ --}}
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

<script>
/* ══════════════════════════════════
   Data store
══════════════════════════════════ */
var accounts = JSON.parse(localStorage.getItem('av_accounts') || '[]');

/* Seed demo data */
if (accounts.length === 0) {
    accounts = [
        { id: 1, service:'GitHub',    username:'yourhandle',    password:'gh_p@ss123!',    url:'github.com',       type:'web', icon:'🐙' },
        { id: 2, service:'Gmail',     username:'you@gmail.com', password:'Gm@ilSec!',      url:'mail.google.com',  type:'web', icon:'📧' },
        { id: 3, service:'Netflix',   username:'you@email.com', password:'Netf1ix#2024',   url:'netflix.com',      type:'web', icon:'🎬' },
        { id: 4, service:'Spotify',   username:'@yourname',     password:'Sp0t!fyR0cks',   url:'spotify.com',      type:'app', icon:'🎵' },
        { id: 5, service:'Instagram', username:'@yourgram',     password:'Insta@Gr@m!',    url:'instagram.com',    type:'app', icon:'📸' },
    ];
    localStorage.setItem('av_accounts', JSON.stringify(accounts));
}

var currentTab = 'all';
var viewPwdState = { id: null, shown: false };

/* ── Helpers ── */
function getIcon(service) {
    var icons = { github:'🐙', gmail:'📧', google:'🔍', youtube:'▶️', netflix:'🎬',
        spotify:'🎵', instagram:'📸', twitter:'🐦', facebook:'📘', discord:'💬',
        slack:'💼', notion:'📝', figma:'🎨', trello:'📋', linkedin:'💼',
        amazon:'📦', apple:'🍎', microsoft:'🪟', dropbox:'📦', zoom:'📹',
        twitter:'🐦', tiktok:'🎵', snapchat:'👻', reddit:'🤖', pinterest:'📌',
        paypal:'💳', stripe:'💳', shopify:'🛍️', wordpress:'📝', github:'🐙' };
    var key = service.toLowerCase().replace(/\s+/g,'');
    for (var k in icons) { if (key.includes(k)) return icons[k]; }
    return '🔐';
}

function escHtml(s) {
    if (!s) return '';
    return String(s).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
}

function maskPassword(pwd) {
    if (!pwd) return '—';
    return '•'.repeat(Math.min(pwd.length, 12));
}

/* ── Render Cards ── */
function render() {
    var query = (document.getElementById('searchInput').value || '').toLowerCase();
    var filtered = accounts.filter(function(a) {
        if (currentTab !== 'all' && a.type !== currentTab) return false;
        if (!query) return true;
        return (a.service + ' ' + a.username + ' ' + (a.url||'')).toLowerCase().includes(query);
    });

    document.getElementById('resultCount').textContent = filtered.length + ' account' + (filtered.length !== 1 ? 's' : '');
    document.getElementById('statTotal').textContent = accounts.length;
    document.getElementById('statWeb').textContent   = accounts.filter(function(a){ return a.type==='web'; }).length;
    document.getElementById('statApp').textContent   = accounts.filter(function(a){ return a.type==='app'; }).length;

    var grid = document.getElementById('accountsGrid');

    if (filtered.length === 0) {
        grid.innerHTML =
            '<div class="col-span-full flex flex-col items-center justify-center py-16 text-slate-400 dark:text-slate-500">' +
                '<div class="w-16 h-16 bg-slate-100 dark:bg-slate-800 rounded-2xl flex items-center justify-center text-3xl mb-4">🔍</div>' +
                '<div class="text-base font-bold text-slate-500 dark:text-slate-400 mb-1">No accounts found</div>' +
                '<div class="text-sm">Try a different search or add a new account</div>' +
            '</div>';
        return;
    }

    grid.innerHTML = filtered.map(function(a, i) {
        var icon  = a.icon || getIcon(a.service);
        var hasPwd = a.password && a.password.length > 0;

        var badge = a.type === 'web'
            ? '<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-semibold bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 border border-blue-100 dark:border-blue-800/40 flex-shrink-0">🌐 Web</span>'
            : '<span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-semibold bg-violet-50 dark:bg-violet-900/30 text-violet-600 dark:text-violet-400 border border-violet-100 dark:border-violet-800/40 flex-shrink-0">📱 App</span>';

        return '<div class="flex flex-col gap-3 p-5 ' +
                   'bg-white dark:bg-slate-800/70 ' +
                   'border border-slate-200 dark:border-slate-700/60 ' +
                   'rounded-2xl shadow-sm ' +
                   'hover:border-indigo-300 dark:hover:border-indigo-600/60 ' +
                   'hover:shadow-indigo-100 dark:hover:shadow-indigo-900/30 hover:shadow-lg ' +
                   'transition-all duration-200 hover:-translate-y-0.5 ' +
                   'animate-fade-card" style="animation-delay:' + (i*0.04) + 's">' +

            // Top row
            '<div class="flex items-center gap-3">' +
                '<div class="w-11 h-11 rounded-[13px] bg-slate-50 dark:bg-slate-700 border border-slate-100 dark:border-slate-600 flex items-center justify-center text-xl flex-shrink-0">' + icon + '</div>' +
                '<div class="min-w-0 flex-1">' +
                    '<div class="text-[15px] font-bold text-slate-900 dark:text-white truncate">' + escHtml(a.service) + '</div>' +
                    '<div class="text-[12px] text-slate-500 dark:text-slate-400 truncate mt-0.5">' + escHtml(a.username) + '</div>' +
                '</div>' +
                badge +
            '</div>' +

            // Password row
            '<div class="flex items-center justify-between px-3 py-2 bg-slate-50 dark:bg-slate-900/50 border border-slate-100 dark:border-slate-700/50 rounded-xl">' +
                '<div class="flex items-center gap-2 min-w-0">' +
                    '<svg class="w-3.5 h-3.5 text-slate-400 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>' +
                    '<span class="text-[12px] text-slate-500 dark:text-slate-400 font-mono tracking-widest">' + (hasPwd ? maskPassword(a.password) : '<em style="font-style:italic;opacity:0.6;font-family:inherit">not set</em>') + '</span>' +
                '</div>' +
                (hasPwd ? '<button onclick="openPwdModal(' + a.id + ')" class="text-[11px] font-semibold text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 transition-colors cursor-pointer border-0 bg-transparent font-[inherit]">View</button>' : '') +
            '</div>' +

            // URL
            (a.url ? '<div class="text-[12px] text-slate-400 dark:text-slate-500 truncate px-3 py-2 bg-slate-50 dark:bg-slate-900/50 border border-slate-100 dark:border-slate-700/50 rounded-xl">🔗 ' + escHtml(a.url) + '</div>' : '') +

            // Actions
            '<div class="flex gap-2">' +
                '<button onclick="copyUsername(' + a.id + ')" class="flex-1 flex items-center justify-center gap-1.5 py-2 bg-slate-50 dark:bg-slate-900/50 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 border border-slate-200 dark:border-slate-700 hover:border-indigo-300 dark:hover:border-indigo-700 rounded-xl text-[12px] font-semibold text-slate-500 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all cursor-pointer font-[inherit]">' +
                    '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>' +
                    'Copy' +
                '</button>' +
                '<button onclick="editAccount(' + a.id + ')" class="flex-1 flex items-center justify-center gap-1.5 py-2 bg-slate-50 dark:bg-slate-900/50 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 border border-slate-200 dark:border-slate-700 hover:border-indigo-300 dark:hover:border-indigo-700 rounded-xl text-[12px] font-semibold text-slate-500 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all cursor-pointer font-[inherit]">' +
                    '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>' +
                    'Edit' +
                '</button>' +
                '<button onclick="deleteAccount(' + a.id + ')" class="flex-1 flex items-center justify-center gap-1.5 py-2 bg-slate-50 dark:bg-slate-900/50 hover:bg-red-50 dark:hover:bg-red-900/20 border border-slate-200 dark:border-slate-700 hover:border-red-300 dark:hover:border-red-700 rounded-xl text-[12px] font-semibold text-slate-500 dark:text-slate-400 hover:text-red-500 dark:hover:text-red-400 transition-all cursor-pointer font-[inherit]">' +
                    '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4h6v2"/></svg>' +
                    'Delete' +
                '</button>' +
            '</div>' +
        '</div>';
    }).join('');
}

/* ── Tab ── */
function setTab(type, el) {
    currentTab = type;
    document.querySelectorAll('.tab-btn').forEach(function(b) {
        b.classList.remove('bg-indigo-600','text-white','shadow-sm');
        b.classList.add('text-slate-500','dark:text-slate-400','bg-transparent');
    });
    el.classList.add('bg-indigo-600','text-white','shadow-sm');
    el.classList.remove('text-slate-500','dark:text-slate-400','bg-transparent');
    render();
}

/* ── Copy ── */
function copyUsername(id) {
    var a = accounts.find(function(x){ return x.id===id; });
    if (!a) return;
    navigator.clipboard.writeText(a.username).then(function() { showToast('Username copied!'); });
}

/* ── Delete ── */
function deleteAccount(id) {
    if (!confirm('Delete this account entry?')) return;
    accounts = accounts.filter(function(a){ return a.id!==id; });
    localStorage.setItem('av_accounts', JSON.stringify(accounts));
    render();
    showToast('Account deleted.');
}

/* ── Add Modal ── */
function openAddModal() {
    document.getElementById('editId').value = '';
    document.getElementById('modalTitle').textContent = 'Add New Account';
    document.getElementById('submitLabel').textContent = 'Save Account';
    document.getElementById('accountForm').reset();
    selectType('web');
    document.getElementById('addModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closeAddModal() {
    document.getElementById('addModal').classList.add('hidden');
    document.body.style.overflow = '';
}

/* ── Edit Modal ── */
function editAccount(id) {
    var a = accounts.find(function(x){ return x.id===id; });
    if (!a) return;
    document.getElementById('editId').value  = a.id;
    document.getElementById('f-service').value  = a.service;
    document.getElementById('f-username').value = a.username;
    document.getElementById('f-password').value = a.password || '';
    document.getElementById('f-url').value      = a.url || '';
    document.querySelector('input[name="type"][value="' + a.type + '"]').checked = true;
    selectType(a.type);
    document.getElementById('modalTitle').textContent = 'Edit Account';
    document.getElementById('submitLabel').textContent = 'Save Changes';
    document.getElementById('addModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

/* ── Save (Add / Edit) ── */
function saveAccount(e) {
    e.preventDefault();
    var service  = document.getElementById('f-service').value.trim();
    var username = document.getElementById('f-username').value.trim();
    var password = document.getElementById('f-password').value;
    var url      = document.getElementById('f-url').value.trim();
    var type     = document.querySelector('input[name="type"]:checked').value;
    var editId   = document.getElementById('editId').value;
    if (!service || !username) return;

    if (editId) {
        var idx = accounts.findIndex(function(a){ return String(a.id) === String(editId); });
        if (idx > -1) {
            accounts[idx].service  = service;
            accounts[idx].username = username;
            accounts[idx].password = password;
            accounts[idx].url      = url;
            accounts[idx].type     = type;
            accounts[idx].icon     = getIcon(service);
            showToast('Account updated!');
        }
    } else {
        accounts.unshift({ id: Date.now(), service: service, username: username, password: password, url: url, type: type, icon: getIcon(service) });
        showToast('Account added!');
    }
    localStorage.setItem('av_accounts', JSON.stringify(accounts));
    closeAddModal();
    render();
}

/* ── Type Selector ── */
function selectType(type) {
    var webEl = document.getElementById('typeWeb');
    var appEl = document.getElementById('typeApp');
    if (type === 'web') {
        webEl.className = webEl.className.replace('border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800','border-indigo-500 dark:border-indigo-500 bg-indigo-50 dark:bg-indigo-900/20');
        appEl.className = appEl.className.replace('border-indigo-500 dark:border-indigo-500 bg-indigo-50 dark:bg-indigo-900/20','border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800');
        webEl.querySelector('input').checked = true;
    } else {
        appEl.className = appEl.className.replace('border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800','border-indigo-500 dark:border-indigo-500 bg-indigo-50 dark:bg-indigo-900/20');
        webEl.className = webEl.className.replace('border-indigo-500 dark:border-indigo-500 bg-indigo-50 dark:bg-indigo-900/20','border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800');
        appEl.querySelector('input').checked = true;
    }
}

/* ── Password toggle in modal form ── */
function toggleModalPwd() {
    var inp = document.getElementById('f-password');
    inp.type = inp.type === 'password' ? 'text' : 'password';
}

/* ── View Password Modal ── */
var _pwdCurrentId = null;
var _pwdShown = false;

function openPwdModal(id) {
    var a = accounts.find(function(x){ return x.id===id; });
    if (!a) return;
    _pwdCurrentId = id;
    _pwdShown = false;
    document.getElementById('pwdModalService').textContent = a.service;
    document.getElementById('pwdModalUser').textContent    = a.username;
    document.getElementById('pwdModalPwd').textContent     = maskPassword(a.password);
    document.getElementById('pwdModal').classList.remove('hidden');
    document.body.style.overflow = 'hidden';
}

function closePwdModal() {
    document.getElementById('pwdModal').classList.add('hidden');
    document.body.style.overflow = '';
    _pwdCurrentId = null;
    _pwdShown = false;
}

function togglePwdView() {
    var a = accounts.find(function(x){ return x.id===_pwdCurrentId; });
    if (!a) return;
    _pwdShown = !_pwdShown;
    document.getElementById('pwdModalPwd').textContent = _pwdShown ? (a.password || '—') : maskPassword(a.password);
}

function copyPwd() {
    var a = accounts.find(function(x){ return x.id===_pwdCurrentId; });
    if (!a || !a.password) return;
    navigator.clipboard.writeText(a.password).then(function() { showToast('Password copied!'); });
}

function copyUser() {
    var a = accounts.find(function(x){ return x.id===_pwdCurrentId; });
    if (!a) return;
    navigator.clipboard.writeText(a.username).then(function() { showToast('Username copied!'); });
}

/* ── Toast ── */
function showToast(msg) {
    var t = document.createElement('div');
    t.textContent = '✓ ' + msg;
    t.className = 'fixed bottom-6 right-6 z-[9999] bg-slate-900 dark:bg-white text-white dark:text-slate-900 text-sm font-semibold px-5 py-3 rounded-xl shadow-xl animate-slide-up';
    document.body.appendChild(t);
    setTimeout(function() {
        t.style.opacity = '0';
        t.style.transition = 'opacity 0.3s';
        setTimeout(function() { t.remove(); }, 300);
    }, 2500);
}

/* ── Keyboard ESC ── */
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeAddModal();
        closePwdModal();
    }
});

/* ── Wire nav buttons ── */
document.addEventListener('DOMContentLoaded', function() {
    var navBtn    = document.getElementById('navAddBtn');
    var mobileBtn = document.getElementById('mobileAddBtn');
    if (navBtn)    navBtn.onclick    = function(e) { e.preventDefault(); openAddModal(); };
    if (mobileBtn) mobileBtn.onclick = function(e) { e.preventDefault(); openAddModal(); };
    render();
});
</script>
</x-app-layout>
