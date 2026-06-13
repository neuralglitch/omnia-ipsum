<div align="center">

# Omnia Ipsum

### All-in-One Placeholder Text, Images, Audios and Videos for Symfony

[![PHP Version](https://img.shields.io/badge/PHP-8.1+-777BB4?style=flat&logo=php&logoColor=white)](composer.json)
[![Symfony](https://img.shields.io/badge/Symfony-6.4+-343434?style=flat&logo=symfony&logoColor=white)](composer.json)
<br/>
[![Packagist](https://img.shields.io/badge/Packagist-abandoned-red?style=flat&logo=packagist&logoColor=white)](https://packagist.org/packages/neuralglitch/omnia-ipsum)
[![License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat)](LICENSE)

</div>

> [!WARNING]
>
> `neuralglitch/omnia-ipsum` is
>
> - **abandoned** on [Packagist](https://packagist.org/packages/neuralglitch/omnia-ipsum)
> - **read-only / archived** on [GitHub](https://github.com/neuralglitch/omnia-ipsum)
>
> Replacement: `symfinity/omnia-ipsum`
>
> - New installs, issues, and releases: [symfinity/omnia-ipsum](https://github.com/symfinity/omnia-ipsum)
> - Migration: [docs/migration.md](docs/migration.md)

## Features

- **Placeholder Images** — 5 providers with real photos and colored placeholders
- **Avatar Generation** — Automatic initials and colors
- **Placeholder Videos** — Professional video clips
- **Placeholder Audio** — Music tracks and silent audio
- **Lorem Ipsum Text** — Classic placeholder text generation
- **Fake Data** — FakerPHP integration for realistic content
- **Twig Functions** — Simple, intuitive template functions

## New projects

Do **not** install this package. Use:

```bash
composer require symfinity/omnia-ipsum
```

Add the [symfinity/recipes](https://github.com/symfinity/recipes) Flex endpoint first — see [successor installation guide](https://github.com/symfinity/omnia-ipsum/blob/main/docs/installation.md).

The Flex recipe registers the bundle for **dev** and **test** only. **Do not enable in production.**

## Documentation (legacy tree)

Historical docs for the last `neuralglitch/`* release. For current Symfinity docs, use the [successor handbook](https://github.com/symfinity/omnia-ipsum/tree/main/docs).

- **[Migration from neuralglitch/omnia-ipsum](docs/migration.md)** — upgrade to `symfinity/omnia-ipsum`
- **[Quick Reference](docs/quickstart.md)** — Get started in 5 minutes (legacy)
- **[Image Providers](docs/images.md)** — All image providers and options
- **[Video Providers](docs/videos.md)** — Video options and clips
- **[Audio Providers](docs/audios.md)** — Audio providers and tracks
- **[Text Generation](docs/text.md)** — Lorem Ipsum and Faker integration
- **[Faker Integration](docs/faker.md)** — All available fake data formatters
- **[Configuration](docs/configuration.md)** — Configuration options

## Requirements (last legacy release)

- PHP 8.1 or higher
- Symfony 6.4, 7.x, or 8.x
- Twig 3.0 or higher

## Support

- **Issues / security:** [symfinity/omnia-ipsum](https://github.com/symfinity/omnia-ipsum/issues) — not this archived repo
- [Contributing](CONTRIBUTING.md) — historical; contributions go to symfinity/symfinity

## License

[MIT](LICENSE)