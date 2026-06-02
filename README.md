# kaiseki/wp-soil

Configure [`roots/soil`](https://roots.io/plugins/soil/) modules through `kaiseki/config` and a
`kaiseki/wp-hook` provider.

A single `kaiseki/wp-hook` `HookProviderInterface` (`Soil`) that, on `after_setup_theme`, declares the
configured Soil modules via `add_theme_support('soil', …)` and boots Soil. The module list is read
from the `soil` config key, so enabling or disabling Soil features is pure configuration.

The Soil plugin itself (`roots/soil`) is provided by the host WordPress install at runtime; this
package only wires it up.

## Installation

```bash
composer require kaiseki/wp-soil
```

Requires PHP 8.2 or newer.

## Usage

Register `ConfigProvider` with your laminas-style config aggregator, list the Soil modules under the
`soil` key, and activate the provider via `kaiseki/wp-hook`:

```php
use Kaiseki\WordPress\Soil\Soil;

return [
    'soil' => [
        'clean-up',                  // Cleaner WordPress markup
        'nice-search',               // Redirect /?s=query to /search/query
        'js-to-footer',              // Move JS to the footer
        // 'google-analytics' => 'UA-XXXXX-Y',
    ],
    'hook' => [
        'provider' => [
            Soil::class,
        ],
    ],
];
```

`ConfigProvider` registers the `SoilFactory`, which reads the `soil` array from the container and
passes it straight to `add_theme_support('soil', …)`.

## Development

```bash
composer install
composer check   # check-deps, cs-check, phpstan
```

## License

MIT — see [LICENSE](LICENSE).
