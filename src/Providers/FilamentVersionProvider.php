<?php

namespace Awcodes\FilamentVersions\Providers;

use Awcodes\FilamentVersions\Providers\Contracts\VersionProvider;
use Composer\InstalledVersions;

class FilamentVersionProvider implements VersionProvider
{
    public function getName(): string
    {
        return 'Filament';
    }

    public function getVersion(): string
    {
        return InstalledVersions::getPrettyVersion('filament/filament');
    }
}
