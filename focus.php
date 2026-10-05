<?php

declare(strict_types=1);

use Awcodes\Focus\Card;
use Awcodes\Focus\Enums\Size;
use Awcodes\Focus\Screenshot;
use Awcodes\Focus\ScreenshotSuite;

/*
 * Documentation screenshots for Versions, generated with awcodes/focus from the Workbench (run `composer build`
 * first). The Workbench panels report fixed versions rather than the installed ones, so the numbers are the same
 * on every build.
 */

// The awcodes card templates frame each screenshot at 1400x816.
$cardDashboard = [1400, 816];

return ScreenshotSuite::make()
    ->screenshots([
        // The versions line sits at the bottom of the sidebar, so the whole (short) panel is the subject.
        Screenshot::make('navigation')
            ->viewportSize(1280, 640)
            ->visit('/admin')
            ->waitFor('[data-focus="versions-navigation"]')
            ->viewport(),

        Screenshot::make('widget')
            ->visit('/admin')
            ->focus('[data-focus="versions-widget"]'),

        // With top navigation the line follows the page content, so the panel is shown from the top bar down.
        Screenshot::make('top-navigation')
            ->viewportSize(1280, 640)
            ->visit('/top-navigation')
            ->waitFor('[data-focus="versions-footer"]')
            ->viewport(),

        // The share-image source, shaped to the card templates' screenshot slots. The two-up templates show it
        // dark in slot 1 and light in slot 2, so it is captured in both themes.
        Screenshot::make('card-dashboard')
            ->viewportSize(...$cardDashboard)
            ->visit('/admin')
            ->viewport(),
    ])
    ->cardTemplates('https://github.com/awcodes/focus-templates/tree/v1.1.1/dist')
    ->cards([
        // Open Graph and the GitHub social preview share one 2400x1260 template; GitHub crops 30px top and bottom.
        Card::make('social')
            ->template('two-up-wide')
            ->title('Versions')
            ->screenshots(['card-dashboard', 'card-dashboard'])
            ->sizes([Size::OpenGraph, Size::GitHubSocial]),

        // The Filament plugin directory's 2560x1440 thumbnail.
        Card::make('thumbnail')
            ->template('two-up')
            ->title('Versions')
            ->screenshots(['card-dashboard', 'card-dashboard'])
            ->sizes([Size::Filament]),
    ]);
