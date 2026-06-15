<button {{ $attributes->merge(['type' => 'button', 'class' => '
    inline-flex items-center justify-center gap-2
    px-5 py-2.5
    bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700
    text-slate-700 dark:text-slate-300 hover:text-slate-900 dark:hover:text-white text-[13.5px] font-semibold
    rounded-xl
    border border-slate-200 dark:border-slate-700 hover:border-slate-300 dark:hover:border-slate-600
    shadow-sm
    focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-slate-900
    disabled:opacity-50 disabled:cursor-not-allowed
    transition-all duration-150
    cursor-pointer
']) }}>
    {{ $slot }}
</button>
