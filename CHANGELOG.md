# Changelog

All notable changes to this project will be documented in this file, in reverse chronological order by release.

## 1.0.0 - 2026-06-02

First tagged release.

### Added

- `Soil` hook provider (and `SoilFactory` / `ConfigProvider`) that declares the configured `roots/soil`
  modules via `add_theme_support('soil', …)` on `after_setup_theme` and boots Soil. The module list is
  read from the `soil` config key.

### Changed

- PHP requirement is `^8.2` (PHP 8.4 is the primary target).
- Adopted the `kaiseki/wp-hook` 2.0 provider API: `Soil` now implements `HookProviderInterface` and
  exposes `addHooks()` (was `HookCallbackProviderInterface::registerHookCallbacks()`).
- `kaiseki/config` and `kaiseki/wp-hook` pinned to `^2.0`; `SoilFactory` uses the config 2.0
  `Config::fromContainer()` entry point (was `Config::get()`).
- Converted the toolchain from PHP_CodeSniffer to the shared `kaiseki/php-coding-standard` (php-cs-fixer)
  standard; modernized the dev stack (PHPStan 2, PHPUnit 11 schema, composer-require-checker 4); dropped
  `squizlabs/php_codesniffer`, the direct `friendsofphp/php-cs-fixer`, the unused `roots/wordpress` dev
  dependency, and the bespoke `phpcs`/`phpcbf`/`deploy` scripts. CI now runs via the reusable workflow
  in `kaisekidev/.github`.

### Fixed

- PHPStan 2 (level max): removed the inline `@var list<string>` override in `SoilFactory` — the `soil`
  config is passed through as `array<array-key, mixed>`, which also correctly carries keyed module
  options (e.g. `'google-analytics' => …`). The optional `\Roots\Soil\Soil` plugin class resolves via a
  `scanFiles` stub rather than a suppression.
