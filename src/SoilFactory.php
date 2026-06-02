<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Soil;

use Kaiseki\Config\Config;
use Psr\Container\ContainerInterface;

final class SoilFactory
{
    public function __invoke(ContainerInterface $container): Soil
    {
        return new Soil(Config::fromContainer($container)->array('soil', []));
    }
}
