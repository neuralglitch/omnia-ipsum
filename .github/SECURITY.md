# Security Policy

## Supported Versions

| Version | Supported          |
| ------- | ------------------ |
| 0.1.x   | :white_check_mark: |

## Reporting a Vulnerability

We take the security of Omnia Ipsum seriously. If you discover a security vulnerability, please follow these steps:

### 1. Do NOT Open a Public Issue

**Please do not report security vulnerabilities through public GitHub issues.**

### 2. Email Security Report

Send details to: **dev@neuralglit.ch**

Include:

- Description of the vulnerability
- Steps to reproduce
- Affected versions
- Potential impact
- Suggested fix (if any)

### 3. What to Expect

- **Acknowledgment**: Within 48 hours
- **Initial Response**: Within 5 business days
- **Status Updates**: Every 7 days until resolved

### 4. Disclosure Policy

- We will coordinate with you on disclosure timing
- Typical timeline: 90 days from report to public disclosure
- Credit will be given to reporter (unless you prefer anonymity)

## Security Best Practices

When using Omnia Ipsum:

### 1. Development Only

⚠️ **This bundle is intended for development and prototyping only!**

**Do NOT use in production:**

```php
// config/bundles.php
return [
    // ✅ Correct: Only in dev/test
    NeuralGlitch\OmniaIpsum\OmniaIpsumBundle::class => ['dev' => true, 'test' => true],
    
    // ❌ Wrong: Available in production
    NeuralGlitch\OmniaIpsum\OmniaIpsumBundle::class => ['all' => true],
];
```

### 2. External Image Providers

The bundle generates URLs to external image providers:
- placeholder.com
- dummyimage.com
- picsum.photos
- placekitten.com
- placehold.co
- placeholders.dev

**Security considerations:**
- Images are loaded from external domains
- No user data is sent to providers
- Only image dimensions and styling options are in URLs
- Consider Content Security Policy (CSP) settings

### 3. Faker Data

Faker generates random but **predictable** data:

⚠️ **Never use Faker-generated data for:**
- Passwords
- Cryptographic keys
- Security tokens
- Production secrets

### 4. Template Injection

When using custom text in placeholders:

```twig
{# ❌ Dangerous: User input not escaped #}
{{ placeholder_image(600, 400, {text: userInput}) }}

{# ✅ Safe: Escaped user input #}
{{ placeholder_image(600, 400, {text: userInput|escape('url')}) }}
```

### 5. Locale Files

Faker uses locale data files:

- **Do NOT** load untrusted locale files
- **Do NOT** allow user-controlled locale selection in production
- Stick to official FakerPHP locales

## Known Security Considerations

### 1. No Data Transmission

The bundle does **not**:
- Send any data to external services
- Store any data
- Make HTTP requests
- Access databases

It only generates URLs and text locally.

### 2. External Dependencies

The bundle depends on:
- `fakerphp/faker` - Well-maintained, widely used
- Symfony components - Official Symfony packages

All dependencies are regularly updated via Renovate.

### 3. Image Provider Availability

External image providers may:
- Go offline temporarily
- Change their URLs
- Implement rate limiting
- Track image requests (via browser)

**Mitigation**: Use different providers as fallback.

## Security Updates

Security updates will be:
- Released as soon as possible
- Announced in CHANGELOG.md
- Published as GitHub Security Advisory
- Communicated to Packagist users

## Scope

This security policy covers:
- Omnia Ipsum bundle code
- Configuration handling
- Twig functions
- Service implementations

This policy does **not** cover:
- External image provider services
- FakerPHP library (report to them separately)
- Symfony framework (report to them separately)

## Contact

- **Security Issues**: dev@neuralglit.ch
- **General Issues**: [GitHub Issues](https://github.com/neuralglitch/omnia-ipsum/issues)
- **General Questions**: [GitHub Discussions](https://github.com/neuralglitch/omnia-ipsum/discussions)

---

Thank you for helping keep Omnia Ipsum secure! 🔒
