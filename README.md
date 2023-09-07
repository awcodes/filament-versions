# Filament Versions

A mostly useless package to display framework versions at the bottom of the Filament Admin navigation panel and an optional widget to do the same in the dashboard or custom pages.

![versions-og](https://res.cloudinary.com/aw-codes/image/upload/w_1200,f_auto,q_auto/plugins/versions/awcodes-versions.jpg)

## Installation

Install the package via composer

```bash
composer require awcodes/filament-versions
```

In an effort to align with Filament's theming methodology you will need to use a custom theme to use this plugin.

> **Note**
> If you have not set up a custom theme and are using a Panel follow the instructions in the [Filament Docs](https://filamentphp.com/docs/3.x/panels/themes#creating-a-custom-theme) first.

Add the plugin's views to your `tailwind.config.js` file.

```js
content: [
    '<path-to-vendor>/awcodes/filament-versions/resources/**/*.blade.php',
]
```

## Usage

Register the plugin and/or Widget in your Panel provider:

```php
use Awcodes\FilamentVersions\VersionsPlugin;
use Awcodes\FilamentVersions\VersionsWidget;

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
use Awcodes\FilamentVersions\VersionsPlugin;

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
use Awcodes\FilamentVersions\VersionsPlugin;
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
use Awcodes\FilamentVersions\VersionsPlugin;

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
use Awcodes\FilamentVersions\VersionsPlugin;

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
