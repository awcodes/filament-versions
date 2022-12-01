<?php

namespace FilamentVersions\Facades;

use Closure;
use Illuminate\Support\Facades\Facade;
use FilamentVersions\FilamentVersionsManager;

/**
 * @method static array addItem(string $name, string | Closure $version)
 * @method static array getItems()
 * @method static array registerNavigationView(bool | Closure $condition)
 */
class FilamentVersions extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'filament-versions-manager';
    }
}
