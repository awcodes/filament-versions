<div @class([
    'py-3 px-6 mt-auto -mb-6 text-xs border-t',
    'dark:border-gray-700' => config('filament.dark_mode'),
])
    x-data
    x-show="$store.sidebar.isOpen">
    <ul class="flex items-center justify-between">
        <li>Laravel v{{ $versions['laravel'] }}</li>
        <li>PHP v{{ $versions['php'] }}</li>
        <li>Filament {{ $versions['filament'] }}</li>
    </ul>
</div>
