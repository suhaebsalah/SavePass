<button {{ $attributes->merge(['type' => 'submit', 'class' => '
    inline-flex items-center justify-center gap-2
    px-5 py-2.5
    bg-indigo-600 hover:bg-indigo-700 active:bg-indigo-800
    text-white text-[13.5px] font-semibold
    rounded-xl border border-transparent
    shadow-sm hover:shadow-md hover:shadow-indigo-200 dark:hover:shadow-indigo-900/40
    focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-slate-900
    transition-all duration-150 hover:-translate-y-px
    cursor-pointer
']) }}>
    {{ $slot }}
</button>
