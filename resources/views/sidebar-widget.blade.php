<div
    class="filament-versions-nav-widget py-3 px-6 mt-auto -mb-6 text-xs text-gray-700 border-t dark:text-gray-300 dark:border-gray-700"
    x-data
    @if (filament()->isSidebarCollapsibleOnDesktop() || filament()->isSidebarFullyCollapsibleOnDesktop())
        x-cloak
        x-show="$store.sidebar.isOpen"
    @endif
>
    <ul class="flex flex-wrap items-center gap-x-4 gap-y-2">
        @foreach ($versions as $version)
            <li class="flex-shrink-0">{{ $version->getName() }} {{ str($version->getVersion())->ltrim('v')->prepend('v') }}</li>
        @endforeach
    </ul>
</div>
