<x-filament-widgets::widget class="filament-versions-widget">
    <x-filament::section>
        <x-slot name="heading">
            {{ __('filament-versions::widget.title') }}
        </x-slot>

        <dl class="flex flex-wrap items-center text-center gap-y-4">
            @foreach ($versions as $version)
                <div class="w-1/3">
                    <dt class="text-2xl font-bold text-primary-500">{{ str($version['version'])->ltrim('v') }}</dt>
                    <dl>{{ $version['name'] }}</dl>
                </div>
            @endforeach
        </dl>
    </x-filament::section>
</x-filament-widgets::widget>
