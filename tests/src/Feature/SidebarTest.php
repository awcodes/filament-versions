<?php

declare(strict_types=1);

use Awcodes\Versions\VersionsPlugin;
use Filament\Facades\Filament;

beforeEach(function () {
    $this->panel = Filament::getCurrentOrDefaultPanel();
});

it('displays the sidebar view', function () {
    $this->panel
        ->plugins([
            VersionsPlugin::make(),
        ]);

    $this->get('/admin')
        ->assertOk()
        ->assertSee('versions-nav-widget')
        ->assertSee('Lara:')
        ->assertSee('PHP:')
        ->assertSee('Fila:');
});

it('doesn\'t display the sidebar view', function () {
    $this->panel
        ->plugins([
            VersionsPlugin::make()
                ->hasNavigationView(false),
        ]);

    $this->get('/admin')
        ->assertOk()
        ->assertDontSee('versions-nav-widget')
        ->assertDontSee('Lara:')
        ->assertDontSee('PHP:')
        ->assertDontSee('Fila:');
});

it('displays the sidebar view with top navigation', function () {
    $this->panel
        ->topNavigation()
        ->plugins([
            VersionsPlugin::make(),
        ]);

    $this->get('/admin')
        ->assertOk()
        ->assertSee('versions-nav-widget')
        ->assertSee('Lara:')
        ->assertSee('PHP:')
        ->assertSee('Fila:');
});

it('doesn\'t display the sidebar view with top navigation', function () {
    $this->panel
        ->topNavigation()
        ->plugins([
            VersionsPlugin::make()
                ->hasNavigationView(false),
        ]);

    $this->get('/admin')
        ->assertOk()
        ->assertDontSee('versions-nav-widget')
        ->assertDontSee('Lara:')
        ->assertDontSee('PHP:')
        ->assertDontSee('Fila:');
});
