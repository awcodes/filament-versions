<?php

namespace Awcodes\FilamentVersions\Providers;

use Awcodes\FilamentVersions\Providers\Contracts\VersionProvider;
use Composer\InstalledVersions;

class LaravelVersionProvider implements VersionProvider
{
    public function getName(): string
    {
        return 'Laravel';
    }

    public function getVersion(): string
    {
        return InstalledVersions::getPrettyVersion('laravel/framework');
    }
}
