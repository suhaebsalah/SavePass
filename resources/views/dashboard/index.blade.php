<x-app-layout>

{{-- ══════════════════════════════════════════
     Dashboard — Tailwind CSS · Dark/Light Mode
     Accounts with: service, username, password, url, type
══════════════════════════════════════════ --}}

@php
    if (!isset($accounts)) {
        $accounts = collect([
            (object)[ 'id' => 1, 'service' => 'GitHub', 'username' => 'yourhandle', 'password' => 'gh_p@ss123!', 'url' => 'github.com', 'type' => 'web', 'icon' => '🐙', 'note' => 'Personal account', 'phone' => '' ],
            (object)[ 'id' => 2, 'service' => 'Gmail', 'username' => 'you@gmail.com', 'password' => 'Gm@ilSec!', 'url' => 'mail.google.com', 'type' => 'web', 'icon' => '📧', 'note' => 'Main email', 'phone' => '+1 (555) 123-4567' ],
            (object)[ 'id' => 3, 'service' => 'Netflix', 'username' => 'you@email.com', 'password' => 'Netf1ix#2024', 'url' => 'netflix.com', 'type' => 'web', 'icon' => '🎬', 'note' => 'Family plan', 'phone' => '' ],
            (object)[ 'id' => 4, 'service' => 'Spotify', 'username' => '@yourname', 'password' => 'Sp0t!fyR0cks', 'url' => 'spotify.com', 'type' => 'app', 'icon' => '🎵', 'note' => '', 'phone' => '' ],
            (object)[ 'id' => 5, 'service' => 'Instagram', 'username' => '@yourgram', 'password' => 'Insta@Gr@m!', 'url' => 'instagram.com', 'type' => 'app', 'icon' => '📸', 'note' => 'Public profile', 'phone' => '+44 7700 900077' ],
        ]);
    }
@endphp

<div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 py-8 pb-16">

    {{-- ── Page Header ── --}}
    @include('dashboard.partials.header')
    
    {{-- ── Stats Grid ── --}}
    @include('dashboard.partials.stats')

    {{-- ── Search & Filter Toolbar ── --}}
    @include('dashboard.partials.search')

    {{-- ── Account Cards Grid ── --}}
    @include('dashboard.partials.accounts')

</div>

{{-- ── Add / Edit Account Modal ── --}}
@include('dashboard.partials.add_modal')

{{-- ── View Password Modal ── --}}
@include('dashboard.partials.pwd_modal')

{{-- ── Delete Confirm Modal ── --}}
@include('dashboard.partials.delete_modal')

{{-- ── Javascript UI Logic ── --}}
@include('dashboard.partials.scripts')

</x-app-layout>
