<?php

/**
 * Stub for the optional roots/soil plugin, provided at runtime by the host
 * WordPress install (the roots/soil package is type `wordpress-plugin` and is
 * not bundled by this library). Referenced from phpstan.neon under `scanFiles`
 * so the `\Roots\Soil\Soil` symbol resolves during static analysis; it lives
 * outside the PSR-4 autoload and is never loaded at runtime.
 */

declare(strict_types=1);

namespace Roots\Soil;

class Soil
{
    /**
     * @param list<string> $modules
     */
    public function __construct(array $modules)
    {
    }

    /**
     * @return list<string>
     */
    public static function discoverModules(): array
    {
        return [];
    }

    public function __invoke(): void
    {
    }
}
