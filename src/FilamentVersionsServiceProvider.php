<?php

namespace Awcodes\FilamentVersions;

use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
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

    public function packageRegistered(): void
    {
        parent::packageRegistered();

        FilamentAsset::register([
            Css::make('filament-versions', __DIR__ . '/../resources/dist/filament-versions.css')
        ], 'awcodes/filament-versions');
    }
}
