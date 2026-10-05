<?php

declare(strict_types=1);

namespace Workbench\App\Filament\Providers;

use Awcodes\Versions\Providers\Contracts\VersionProvider;

/**
 * Reports a fixed version instead of the installed one, so the Workbench, and the documentation screenshots taken
 * from it, show the same numbers after every `composer update`.
 */
class FixedVersionProvider implements VersionProvider
{
    public function __construct(
        protected string $name,
        protected string $version,
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getVersion(): string
    {
        return $this->version;
    }
}
