<?php

namespace FilamentVersions\Facades;

use Closure;
use Illuminate\Support\Facades\Facade;
use FilamentVersions\FilamentVersionsManager;

/**
 * @method static addItem(string $name, string | Closure $version)
 * @method static registerNavigationView(bool | Closure $condition)
 * @method static array getItems()
 * @method static bool hasNavigationView()
 */
class FilamentVersions extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'filament-versions-manager';
    }
}
