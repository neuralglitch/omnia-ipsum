# Image Providers

Complete reference for all available placeholder image providers.

## Provider Comparison

| Provider | Real Photos | Custom Text | Custom Colors | Formats | Special Features |
|----------|-------------|-------------|---------------|---------|------------------|
| `picsum` | ✅ | ❌ | ❌ | JPG | **Default**, random photos, grayscale, blur, seed |
| `placeholder` | ❌ | ✅ | ✅ | PNG, JPG, GIF | Fast, simple |
| `dummyimage` | ❌ | ✅ | ✅ | PNG, JPG, GIF | Multiple formats |
| `placehold` | ❌ | ✅ | ✅ | PNG, JPG, GIF, WebP | Modern API, WebP support |
| `ui-avatars` | ❌ | ✅ | ✅ | PNG, SVG | **Avatars with initials**, rounded, bold |

## Picsum Photos (Default)

**URL Pattern:** `https://picsum.photos/{width}/{height}?grayscale&blur={level}&random={seed}`

Random photos with special effects. Best for realistic layouts and mockups.

### Supported Options

- `grayscale` - Convert to grayscale (boolean)
- `blur` - Blur level (1-10)
- `seed` - Seed for consistent random image (integer)

### Examples

```twig
{# Random photo (default) #}
{{ omnia_image(800, 600) }}

{# Grayscale #}
{{ omnia_image(800, 600, {grayscale: true}) }}

{# Blurred #}
{{ omnia_image(1920, 1080, {blur: 5}) }}

{# Consistent image with seed (great for loops!) #}
{% for i in 1..12 %}
    <img src="{{ omnia_image(300, 300, {seed: i}) }}" alt="Product {{ i }}">
{% endfor %}

{# Same seed = same image (reproducible) #}
{{ omnia_image(600, 400, {seed: 42}) }}
```

### Best For

- Hero images
- Background images
- Gallery mockups
- Realistic prototypes
- Product images
- Blog post headers

**💡 Pro Tip:** Use `seed` parameter in loops to get different images!

## Placeholder.com

**URL Pattern:** `https://via.placeholder.com/{width}x{height}/{bg}/{fg}?text={text}`

Classic placeholder service with colored boxes and text.

### Supported Options

- `background` - Background color (hex, no #)
- `foreground` - Text color (hex, no #)
- `text` - Custom text

### Examples

```twig
{# Basic #}
{{ omnia_image(600, 400, {provider: 'placeholder'}) }}

{# Custom colors #}
{{ omnia_image(600, 400, {
    provider: 'placeholder',
    background: 'ff6b6b',
    foreground: 'ffffff'
}) }}

{# With text #}
{{ omnia_image(800, 600, {
    provider: 'placeholder',
    text: 'Product Image'
}) }}
```

### Best For

- Quick wireframes
- Layout testing
- Color scheme testing
- Simple mockups

## DummyImage.com

**URL Pattern:** `https://dummyimage.com/{width}x{height}/{bg}/{fg}.{format}&text={text}`

Versatile provider with multiple format support.

### Supported Options

- `background` - Background color (hex, no #)
- `foreground` - Text color (hex, no #)
- `text` - Custom text
- `format` - Image format (`png`, `jpg`, `gif`)

### Examples

```twig
{# JPEG format #}
{{ omnia_image(800, 600, {
    provider: 'dummyimage',
    format: 'jpg'
}) }}

{# Custom everything #}
{{ omnia_image(1200, 800, {
    provider: 'dummyimage',
    background: '007bff',
    foreground: 'ffffff',
    text: 'Hero Image',
    format: 'png'
}) }}

{# GIF format #}
{{ omnia_image(400, 300, {
    provider: 'dummyimage',
    format: 'gif'
}) }}
```

### Best For

- Testing different image formats
- Image optimization testing
- Specific format requirements
- Fine control over appearance

## Placehold.co

**URL Pattern:** `https://placehold.co/{width}x{height}/{bg}/{fg}.{format}?text={text}`

Modern placeholder service with clean design and WebP support.

### Supported Options

- `background` - Background color (hex, no #)
- `foreground` - Text color (hex, no #)
- `text` - Custom text
- `format` - Image format (`png`, `jpg`, `gif`, `webp`)

### Examples

```twig
{# Basic #}
{{ omnia_image(600, 400, {provider: 'placehold'}) }}

{# WebP format (modern, efficient) #}
{{ omnia_image(800, 600, {
    provider: 'placehold',
    format: 'webp'
}) }}

{# Custom colors and text #}
{{ omnia_image(1200, 600, {
    provider: 'placehold',
    background: '6c757d',
    foreground: 'ffffff',
    text: 'Banner Ad',
    format: 'webp'
}) }}
```

### Best For

- Modern web projects (WebP support)
- Performance optimization testing
- Clean, minimal designs
- Next-gen image formats

## UI Avatars (Avatar Generation)

**URL Pattern:** `https://ui-avatars.com/api/?name={name}&size={size}`

Specialized service for generating avatar images with initials and colors. **Use `omnia_avatar()` function for convenience!**

### Supported Options

- `name` - Full name to generate initials from (required)
- `background` - Background color (hex, no #)
- `foreground` - Text color (hex, no #)
- `bold` - Bold text (boolean)
- `rounded` - Rounded avatar (boolean)

### Examples

```twig
{# Using the convenience function #}
<img src="{{ omnia_avatar('John Doe', 100) }}" alt="John Doe" class="rounded-circle">

{# With custom colors #}
<img src="{{ omnia_avatar('Jane Smith', 80, {
    background: '007bff',
    foreground: 'ffffff'
}) }}" alt="Jane Smith">

{# Bold and rounded #}
<img src="{{ omnia_avatar('Bob Wilson', 120, {
    bold: true,
    rounded: true
}) }}" alt="Bob Wilson">

{# Team list example #}
{% for member in team %}
    <img src="{{ omnia_avatar(fake('name'), 60) }}" 
         alt="{{ member }}" 
         class="rounded-circle">
{% endfor %}
```

### Features

- **Automatic Initials**: Extracts initials from full name (e.g., "John Doe" → "JD")
- **Consistent Colors**: Same name always generates same color
- **Custom Colors**: Override with custom background/foreground
- **SVG Support**: Lightweight vector format
- **Fast CDN**: Delivered via global CDN

### Best For

- User profiles
- Team member lists
- Comment sections
- Contact lists
- Author bylines
- Chat interfaces

## Choosing the Right Provider

### Use `picsum` (default) when:
- ✅ You want realistic photos
- ✅ You're building a gallery
- ✅ You need hero images
- ✅ You want to impress clients
- ✅ Need blur or grayscale effects
- ✅ Need different images in loops (use `seed`)

### Use `ui-avatars` when:
- ✅ Generating user avatars
- ✅ Need initials displayed
- ✅ Want consistent colors per name
- ✅ Building team/profile pages
- ✅ Chat/messaging interfaces

### Use `placeholder` when:
- ✅ You need simple colored boxes
- ✅ You want fast loading
- ✅ You need custom text
- ✅ You're prototyping layouts
- ✅ Testing color schemes

### Use `dummyimage` when:
- ✅ You need specific image formats
- ✅ You want fine control over colors
- ✅ You need consistent styling
- ✅ You're testing image optimization

### Use `placehold` when:
- ✅ You want WebP format
- ✅ You need modern placeholder API
- ✅ You want colored boxes with text
- ✅ Testing next-gen formats

## Performance Comparison

| Provider | Avg Load Time | CDN | Rate Limits |
|----------|---------------|-----|-------------|
| `picsum` | ~150ms | ✅ | None |
| `placeholder` | ~100ms | ✅ | None |
| `dummyimage` | ~120ms | ✅ | None |
| `placehold` | ~130ms | ✅ | None |
| `ui-avatars` | ~90ms | ✅ | None |

*All providers use CDN for fast global delivery.*

## Custom Provider

You can create custom providers by implementing `ImageProviderInterface`:

```php
<?php

declare(strict_types=1);

namespace App\Provider;

use NeuralGlitch\OmniaIpsum\Provider\ImageProviderInterface;

final class CustomProvider implements ImageProviderInterface
{
    public function generate(int $width, int $height, array $options = []): string
    {
        return sprintf('https://example.com/%dx%d', $width, $height);
    }

    public function getName(): string
    {
        return 'custom';
    }

    public function supportsOption(string $option): bool
    {
        return in_array($option, ['format', 'quality'], true);
    }
}
```

Register in `config/services.yaml`:

```yaml
services:
    App\Provider\CustomProvider:
        tags:
            - { name: 'omnia_ipsum.image_provider' }
```

Use in templates:

```twig
{{ omnia_image(800, 600, {provider: 'custom'}) }}
```

## See Also

- [Quick Reference](quickstart.md) - Quick examples
- [Configuration](configuration.md) - Set default provider
- [Picsum Photos](https://picsum.photos/) - Official Picsum website
- [UI Avatars](https://ui-avatars.com/) - Official UI Avatars website
