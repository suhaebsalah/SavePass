@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'mt-1.5 space-y-0.5']) }}>
        @foreach ((array) $messages as $message)
            <li class="flex items-center gap-1.5 text-[12.5px] font-medium text-red-600 dark:text-red-400">
                <svg class="flex-shrink-0" width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                    <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
                {{ $message }}
            </li>
        @endforeach
    </ul>
@endif
