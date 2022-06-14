@php
$versions = [
    'laravel' => \Illuminate\Foundation\Application::VERSION,
    'filament' => \Composer\InstalledVersions::getPrettyVersion('filament/filament'),
    'php' => PHP_VERSION,
];
@endphp
<x-filament::widget>
    <x-filament::card>
        <div class="relative">
            <h2 class="text-xl font-bold tracking-tight text-center sm:text-xl">{{ __('Filament Versions') }}
            </h2>
            <dl class="flex items-center justify-between mt-4 text-center">
                <div>
                    <dt class="text-2xl font-bold text-primary-500">v{{ $versions['laravel'] }}</dt>
                    <dl>Laravel</dl>
                </div>
                <div>
                    <dt class="text-2xl font-bold text-primary-500">v{{ $versions['php'] }}</dt>
                    <dl>PHP</dl>
                </div>
                <div>
                    <dt class="text-2xl font-bold text-primary-500">{{ $versions['filament'] }}</dt>
                    <dl>Filament</dl>
                </div>
            </dl>
        </div>
    </x-filament::card>
</x-filament::widget>
