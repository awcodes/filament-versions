<?php

declare(strict_types=1);

namespace Workbench\App\Providers\Filament;

use Awcodes\Versions\VersionsPlugin;
use Workbench\App\Filament\Providers\CustomVersionProvider;
use Workbench\App\Filament\Providers\FixedVersionProvider;

class WorkbenchVersions
{
    /**
     * The built-in providers read the installed versions, which change with every dependency update. The Workbench
     * replaces them with fixed providers of the same names, so its panels always render the same numbers. Laravel's
     * leading "v" matches the pretty version Composer reports, and the plugin strips it on display.
     */
    public static function plugin(): VersionsPlugin
    {
        return VersionsPlugin::make()
            ->hasDefaults(false)
            ->items([
                new FixedVersionProvider('Laravel', 'v12.0.0'),
                new FixedVersionProvider('Filament', 'v4.0.0'),
                new FixedVersionProvider('PHP', '8.4.0'),
                new CustomVersionProvider(),
            ]);
    }
}
