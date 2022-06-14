# Filament Versions

A mostly useless package to display framework versions at the bottom of the Filament Admin navigation panel and an optional widget to do the same in the dashboard or custom pages.

![Dark mode screen shot](./images/screenshot-dark.png)

![Light mode screen shot](./images/screenshot-light.png)

## Installation

Install the package via composer

```bash
composer require awcodes/filament-versions
```

## Usage

The navigation panel is loaded automatically.

To use the widget, just include it either in your `filament.php` config file under the 'widgets' section:

```php
'widgets' => [
    'namespace' => 'App\\Filament\\Widgets',
    'path' => app_path('Filament/Widgets'),
    'register' => [
        ...
        \FilamentVersions\FilamentVersionsWidget::class
    ],
],
```

Or

The widget can also be included as a normal Livewire component on any custom pages, etc:

```php
<filament-versions-widget />
```
