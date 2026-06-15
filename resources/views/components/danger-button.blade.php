<button {{ $attributes->merge(['type' => 'submit', 'class' => '
    inline-flex items-center justify-center gap-2
    px-5 py-2.5
    bg-red-600 hover:bg-red-700 active:bg-red-800
    text-white text-[13.5px] font-semibold
    rounded-xl border border-transparent
    shadow-sm hover:shadow-md hover:shadow-red-200 dark:hover:shadow-red-900/40
    focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-slate-900
    transition-all duration-150 hover:-translate-y-px
    cursor-pointer
']) }}>
    {{ $slot }}
</button>
