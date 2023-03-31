<?php

namespace FilamentVersions;

use Closure;
use Filament\Support\Concerns\EvaluatesClosures;
use Illuminate\Support\Str;

class FilamentVersionsManager
{
    use EvaluatesClosures;

    public array $items = [];

    public bool $shouldRegisterNavigationView = true;

    public function addItem(string $name, string | Closure $version = ''): static
    {
        if ($version instanceof Closure) {
            $version = $version();
        }

        $this->items[Str::slug($name)] = [
            'name' => $name,
            'version' => $version,
        ];

        return $this;
    }

    public function registerNavigationView(bool | Closure $condition): static
    {
        $this->shouldRegisterNavigationView = $condition;

        return $this;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function hasNavigationView(): bool
    {
        return $this->evaluate($this->shouldRegisterNavigationView);
    }
}
