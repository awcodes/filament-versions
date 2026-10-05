---
title: Versions
description: Display Laravel, Filament and PHP versions in a Filament panel's navigation and on its dashboard.
---

# Versions

Versions is a small Filament plugin that shows the framework versions your application is running. It renders in two places, and you can use either or both:

- **In the panel navigation** — a compact line at the bottom of the sidebar, added automatically once the plugin is registered.
- **As a dashboard widget** — a larger card you can place on the dashboard or any custom page.

![A Filament dashboard with the Versions widget showing Laravel 13.0.0, Filament 5.0.0, PHP 8.4.0 and My Custom Version 1.0.0, and the same versions abbreviated in a line at the bottom of the sidebar](assets/navigation-light.png#gh-light-mode-only)
![A Filament dashboard with the Versions widget showing Laravel 13.0.0, Filament 5.0.0, PHP 8.4.0 and My Custom Version 1.0.0, and the same versions abbreviated in a line at the bottom of the sidebar](assets/navigation-dark.png#gh-dark-mode-only)

Out of the box it reports Laravel, Filament and PHP. You can add your own entries — a package version, an API version, a build number — by writing a small provider class, and you can turn the defaults off entirely.

## Where to go next

- [Installation](installation.md) — install the package and register its styles.
- [Usage](usage.md) — register the plugin and widget, and control where they appear.
- [Providers](providers.md) — add your own entries or replace the defaults.
