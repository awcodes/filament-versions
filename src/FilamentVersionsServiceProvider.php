<?php

namespace FilamentVersions;

use Composer\InstalledVersions;
use Livewire\Livewire;
use Illuminate\View\View;
use Filament\Facades\Filament;
use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentVersionsServiceProvider extends PluginServiceProvider
{
    public static string $name = 'filament-versions';

    public static string $version = 'dev';

    public function configurePackage(Package $package): void
    {
        static::$version = InstalledVersions::getVersion('awcodes/filament-versions');

        $package
            ->name(static::$name)
            ->hasAssets()
            ->hasTranslations()
            ->hasViews();
    }

    protected function getStyles(): array
    {
        return [
            'filament-versions-styles-' . static::$version => __DIR__.'/../resources/dist/filament-versions.css',
        ];
    }

    public function packageRegistered(): void
    {
        parent::packageRegistered();

        $this->app->scoped('filament-versions-manager', function () {
            return new FilamentVersionsManager;
        });
    }

    public function packageBooted(): void
    {
        parent::packageBooted();

        if (app('filament-versions-manager')->hasNavigationView()) {
            Filament::registerRenderHook(
                'sidebar.end',
                fn(): View => view('filament-versions::filament-versions', ['versions' => [
                    'laravel' => InstalledVersions::getPrettyVersion('laravel/framework'),
                    'filament' => InstalledVersions::getPrettyVersion('filament/filament'),
                    'php' => PHP_VERSION,
                ]]),
            );
        }

        Livewire::component('filament-versions-widget', FilamentVersionsWidget::class);
    }
}
