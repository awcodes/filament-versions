<?php

namespace FilamentVersions;

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
            ->hasViews();
    }

    public function boot()
    {
        parent::boot();

        Filament::registerRenderHook(
            'sidebar.end',
            fn (): View => view('filament-versions::filament-versions', ['versions' => [
                'laravel' => \Illuminate\Foundation\Application::VERSION,
                'filament' => \Composer\InstalledVersions::getPrettyVersion('filament/filament'),
                'php' => PHP_VERSION,
            ]]),
        );

        Livewire::component('filament-versions-widget', FilamentVersionsWidget::class);
    }
}
