<?php

declare(strict_types=1);

namespace Workbench\App\Filament\Providers;

use Awcodes\Versions\Providers\Contracts\VersionProvider;

class CustomVersionProvider implements VersionProvider
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
