@props(['status'])

@if ($status)
    <div id="successMsg" {{ $attributes->merge(['class' => 'flex items-center p-4 mt-4 text-theme-success-800 rounded-lg bg-theme-success-200 dark:bg-gray-600 dark:text-theme-success-400']) }}>
        <div class="text-sm font-medium">
            <strong>{{ __('Success!') }}</strong> {{ $status }}
        </div>
    </div>
@endif
