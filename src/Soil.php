<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Soil;

use Kaiseki\WordPress\Hook\HookProviderInterface;
use Roots\Soil\Soil as RootsSoil;

use function add_action;
use function add_theme_support;

final class Soil implements HookProviderInterface
{
    /**
     * @param array<array-key, mixed> $modules
     */
    public function __construct(
        private readonly array $modules
    ) {
    }

    public function addHooks(): void
    {
        add_action('after_setup_theme', [$this, 'addThemeSupport']);
        add_action('after_setup_theme', [$this, 'setupSoil'], 100);
    }

    public function addThemeSupport(): void
    {
        add_theme_support('soil', $this->modules);
    }

    public function setupSoil(): void
    {
        $modules = RootsSoil::discoverModules();
        (new RootsSoil($modules))();
    }
}
