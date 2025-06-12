<?php

declare(strict_types=1);

namespace Awcodes\Versions;

use Awcodes\Versions\Providers\Contracts\VersionProvider;
use Filament\Widgets\Widget;

class VersionsWidget extends Widget
{
    public array $versions = [];

    protected string $view = 'versions::widget';

    public static function getSort(): int
    {
        return VersionsPlugin::get()->getWidgetSort();
    }

    public function mount(): void
    {
        $this->versions = collect(VersionsPlugin::get()->getVersions())
            ->transform(fn (VersionProvider $provider): array => [
                'name' => $provider->getName(),
                'version' => $provider->getVersion(),
            ])->toArray();
    }

    public function getColumnSpan(): int|string|array
    {
        return VersionsPlugin::get()->getWidgetColumnSpan();
    }
}
