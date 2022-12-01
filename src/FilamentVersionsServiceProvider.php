<?php

namespace FilamentVersions;

use FilamentVersions\Facades\FilamentVersions;
use Livewire\Livewire;
use Illuminate\View\View;
use Filament\Facades\Filament;
use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentVersionsServiceProvider extends PluginServiceProvider
{
    protected array $styles = [
        'filament-versions-styles' => __DIR__ . '/../resources/dist/filament-versions.css',
    ];

    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-versions')
            ->hasAssets()
            ->hasTranslations()
            ->hasViews();
    }

    public function register(): void
    {
        parent::register();

        $this->app->singleton('filament-versions-manager', function ($app) {
            return new \FilamentVersions\FilamentVersionsManager;
        });
    }

    public function boot()
    {
        parent::boot();

        if (FilamentVersions::hasNavigationView()) {
            Filament::registerRenderHook(
                'sidebar.end',
                fn(): View => view('filament-versions::filament-versions', ['versions' => [
                    'laravel' => \Illuminate\Foundation\Application::VERSION,
                    'filament' => \Composer\InstalledVersions::getPrettyVersion('filament/filament'),
                    'php' => PHP_VERSION,
                ]]),
            );
        }

        Livewire::component('filament-versions-widget', FilamentVersionsWidget::class);
    }
}
