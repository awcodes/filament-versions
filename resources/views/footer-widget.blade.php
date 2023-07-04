<div class="filament-versions-footer-widget py-3 px-6 mt-6 text-xs">
    <ul class="flex flex-wrap items-center justify-center gap-x-4 gap-y-2">
        @foreach ($versions as $version)
            <li class="flex-shrink-0">{{ $version->getName() }} {{ str($version->getVersion())->ltrim('v')->prepend('v') }}</li>
        @endforeach
    </ul>
</div>
