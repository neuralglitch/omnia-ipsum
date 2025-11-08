# Symfony Flex Recipe for Omnia Ipsum

This directory contains the Symfony Flex recipe template for automatic bundle setup.

## Recipe Location

The actual recipe should be submitted to:
- **Private recipes**: https://github.com/neuralglitch/symfony-recipes
- **Public recipes**: https://github.com/symfony/recipes-contrib (after bundle is stable)

## Recipe Structure

```
neuralglitch/omnia-ipsum/
├── manifest.json                    # Bundle registration
├── config/
│   └── packages/
│       └── omnia_ipsum.yaml         # Default configuration
└── post-install.txt                 # Post-installation message
```

## Testing the Recipe

### 1. Local Testing (via Composer Path Repository)

Add to your test project's `composer.json`:

```json
{
    "extra": {
        "symfony": {
            "endpoint": [
                "https://api.github.com/repos/neuralglitch/symfony-recipes/contents/index.json?ref=main",
                "flex://defaults"
            ]
        }
    }
}
```

### 2. Install Bundle

```bash
composer require neuralglitch/omnia-ipsum --dev
```

### 3. Verify

Check that:
- [ ] Bundle is registered in `config/bundles.php` (dev/test only)
- [ ] Config file exists in `config/packages/omnia_ipsum.yaml`
- [ ] Post-install message appears

## Submitting to symfony-recipes

1. Fork https://github.com/neuralglitch/symfony-recipes
2. Create directory: `neuralglitch/omnia-ipsum/0.1/`
3. Copy recipe files
4. Create pull request
5. Wait for review

## Recipe Guidelines

- **Keep it minimal**: Only essential configuration
- **Use sensible defaults**: Most users shouldn't need to change config
- **Document**: Include comments in YAML files
- **Post-install**: Provide helpful getting started info

## See Also

- [Symfony Flex Documentation](https://symfony.com/doc/current/setup/flex.html)
- [Recipe Development](https://github.com/symfony/flex/blob/main/doc/recipes.md)

