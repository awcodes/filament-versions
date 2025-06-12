<?php

declare(strict_types=1);

namespace Awcodes\Versions\Providers;

use Awcodes\Versions\Providers\Contracts\VersionProvider;
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
