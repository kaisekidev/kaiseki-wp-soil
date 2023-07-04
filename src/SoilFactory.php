<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Soil;

use Kaiseki\Config\Config;
use Psr\Container\ContainerInterface;

final class SoilFactory
{
    public function __invoke(ContainerInterface $container): Soil
    {
        /** @var list<string> $soilConfig */
        $soilConfig = Config::get($container)->array('soil', []);
        return new Soil($soilConfig);
    }
}
