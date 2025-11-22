<div align="center">

# Omnia Ipsum

### All-in-One Placeholder Text, Images, Audios and Videos for Symfony

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

- **Placeholder Images** - 5 providers with real photos and colored placeholders
- **Avatar Generation** - Automatic initials and colors
- **Placeholder Videos** - Professional video clips
- **Placeholder Audio** - Music tracks and silent audio
- **Lorem Ipsum Text** - Classic placeholder text generation
- **Fake Data** - FakerPHP integration for realistic content
- **Twig Functions** - Simple, intuitive template functions

## Prerequisites

For fully automatic setup, visit the [related Flex recipe repository](https://github.com/neuralglitch/symfony-recipes) and follow the instructions to add it to the 
composer.json in the consuming project, as the recipe is not yet part of the Symfony's main recipe repository.

## Installation

```bash
composer require neuralglitch/omnia-ipsum
```

## Quick Start

```twig
{# Images #}
<img src="{{ omnia_image(600, 400) }}" alt="Placeholder">
<img src="{{ omnia_avatar('John Doe', 100) }}" alt="Avatar">

{# Videos #}
<video src="{{ omnia_video(1920, 1080) }}" controls></video>

{# Audio #}
<audio src="{{ omnia_audio(10) }}" controls></audio>

{# Text #}
<h1>{{ lorem_title() }}</h1>
<p>{{ lorem_paragraphs(3) }}</p>

{# Fake Data #}
<p>{{ fake('name') }} - {{ fake('email') }}</p>
<p>{{ fake_text(200) }}</p>
```

**Important:** Disable in production by configuring the bundle only for `dev` and `test` environments.

## Documentation

- **[Quick Reference](docs/quickstart.md)** - Get started in 5 minutes
- **[Image Providers](docs/images.md)** - All image providers and options
- **[Video Providers](docs/videos.md)** - Video options and clips
- **[Audio Providers](docs/audios.md)** - Audio providers and tracks
- **[Text Generation](docs/text.md)** - Lorem Ipsum and Faker integration
- **[Faker Integration](docs/faker.md)** - All available fake data formatters
- **[Configuration](docs/configuration.md)** - Configuration options

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