---
title: Installation
description: Install Versions and register its styles with your Filament theme.
---

# Installation

## Requiring the package

Install the package via Composer:

```bash
composer require awcodes/filament-versions
```

The service provider is registered through package discovery, so there is nothing to add to `config/app.php`.

## Registering the styles

The plugin renders from Blade views inside the package, so Tailwind needs to scan them when it builds your theme's CSS.

> [!IMPORTANT]
> If you have not set up a custom theme, follow the instructions in the [Filament documentation](https://filamentphp.com/docs/4.x/styling/overview#creating-a-custom-theme) first.

Once you have a custom theme, add the package's views to your theme's CSS file:

```css
@source '../../../../vendor/awcodes/filament-versions/resources/**/*.blade.php';
```

Adjust the relative path if your theme CSS does not live in the default location.

With that done, register the plugin on your panel — see [Usage](usage.md).

## Publishing views and translations

Neither is required. To override the markup of the sidebar line, the top-navigation footer or the dashboard widget:

```bash
php artisan vendor:publish --tag=versions-views
```

To change the widget's heading — it reads "Framework & Package Versions" by default:

```bash
php artisan vendor:publish --tag=versions-translations
```

Versions has no configuration file; everything is configured on the plugin itself.
