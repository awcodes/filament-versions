# Versions

A mostly useless package to display framework versions at the bottom of the Filament Admin navigation panel and an optional widget to do the same in the dashboard or custom pages.

[![Latest Version](https://img.shields.io/github/release/awcodes/filament-versions.svg?style=flat-square&color=blue&label=Release)](https://github.com/awcodes/filament-versions/releases)
[![MIT Licensed](https://img.shields.io/badge/License-MIT-blue.svg?style=flat-square)](LICENSE.md)
[![Total Downloads](https://img.shields.io/packagist/dt/awcodes/filament-versions.svg?style=flat-square&color=blue&label=Downloads)](https://packagist.org/packages/awcodes/filament-versions)
[![GitHub Repo stars](https://img.shields.io/github/stars/awcodes/filament-versions?style=flat-square&color=blue&label=Stars)](https://github.com/awcodes/filament-versions/stargazers)

## Compatibility

| Package Version | Filament Version |
|-----------------|------------------|
| 1.x             | 2.x              |
| 2.x             | 3.x              |
| 3.x             | 4.x              |
| 4.x             | 5.x              |

<!-- [docs_start] -->

## Installation

Install the package via composer

```bash
composer require awcodes/filament-versions
```

> [!IMPORTANT]
> If you have not set up a custom theme and are using Filament Panels follow the instructions in the [Filament Docs](https://filamentphp.com/docs/4.x/styling/overview#creating-a-custom-theme) first.

After setting up a custom theme add the plugin's views to your theme css file.

```css
@source '../../../../vendor/awcodes/filament-versions/resources/**/*.blade.php';
```

## Usage

Register the plugin and/or Widget in your Panel provider:

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

> [!NOTE]
> If you are using the `topNavigation` option with your panel the sidebar widget will show up at the bottom of your pages content.

## Disabling Navigation View

If you'd like to disable the navigation view and only use the dashboard 
widget you may do passing `false` or a Closure to the `hasNavigationView` method.

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

## Custom Items

You can add custom items to the widgets by creating a new class that implements the `VersionProvider` interface.

```php
use Awcodes\Versions\Providers\Contracts\VersionProvider;

class MyCustomVersionProvider implements VersionProvider
{
    public function getName(): string
    {
        return 'My Custom Version';
    }

    public function getVersion(): string
    {
        return '1.0.0';
    }
}
```

Then add the item to the plugin:

```php
use Awcodes\Versions\VersionsPlugin;
use App\Filament\Providers\MyCustomVersionProvider;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            VersionsPlugin::make()
                ->items([
                    new MyCustomVersionProvider(),
                ]),
        ]);
}
```

## Disabling the default items

You can disable the default items by passing `false` or a Closure to the `hasDefaultItems` method.

```php
use Awcodes\Versions\VersionsPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            VersionsPlugin::make()
                ->hasDefaults(false)
        ]);
}
```

## Widget options

You can change the column span and order of the widget by setting them on the plugin.

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

<!-- [docs_end] -->

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Adam Weston](https://github.com/awcodes)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
