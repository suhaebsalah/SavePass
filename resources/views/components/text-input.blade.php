@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => '
    block w-full
    px-4 py-2.5
    bg-white dark:bg-slate-800
    border border-slate-200 dark:border-slate-700
    rounded-xl
    text-[14px] text-slate-900 dark:text-slate-100
    placeholder-slate-400 dark:placeholder-slate-500
    shadow-sm
    outline-none
    transition duration-150
    focus:border-indigo-500 dark:focus:border-indigo-500
    focus:ring-2 focus:ring-indigo-100 dark:focus:ring-indigo-900/40
    disabled:opacity-60 disabled:bg-slate-50 dark:disabled:bg-slate-900/50
    disabled:cursor-not-allowed
']) }}>
