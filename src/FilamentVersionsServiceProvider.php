<?php

namespace Awcodes\FilamentVersions;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentVersionsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-versions')
            ->hasAssets()
            ->hasTranslations()
            ->hasViews();
    }
}
