---
title: Usage
description: Register the Versions plugin and widget on a panel and control where each one appears.
---

# Usage

## Registering the plugin and widget

Register the plugin, the widget, or both in your panel provider:

```php
use Awcodes\Versions\VersionsPlugin;
use Awcodes\Versions\VersionsWidget;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            VersionsPlugin::make(),
        ])
        ->widgets([
            VersionsWidget::class,
        ]);
}
```

The two are independent. Registering the plugin alone gives you the navigation line; registering the widget as well adds the dashboard card. The widget still needs the plugin registered, since it reads its list and its layout settings from it.

![The Framework & Package Versions dashboard widget, listing Laravel 13.0.0, Filament 5.0.0, PHP 8.4.0 and My Custom Version 1.0.0 as large numbers with their names beneath](assets/widget-light.png#gh-light-mode-only)
![The Framework & Package Versions dashboard widget, listing Laravel 13.0.0, Filament 5.0.0, PHP 8.4.0 and My Custom Version 1.0.0 as large numbers with their names beneath](assets/widget-dark.png#gh-dark-mode-only)

## Where the navigation view appears

With a standard sidebar panel, the versions line renders at the bottom of the sidebar, and it hides along with the sidebar when that is collapsed on desktop.

![A Filament dashboard with the Versions widget showing Laravel 13.0.0, Filament 5.0.0, PHP 8.4.0 and My Custom Version 1.0.0, and the same versions abbreviated in a line at the bottom of the sidebar](assets/navigation-light.png#gh-light-mode-only)
![A Filament dashboard with the Versions widget showing Laravel 13.0.0, Filament 5.0.0, PHP 8.4.0 and My Custom Version 1.0.0, and the same versions abbreviated in a line at the bottom of the sidebar](assets/navigation-dark.png#gh-dark-mode-only)

> [!NOTE]
> If your panel uses `topNavigation`, there is no sidebar to sit in, so the line moves to the bottom of the page content instead.

![A Filament panel with top navigation, where the versions line, Laravel 13.0.0, Filament 5.0.0, PHP 8.4.0 and My Custom Version 1.0.0, sits centred below the dashboard content](assets/top-navigation-light.png#gh-light-mode-only)
![A Filament panel with top navigation, where the versions line, Laravel 13.0.0, Filament 5.0.0, PHP 8.4.0 and My Custom Version 1.0.0, sits centred below the dashboard content](assets/top-navigation-dark.png#gh-dark-mode-only)

## Disabling the navigation view

To use only the dashboard widget, turn the navigation view off. It accepts a boolean or a closure:

```php
use Awcodes\Versions\VersionsPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            VersionsPlugin::make()
                ->hasNavigationView(false),
        ]);
}
```

This governs both placements described above — the sidebar line and the top-navigation footer — so neither renders once it is off.

## Widget options

The widget's width and position on the dashboard are set on the plugin, not on the widget class:

```php
use Awcodes\Versions\VersionsPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            VersionsPlugin::make()
                ->widgetColumnSpan('full')
                ->widgetSort(2),
        ]);
}
```

`widgetColumnSpan()` takes anything Filament accepts for a column span — an integer, the string `'full'`, or an array of breakpoints — and defaults to `1`. `widgetSort()` takes an integer and defaults to `-1`, which places the widget above dashboard widgets that have not set a sort.

To change which versions are listed, see [Providers](providers.md).
