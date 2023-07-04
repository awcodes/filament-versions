<?php

namespace Awcodes\FilamentVersions;

use Filament\Widgets\Widget;

class VersionsWidget extends Widget
{
    public array $versions = [];

    protected static string $view = 'filament-versions::widget';

    public function mount(): void
    {
        $this->versions = VersionsPlugin::get()->getVersions();
    }

    public function getColumnSpan(): int|string|array
    {
        return VersionsPlugin::get()->getWidgetColumnSpan();
    }

    public static function getSort(): int
    {
        return VersionsPlugin::get()->getWidgetSort();
    }
}
