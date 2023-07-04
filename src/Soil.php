<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Soil;

use Kaiseki\WordPress\Hook\HookCallbackProviderInterface;

final class Soil implements HookCallbackProviderInterface
{
    /**
     * @param list<string> $modules
     */
    public function __construct(
        private readonly array $modules
    ) {
    }

    public function registerHookCallbacks(): void
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
        $modules = \Roots\Soil\Soil::discoverModules();
        (new \Roots\Soil\Soil($modules))();
    }
}
