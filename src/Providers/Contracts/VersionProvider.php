<?php

declare(strict_types=1);

namespace Awcodes\Versions\Providers\Contracts;

interface VersionProvider
{
    public function getName(): string;

    public function getVersion(): string;
}
