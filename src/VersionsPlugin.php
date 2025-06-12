<?php

declare(strict_types=1);

namespace Awcodes\Versions;

use Awcodes\Versions\Providers\FilamentVersionProvider;
use Awcodes\Versions\Providers\LaravelVersionProvider;
use Awcodes\Versions\Providers\PHPVersionProvider;
use Closure;
use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Concerns\EvaluatesClosures;
use Filament\View\PanelsRenderHook;
use Illuminate\View\View;
use Livewire\Livewire;

class VersionsPlugin implements Plugin
{
    use EvaluatesClosures;

    protected array $items = [];

    protected bool|Closure|null $hasDefaults = null;

    protected bool|Closure|null $hasNavigationView = null;

    protected int|string|array|null $widgetColumnSpan = null;

    protected ?int $widgetSort = null;

    public static function get(): static
    {
        return filament(app(static::class)->getId());
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public function boot(Panel $panel): void
    {
        Livewire::component('versions-widget', VersionsWidget::class);
    }

    public function getId(): string
    {
        return 'versions';
    }

    public function getWidgetColumnSpan(): int|string|array
    {
        return $this->widgetColumnSpan ?? 1;
    }

    public function getWidgetSort(): int
    {
        return $this->widgetSort ?? -1;
    }

    public function getVersions(): array
    {
        $defaults = [];

        if (static::get()->shouldHaveDefaults()) {
            $defaults = [
                new LaravelVersionProvider(),
                new FilamentVersionProvider(),
                new PHPVersionProvider(),
            ];
        }

        return [
            ...$defaults,
            ...$this->getItems(),
        ];
    }

    public function hasDefaults(bool|Closure $condition = true): static
    {
        $this->hasDefaults = $condition;

        return $this;
    }

    public function hasNavigationView(bool|Closure $condition = true): static
    {
        $this->hasNavigationView = $condition;

        return $this;
    }

    public function items(array|Closure $items): static
    {
        $this->items = $items;

        return $this;
    }

    public function register(Panel $panel): void
    {
        $panel->renderHook(
            PanelsRenderHook::SIDEBAR_FOOTER,
            fn (): View => view('versions::sidebar-widget', ['versions' => $this->getVersions()]),
        );

        $panel->renderHook(
            PanelsRenderHook::CONTENT_END,
            fn (): View => view('versions::footer-widget', ['versions' => $this->getVersions()]),
        );
    }

    public function shouldHaveDefaults(): bool
    {
        return $this->evaluate($this->hasDefaults) ?? true;
    }

    public function shouldHaveNavigationView(): bool
    {
        return $this->evaluate($this->hasNavigationView) ?? true;
    }

    public function widgetColumnSpan(int|string|array $columnSpan): static
    {
        $this->widgetColumnSpan = $columnSpan;

        return $this;
    }

    public function widgetSort(int $sort): static
    {
        $this->widgetSort = $sort;

        return $this;
    }

    protected function getItems(): array
    {
        return $this->evaluate($this->items) ?? [];
    }
}
