<?php

declare(strict_types=1);

namespace Kaiseki\WordPress\Soil;

final class ConfigProvider
{
    /**
     * @return array<mixed>
     */
    public function __invoke(): array
    {
        return [
            'soil' => [
                'clean-up', // Cleaner WordPress markup
//                'disable-rest-api', // Disable REST API
//                'disable-asset-versioning', // Remove asset versioning
//                'disable-trackbacks', // Disable trackbacks
//                'google-analytics' => 'UA-XXXXX-Y', // Google Analytics
//                'js-to-footer', // Move JS to footer
//                'nav-walker', // Clean up nav menu markup
//                'nice-search', // Redirect /?s=query to /search/query
//                'relative-urls', // Convert absolute URLs to relative URLs
            ],
            'hook' => [
                'provider' => [
                    Soil::class,
                ],
            ],
            'dependencies' => [
                'aliases' => [],
                'factories' => [
                    Soil::class => SoilFactory::class,
                ],
            ],
        ];
    }
}
