<x-filament-widgets::widget class="filament-versions-widget">
    <x-filament::card>
        <x-slot name="header">
            <x-filament::card.heading>
                {{ __('filament-versions::widget.title') }}
            </x-filament::card.heading>
        </x-slot>

        <dl class="flex flex-wrap items-center text-center gap-y-4">
            @foreach ($versions as $version)
                <div class="w-1/3">
                    <dt class="text-2xl font-bold text-primary-500">{{ str($version->getVersion())->ltrim('v')->prepend('v') }}</dt>
                    <dl>{{ $version->getName() }}</dl>
                </div>
            @endforeach
        </dl>
    </x-filament::card>
</x-filament-widgets::widget>
