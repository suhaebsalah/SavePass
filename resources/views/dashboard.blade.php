<x-app-layout>

{{-- ══════════════════════════════════════════
     Dashboard — Tailwind CSS · Dark/Light Mode
     Accounts with: service, username, password, url, type
══════════════════════════════════════════ --}}

@php
    if (!isset($accounts)) {
        $accounts = collect([
            (object)[ 'id' => 1, 'service' => 'GitHub', 'username' => 'yourhandle', 'password' => 'gh_p@ss123!', 'url' => 'github.com', 'type' => 'web', 'icon' => '🐙', 'note' => 'Personal account' ],
            (object)[ 'id' => 2, 'service' => 'Gmail', 'username' => 'you@gmail.com', 'password' => 'Gm@ilSec!', 'url' => 'mail.google.com', 'type' => 'web', 'icon' => '📧', 'note' => 'Main email' ],
            (object)[ 'id' => 3, 'service' => 'Netflix', 'username' => 'you@email.com', 'password' => 'Netf1ix#2024', 'url' => 'netflix.com', 'type' => 'web', 'icon' => '🎬', 'note' => 'Family plan' ],
            (object)[ 'id' => 4, 'service' => 'Spotify', 'username' => '@yourname', 'password' => 'Sp0t!fyR0cks', 'url' => 'spotify.com', 'type' => 'app', 'icon' => '🎵', 'note' => '' ],
            (object)[ 'id' => 5, 'service' => 'Instagram', 'username' => '@yourgram', 'password' => 'Insta@Gr@m!', 'url' => 'instagram.com', 'type' => 'app', 'icon' => '📸', 'note' => 'Public profile' ],
        ]);
    }
@endphp

<div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 py-8 pb-16">

    {{-- ── Page Header ── --}}
    @include('dashboard.partials.header')

    {{-- ── Stats Grid ── --}}
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

    {{-- ── Section Header ── --}}
    <div class="flex items-center justify-between mb-4">
        <span class="text-base font-bold text-slate-900 dark:text-white">Accounts</span>
        <span id="resultCount" class="text-xs font-semibold text-slate-400 bg-slate-100 dark:bg-slate-800 dark:text-slate-400 px-3 py-1 rounded-full">{{ $accounts->count() }} accounts</span>
    </div>
            
    {{-- ── Account Cards Grid ── --}}
    <div id="accountsGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
        @forelse($accounts as $account)
            <div class="flex flex-col gap-3 p-5 bg-white dark:bg-slate-800/70 border border-slate-200 dark:border-slate-700/60 rounded-2xl shadow-sm hover:border-indigo-300 dark:hover:border-indigo-600/60 hover:shadow-indigo-100 dark:hover:shadow-indigo-900/30 hover:shadow-lg transition-all duration-200 hover:-translate-y-0.5 animate-fade-card">
                <div class="flex items-center gap-3">
                    <div class="w-11 h-11 rounded-[13px] bg-slate-50 dark:bg-slate-700 border border-slate-100 dark:border-slate-600 flex items-center justify-center text-xl flex-shrink-0">
                        @php
                            $serviceName = strtolower(str_replace(' ', '', $account->service));
                            $validIcons = ['github', 'gmail', 'netflix', 'spotify', 'instagram', 'discord', 'facebook', 'linkedin', 'pinterest', 'reddit', 'snapchat', 'telegram', 'tiktok', 'whatsapp', 'x', 'youtube'];
                            if (str_contains($serviceName, 'twitter')) $serviceName = 'x';
                            if (str_contains($serviceName, 'google') && !str_contains($serviceName, 'gmail')) $serviceName = 'other';
                            $iconName = in_array($serviceName, $validIcons) ? $serviceName : 'other';
                        @endphp
                        <x-dynamic-component :component="'svg.' . $iconName" class="w-6 h-6 text-slate-700 dark:text-slate-300" />
                    </div>
                    <div class="min-w-0 flex-1">
                        <div class="text-[15px] font-bold text-slate-900 dark:text-white truncate">{{ $account->service }}</div>
                        <div class="text-[12px] text-slate-500 dark:text-slate-400 truncate mt-0.5">{{ $account->username }}</div>
                    </div>
                    @if($account->type === 'web')
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-semibold bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 border border-blue-100 dark:border-blue-800/40 flex-shrink-0">🌐 Web</span>
                    @else
                        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[11px] font-semibold bg-violet-50 dark:bg-violet-900/30 text-violet-600 dark:text-violet-400 border border-violet-100 dark:border-violet-800/40 flex-shrink-0">📱 App</span>
                    @endif
                </div>

                <div class="flex items-center justify-between px-3 py-2 bg-slate-50 dark:bg-slate-900/50 border border-slate-100 dark:border-slate-700/50 rounded-xl">
                    <div class="flex items-center gap-2 min-w-0">
                        <svg class="w-3.5 h-3.5 text-slate-400 flex-shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                        <span class="text-[12px] text-slate-500 dark:text-slate-400 font-mono tracking-widest">
                            @if($account->password)
                                ••••••••••••
                            @else
                                <em style="font-style:italic;opacity:0.6;font-family:inherit">not set</em>
                            @endif
                        </span>
                    </div>
                    @if($account->password)
                        <button onclick="openPwdModal({{ $account->id }})" class="text-[11px] font-semibold text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300 transition-colors cursor-pointer border-0 bg-transparent font-[inherit]">View</button>
                    @endif
                </div>

                @if($account->url)
                    <div class="text-[12px] text-slate-400 dark:text-slate-500 truncate px-3 py-2 bg-slate-50 dark:bg-slate-900/50 border border-slate-100 dark:border-slate-700/50 rounded-xl">🔗 {{ $account->url }}</div>
                @endif
                
                @if($account->note)
                    <div class="text-[12px] text-slate-400 dark:text-slate-500 px-3 py-2 bg-slate-50 dark:bg-slate-900/50 border border-slate-100 dark:border-slate-700/50 rounded-xl">📝 {{ $account->note }}</div>
                @endif

                <div class="flex gap-2">
                    <button onclick="copyUsername({{ $account->id }})" class="flex-1 flex items-center justify-center gap-1.5 py-2 bg-slate-50 dark:bg-slate-900/50 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 border border-slate-200 dark:border-slate-700 hover:border-indigo-300 dark:hover:border-indigo-700 rounded-xl text-[12px] font-semibold text-slate-500 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all cursor-pointer font-[inherit]">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
                        Copy
                    </button>
                    <button onclick="editAccount({{ $account->id }})" class="flex-1 flex items-center justify-center gap-1.5 py-2 bg-slate-50 dark:bg-slate-900/50 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 border border-slate-200 dark:border-slate-700 hover:border-indigo-300 dark:hover:border-indigo-700 rounded-xl text-[12px] font-semibold text-slate-500 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all cursor-pointer font-[inherit]">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                        Edit
                    </button>
                    <button onclick="deleteAccount({{ $account->id }})" class="flex-1 flex items-center justify-center gap-1.5 py-2 bg-slate-50 dark:bg-slate-900/50 hover:bg-red-50 dark:hover:bg-red-900/20 border border-slate-200 dark:border-slate-700 hover:border-red-300 dark:hover:border-red-700 rounded-xl text-[12px] font-semibold text-slate-500 dark:text-slate-400 hover:text-red-500 dark:hover:text-red-400 transition-all cursor-pointer font-[inherit]">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4h6v2"/></svg>
                        Delete
                    </button>
                </div>
            </div>
        @empty
            <div class="col-span-full flex flex-col items-center justify-center py-16 text-slate-400 dark:text-slate-500">
                <div class="w-16 h-16 bg-slate-100 dark:bg-slate-800 rounded-2xl flex items-center justify-center text-3xl mb-4">
                    <x-svg.other class="w-8 h-8 text-slate-400" />
                </div> 
                <div class="text-base font-bold text-slate-500 dark:text-slate-400 mb-1">No accounts found</div> 
                <div class="text-sm">Try a different search or add a new account</div> 
            </div>
        @endforelse
    </div>
</div>

{{-- ════════════════════════════════════
     Modals & Scripts
════════════════════════════════════ --}}
@include('dashboard.partials.add_modal')
@include('dashboard.partials.pwd_modal')
@include('dashboard.partials.scripts')

</x-app-layout>
