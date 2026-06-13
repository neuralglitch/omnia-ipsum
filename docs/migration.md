# Migration from neuralglitch/omnia-ipsum

**`neuralglitch/omnia-ipsum` is abandoned** on Packagist (replacement: **`symfinity/omnia-ipsum`**). This repository is **archived** on GitHub — use [symfinity/omnia-ipsum](https://github.com/symfinity/omnia-ipsum) for issues, releases, and documentation.

## Package identity

| Item | Legacy (`neuralglitch/*`) | Symfinity (`symfinity/*`) |
|------|---------------------------|---------------------------|
| Composer name | `neuralglitch/omnia-ipsum` | `symfinity/omnia-ipsum` |
| GitHub | [neuralglitch/omnia-ipsum](https://github.com/neuralglitch/omnia-ipsum) (archived) | [symfinity/omnia-ipsum](https://github.com/symfinity/omnia-ipsum) |
| PSR-4 namespace | `NeuralGlitch\OmniaIpsum\` | `Symfinity\OmniaIpsum\` |
| Test namespace | `NeuralGlitch\OmniaIpsum\Tests\` | `Symfinity\OmniaIpsum\Tests\` |
| Bundle class | `NeuralGlitch\OmniaIpsum\OmniaIpsumBundle` | `Symfinity\OmniaIpsum\OmniaIpsumBundle` |
| Config root key | `omnia_ipsum:` | `omnia_ipsum:` (unchanged) |
| Config file | `config/packages/omnia_ipsum.yaml` | `config/packages/omnia_ipsum.yaml` |

## Composer and Symfony floor

| Constraint | Legacy (last release) | Symfinity |
|------------|----------------------|-----------|
| PHP | `>=8.1` | `>=8.2` |
| Symfony | `^6.4 \|\| ^7.0 \|\| ^8.0` | `^7.4` (org consumer floor) |

## Application changes

1. **Require** the successor and remove the legacy package:

   ```bash
   composer remove neuralglitch/omnia-ipsum
   composer require symfinity/omnia-ipsum
   ```

2. **Flex recipes** — add the [symfinity/recipes](https://github.com/symfinity/recipes) endpoint to your project's `composer.json` (see [recipes README](https://github.com/symfinity/recipes/blob/main/README.md)). Legacy installs used [neuralglitch/symfony-recipes](https://github.com/neuralglitch/symfony-recipes).

3. **Update imports** in PHP and tests: `NeuralGlitch\OmniaIpsum` → `Symfinity\OmniaIpsum`.

4. **Update `config/bundles.php`** if the bundle is registered manually:

   ```php
   // Before
   NeuralGlitch\OmniaIpsum\OmniaIpsumBundle::class => ['dev' => true, 'test' => true],

   // After
   Symfinity\OmniaIpsum\OmniaIpsumBundle::class => ['dev' => true, 'test' => true],
   ```

   The Flex recipe for `symfinity/omnia-ipsum` registers the bundle for **dev** and **test** only.

5. **Twig templates** — function names are unchanged (`omnia_image`, `omnia_avatar`, `omnia_video`, `omnia_audio`, `lorem_paragraphs`, `fake`, etc.).

6. **Production** — keep the bundle disabled in `prod` (see [successor installation guide](https://github.com/symfinity/omnia-ipsum/blob/main/docs/installation.md)).

## Successor documentation

Full handbook for `symfinity/omnia-ipsum`:

- [Quickstart](https://github.com/symfinity/omnia-ipsum/blob/main/docs/quickstart.md)
- [Installation](https://github.com/symfinity/omnia-ipsum/blob/main/docs/installation.md)
- [Configuration](https://github.com/symfinity/omnia-ipsum/blob/main/docs/configuration.md)
- [Image providers](https://github.com/symfinity/omnia-ipsum/blob/main/docs/images.md)
- [Faker integration](https://github.com/symfinity/omnia-ipsum/blob/main/docs/faker.md)
