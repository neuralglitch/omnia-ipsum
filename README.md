<div align="center">

# Omnia Ipsum

### All-in-One Placeholder Bundle for Symfony

[![PHP Version](https://img.shields.io/badge/PHP-8.1+-777BB4?style=flat&logo=php&logoColor=white)](composer.json)
[![Symfony](https://img.shields.io/badge/Symfony-6.4+-343434?style=flat&logo=symfony&logoColor=white)](composer.json)
<br/>
[![PHPUnit](https://github.com/neuralglitch/omnia-ipsum/actions/workflows/phpunit.yml/badge.svg)](https://github.com/neuralglitch/omnia-ipsum/actions/workflows/phpunit.yml)
[![Coverage](https://github.com/neuralglitch/omnia-ipsum/actions/workflows/coverage.yml/badge.svg)](https://github.com/neuralglitch/omnia-ipsum/actions/workflows/coverage.yml)
[![PHPStan](https://github.com/neuralglitch/omnia-ipsum/actions/workflows/phpstan.yml/badge.svg)](https://github.com/neuralglitch/omnia-ipsum/actions/workflows/phpstan.yml)
<br/>
[![Psalm](https://github.com/neuralglitch/omnia-ipsum/actions/workflows/psalm.yml/badge.svg)](https://github.com/neuralglitch/omnia-ipsum/actions/workflows/psalm.yml)
[![Infection](https://github.com/neuralglitch/omnia-ipsum/actions/workflows/infection.yml/badge.svg)](https://github.com/neuralglitch/omnia-ipsum/actions/workflows/infection.yml)
[![Code Style](https://github.com/neuralglitch/omnia-ipsum/actions/workflows/php-cs-fixer.yml/badge.svg)](https://github.com/neuralglitch/omnia-ipsum/actions/workflows/php-cs-fixer.yml)
<br/>
[![Release](https://img.shields.io/packagist/v/neuralglitch/omnia-ipsum.svg?style=flat&logo=packagist&logoColor=white)](https://packagist.org/packages/neuralglitch/omnia-ipsum)
[![Downloads](https://img.shields.io/packagist/dt/neuralglitch/omnia-ipsum.svg?style=flat&logo=packagist&logoColor=white)](https://packagist.org/packages/neuralglitch/omnia-ipsum)
[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat)](LICENSE)

</div>

## Features

- **Placeholder Images** - 5 providers (Picsum, Placeholder.com, DummyImage, Placehold.co, UI Avatars)
- **Avatar Generation** - UI Avatars with automatic initials and colors
- **Placeholder Videos** - Google Cloud Storage with 13 professional videos
- **Placeholder Audio** - Silent WAV generation (data URLs)
- **Lorem Ipsum Text** - Paragraphs, sentences, words, titles
- **Fake Data** - FakerPHP integration for realistic data (with `fake_text()` for realistic content)
- **Twig Functions** - Simple, intuitive template functions (Runtime-based architecture)

## Installation

```bash
composer require neuralglitch/omnia-ipsum
```

## Quick Start

### 1. Use in templates

```twig
{# Images #}
<img src="{{ placeholder_image(600, 400) }}" alt="Placeholder">
<img src="{{ placeholder_image(800, 600, {provider: 'picsum'}) }}" alt="Photo">
<img src="{{ placeholder_avatar('John Doe', 100) }}" alt="Avatar">

{# Videos #}
<video src="{{ placeholder_video(1920, 1080, {video: 'sintel'}) }}" controls></video>

{# Audio #}
<audio src="{{ placeholder_audio(10) }}" controls></audio>

{# Text #}
<h1>{{ lorem_title() }}</h1>
<p>{{ lorem_paragraphs(3) }}</p>

{# Fake Data #}
<p>{{ fake('name') }} - {{ fake('email') }}</p>
<p>{{ fake_text(200) }}</p> {# Realistic text instead of Lorem Ipsum #}
```

### 2. Configure (optional)

```yaml
# config/packages/omnia_ipsum.yaml
omnia_ipsum:
    images:
        default_provider: 'picsum'
    faker:
        locale: 'de_DE'
```

### 3. Disable in production

```php
// config/bundles.php
return [
    // ...
    NeuralGlitch\OmniaIpsum\OmniaIpsumBundle::class => ['dev' => true, 'test' => true],
];
```

## Documentation

- **[Quick Reference](docs/quickstart.md)** - Get started in 5 minutes
- **[Image Providers](docs/images.md)** - 5 providers including Picsum, Placeholder.com, UI Avatars
- **[Video Providers](docs/videos.md)** - Google Cloud Storage (13 videos)
- **[Audio Providers](docs/audios.md)** - Silent audio generation
- **[Text Generation](docs/text.md)** - Lorem Ipsum + Faker realistic text
- **[Configuration](docs/configuration.md)** - All configuration options

## Requirements

- PHP 8.1 or higher
- Symfony 6.4, 7.x, or 8.x
- Twig 3.0 or higher

## Support

- [GitHub Issues](https://github.com/neuralglitch/omnia-ipsum/issues)
- [Security](.github/SECURITY.md)
- [Contributing](CONTRIBUTING.md)

## License

[MIT](LICENSE)