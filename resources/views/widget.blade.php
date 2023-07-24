<x-filament-widgets::widget class="filament-versions-widget">
    <x-filament::card>
        <h2 class="font-bold mb-6">
            {{ __('filament-versions::widget.title') }}
        </h2>

        <dl class="flex flex-wrap items-center text-center gap-y-4">
            @foreach ($versions as $version)
                <div class="w-1/3">
                    <dt class="text-2xl font-bold text-primary-500">{{ str($version['version'])->ltrim('v') }}</dt>
                    <dl>{{ $version['name'] }}</dl>
                </div>
            @endforeach
        </dl>
    </x-filament::card>
</x-filament-widgets::widget>
