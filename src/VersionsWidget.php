<?php

namespace Awcodes\FilamentVersions;

use Awcodes\FilamentVersions\Providers\Contracts\VersionProvider;
use Filament\Widgets\Widget;

class VersionsWidget extends Widget
{
    public array $versions = [];

    protected static string $view = 'filament-versions::widget';

    public function mount(): void
    {
        $this->versions = collect(VersionsPlugin::get()->getVersions())
            ->transform(fn (VersionProvider $provider): array => [
                'name' => $provider->getName(),
                'version' => $provider->getVersion(),
            ])->toArray();
    }

    public function getColumnSpan(): int | string | array
    {
        return VersionsPlugin::get()->getWidgetColumnSpan();
    }

    public static function getSort(): int
    {
        return VersionsPlugin::get()->getWidgetSort();
    }
}
