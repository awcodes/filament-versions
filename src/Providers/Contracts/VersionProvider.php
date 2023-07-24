<?php

namespace Awcodes\FilamentVersions\Providers\Contracts;

interface VersionProvider
{
    public function getName(): string;

    public function getVersion(): string;
}
