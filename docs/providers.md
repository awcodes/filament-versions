---
title: Providers
description: Add your own entries to the Versions list or turn off the built-in ones.
---

# Providers

Every line Versions displays comes from a provider — a small class that supplies a name and a version string.

## The default providers

Three are registered automatically:

| Provider | Reports |
|---|---|
| `LaravelVersionProvider` | The installed Laravel version |
| `FilamentVersionProvider` | The installed Filament version |
| `PHPVersionProvider` | The PHP version the application is running on |

Package versions are read from Composer's installed manifest at runtime, so they reflect what is actually installed rather than what your constraints allow.

A leading `v` is stripped when the version is displayed, and in the sidebar the name is abbreviated to its first four characters to fit the narrow column.

## Adding your own

Implement the `VersionProvider` contract. It requires exactly two methods:

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

Both must return a string. Pass instances of it to `items()`:

```php
use App\Filament\Providers\MyCustomVersionProvider;
use Awcodes\Versions\VersionsPlugin;

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

Custom items are appended after the defaults, in the order you list them.

## Turning off the defaults

To show only your own entries, disable the built-ins. Like `hasNavigationView()`, this accepts a boolean or a closure:

```php
use Awcodes\Versions\VersionsPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            VersionsPlugin::make()
                ->hasDefaults(false),
        ]);
}
```

With the defaults off and no items of your own, the list is empty and nothing renders.
