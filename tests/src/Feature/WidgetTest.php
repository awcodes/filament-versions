<?php

declare(strict_types=1);

use Awcodes\Versions\VersionsPlugin;
use Awcodes\Versions\VersionsWidget;
use Filament\Facades\Filament;
use Workbench\App\Filament\Providers\CustomVersionProvider;

use function Pest\Livewire\livewire;

beforeEach(function () {
    $this->panel = Filament::getCurrentOrDefaultPanel();
});

it('can display the widget', function () {
    $this->panel
        ->plugins([
            VersionsPlugin::make(),
        ]);

    livewire(VersionsWidget::class)
        ->assertSee('Laravel')
        ->assertSee('PHP')
        ->assertSee('Filament');
});

it('can disable defaults in widget', function (bool|Closure $condition) {
    $this->panel
        ->plugins([
            VersionsPlugin::make()->hasDefaults($condition),
        ]);

    livewire(VersionsWidget::class)
        ->assertDontSee('Laravel')
        ->assertDontSee('PHP')
        ->assertDontSee('Filament');
})->with([
    false,
    fn () => false,
]);

it('can register custom items in widget', function () {
    $this->panel
        ->plugins([
            VersionsPlugin::make()
                ->items([
                    new CustomVersionProvider(),
                ]),
        ]);

    livewire(VersionsWidget::class)
        ->assertSee('Laravel')
        ->assertSee('PHP')
        ->assertSee('Filament')
        ->assertSee('My Custom Version');
});
