<a {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-theme-primary-400 border border-transparent rounded-md font-semibold text-xs text-theme-primary-100 uppercase tracking-widest hover:bg-theme-primary-300 focus:bg-theme-primary-700 active:bg-theme-primary-900 focus:outline-none focus:ring-2 focus:ring-theme-primary-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
