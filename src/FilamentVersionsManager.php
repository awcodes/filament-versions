<?php

namespace FilamentVersions;

use Closure;
use Illuminate\Support\Str;

class FilamentVersionsManager
{
    public array $items = [];

    public function addItem(string $name, string | Closure $version = ''): static
    {
        $this->items[Str::slug($name)] = [
            'name' => $name,
            'version' => $version,
        ];

        return $this;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}
