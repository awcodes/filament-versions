<?php

namespace FilamentVersions\Facades;

use Illuminate\Support\Facades\Facade;
use FilamentVersions\FilamentVersionsManager;

/**
 * @method static array getItems()
 */
class FilamentVersions extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'filament-versions-manager';
    }
}
