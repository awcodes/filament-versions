<div @class([
    'py-3 px-6 mt-auto -mb-6 text-xs border-t filament-versions-nav-component',
    'dark:border-gray-700' => config('filament.dark_mode'),
])
    x-data
    x-show="$store.sidebar.isOpen">
    <ul class="flex flex-wrap items-center gap-x-4 gap-y-2">
        <li class="flex-shrink-0">Laravel v{{ $versions['laravel'] }}</li>
        <li class="flex-shrink-0">PHP v{{ $versions['php'] }}</li>
        <li class="flex-shrink-0">Filament {{ $versions['filament'] }}</li>
        @if (FilamentVersions\Facades\FilamentVersions::getItems())
            @foreach (FilamentVersions\Facades\FilamentVersions::getItems() as $item)
                <li class="flex-shrink-0">{{ $item['name'] }} {{ $item['version'] }}</li>
            @endforeach
        @endif
    </ul>
</div>
