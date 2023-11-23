<a {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-theme-success-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-theme-success-700 focus:bg-theme-success-700 active:bg-theme-success-900 focus:outline-none focus:ring-2 focus:ring-theme-success-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>
