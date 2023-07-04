<?php

namespace Awcodes\FilamentVersions\Providers;

use Awcodes\FilamentVersions\Providers\Contracts\VersionProvider;
use Composer\InstalledVersions;

class PHPVersionProvider implements VersionProvider
{
    public function getName(): string
    {
        return 'PHP';
    }

    public function getVersion(): string
    {
        return PHP_VERSION;
    }
}