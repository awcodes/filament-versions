<?php

declare(strict_types=1);

namespace Awcodes\Versions;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class VersionsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('versions')
            ->hasAssets()
            ->hasTranslations()
            ->hasViews();
    }
}
