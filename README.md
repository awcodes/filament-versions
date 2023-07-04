# Filament Versions

A mostly useless package to display framework versions at the bottom of the Filament Admin navigation panel and an optional widget to do the same in the dashboard or custom pages.

## Installation

Install the package via composer

```bash
composer require awcodes/filament-versions
```

## Usage

Register the plugin and/or Widget in your Panel provider:

```php
use Awcodes\FilamentVersions\FilamentVersions\VersionsPlugin;
use Awcodes\FilamentVersions\FilamentVersions\VersionsWidget;

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

> **Note**
> If you are using the `topNavigation` option with your panel the sidebar widget will show up at the bottom of your pages content.

## Disabling Navigation View

If you'd like to disable the navigation view and only use the dashboard 
widget you may do passing `false` or a Closure to the `hasNavigationView` method.

```php
use Awcodes\FilamentVersions\FilamentVersions\VersionsPlugin;

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
use Awcodes\FilamentVersions\Providers\Contracts\VersionProvider;

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
use Awcodes\FilamentVersions\FilamentVersions\VersionsPlugin;
use App\Filament\VersionProviders\MyCustomVersionProvider;

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
use Awcodes\FilamentVersions\FilamentVersions\VersionsPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            VersionsPlugin::make()
                ->hasDefaultItems(false)
        ]);
}
```

## Widget options

You can change the column span and order of the widget by setting them on the plugin.

```php
use Awcodes\FilamentVersions\FilamentVersions\VersionsPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            VersionsPlugin::make()
                ->widgetColumnSpan('full')
                ->widgetOrder(2),
        ]);
}
```


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
