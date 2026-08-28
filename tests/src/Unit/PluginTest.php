<?php

declare(strict_types=1);

use Awcodes\Versions\Tests\Fixtures\Providers\CustomVersionProvider;
use Awcodes\Versions\VersionsPlugin;
use Awcodes\Versions\VersionsWidget;
use Filament\Facades\Filament;

beforeEach(function () {
    $this->panel = Filament::getCurrentOrDefaultPanel();
});

it('can register the plugin', function () {
    $this->panel
        ->plugins([
            VersionsPlugin::make(),
        ]);

    expect(Filament::getPlugin('versions'))->toBeInstanceOf(VersionsPlugin::class);
});

it('can register the widget', function () {
    $this->panel
        ->plugins([
            VersionsPlugin::make(),
        ])
        ->widgets([
            VersionsWidget::class,
        ]);

    expect(Filament::getWidgets())->toContain('Awcodes\Versions\VersionsWidget');
});

it('can disable navigation view', function (bool|Closure $condition) {
    $this->panel
        ->plugins([
            VersionsPlugin::make()->hasNavigationView($condition),
        ]);

    expect(Filament::getPlugin('versions')->shouldHaveNavigationView())->toBeFalse();
})->with([
    false,
    fn () => false,
]);

it('can disable defaults', function (bool|Closure $condition) {
    $this->panel
        ->plugins([
            VersionsPlugin::make()->hasDefaults($condition),
        ]);

    expect(Filament::getPlugin('versions')->getVersions())->toBeEmpty();
})->with([
    false,
    fn () => false,
]);

it('can register custom items', function () {
    $this->panel
        ->plugins([
            VersionsPlugin::make()
                ->items([
                    new CustomVersionProvider(),
                ]),
        ]);

    expect(Filament::getPlugin('versions')->getVersions())->toHaveCount(4)
        ->and(Filament::getPlugin('versions')->getVersions()[3]->getName())->toBe('My Custom Version')
        ->and(Filament::getPlugin('versions')->getVersions()[3]->getVersion())->toBe('1.0.0');
});

it('can register custom items from a closure', function () {
    $this->panel
        ->plugins([
            VersionsPlugin::make()
                ->items(fn (): array => [
                    new CustomVersionProvider(),
                ]),
        ]);

    expect(Filament::getPlugin('versions')->getVersions())->toHaveCount(4)
        ->and(Filament::getPlugin('versions')->getVersions()[3]->getName())->toBe('My Custom Version')
        ->and(Filament::getPlugin('versions')->getVersions()[3]->getVersion())->toBe('1.0.0');
});
