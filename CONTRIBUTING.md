# Contributing to Omnia Ipsum

Thank you for your interest in contributing to the Omnia Ipsum bundle for Symfony!

## Development Setup

1. **Clone the repository**:
   ```bash
   git clone https://github.com/neuralglitch/omnia-ipsum.git
   cd omnia-ipsum
   ```

2. **Install dependencies**:
   ```bash
   composer install
   ```

3. **Run quality checks**:
   ```bash
   # Quick QA check
   make qa
   
   # Or individually:
   make test        # PHPUnit tests
   make phpstan     # Static analysis (PHPStan)
   make psalm       # Static analysis (Psalm)
   make cs-check    # Code style check
   ```

4. **Run full QA suite**:
   ```bash
   make qa-full     # Includes mutation testing
   ```

## Quality Assurance Tools

This project uses multiple QA tools to ensure code quality:

- **PHPStan** (level 9) - Static analysis
- **Psalm** - Additional static analysis
- **PHP-CS-Fixer** - Symfony code style
- **PHPUnit** - Unit and integration tests (>90% coverage target)
- **Infection** - Mutation testing (MSI ≥40%)
- **PHPMetrics** - Code quality metrics
- **Rector** - Automated refactoring suggestions
- **Renovate** - Automated dependency updates

All tools can be run via `make` commands (see `make help`).

## Making Changes

1. **Create a feature branch**:
   ```bash
   git checkout -b feature/your-feature-name
   ```

2. **Write code** following the [Coding Standards](#coding-standards)

3. **Write tests** for new functionality (aim for >90% coverage)

4. **Update documentation** if needed

5. **Run QA checks**:
   ```bash
   make qa
   ```

6. **Commit your changes** following [Conventional Commits](#commit-messages)

## Commit Messages

Follow [Conventional Commits](https://www.conventionalcommits.org/):

```
feat: add Unsplash image provider
fix: resolve avatar color generation
docs: update provider comparison
test: add tests for TextGenerator service
refactor: optimize image URL generation
```

**Examples:**
- `feat(provider): add DummyImage format support`
- `fix(faker): resolve locale loading issue`
- `docs(readme): update usage examples`
- `test(service): add edge cases for placeholders`
- `chore(deps): update fakerphp/faker to 1.24`

## Coding Standards

### PHP

This project follows **Symfony Coding Standards** with strict typing:

✅ PHP 8.1+ features (readonly properties, constructor promotion)  
✅ `declare(strict_types=1);` in all files  
✅ Final classes by default  
✅ Full type hints (parameters, returns, properties)  
✅ PHPStan level 9 compliance  
✅ Psalm compliance

#### File Structure

```php
<?php

declare(strict_types=1);

namespace NeuralGlitch\OmniaIpsum\Service;

final class ServiceName
{
    public function __construct(
        private readonly Dependency $dependency
    ) {}
    
    public function methodName(): ReturnType
    {
        // Implementation
    }
}
```

### Naming Conventions

- **Classes/Interfaces**: `PascalCase`
- **Methods/Properties**: `camelCase`
- **Constants**: `UPPER_SNAKE_CASE`
- **Twig functions**: `snake_case` (e.g., `omnia_image`)
- **File names**: Match class name

### Configuration

- YAML format for configuration files
- Snake_case for parameter keys
- Provide comprehensive defaults
- Document all options

### Error Handling

Use specific exceptions:
- `\InvalidArgumentException` - For invalid arguments
- `\RuntimeException` - For runtime errors

Provide meaningful error messages.

## Pull Request Process

### Before Submitting

1. **Run full QA suite**:
   ```bash
   make qa-full
   ```

2. **Update documentation**:
   - README.md (if public API changes)
   - CHANGELOG.md (add entry under Unreleased)
   - Code comments/PHPDoc
   - docs/ files if needed

3. **Ensure tests pass**:
   - All existing tests pass
   - New tests added for new features
   - Coverage remains >90%

### Submitting PR

1. **Push your branch**:
   ```bash
   git push origin feature/your-feature-name
   ```

2. **Create Pull Request on GitHub** with:
   - Descriptive title
   - Reference to related issues (#123)
   - Clear description of changes
   - Breaking changes documented
   - Screenshots/examples if relevant

3. **PR Template**:

```markdown
## Description
Brief description of changes

## Type of Change
- [ ] Bug fix (non-breaking)
- [ ] New feature (non-breaking)
- [ ] Breaking change
- [ ] Documentation update
- [ ] Dependency update

## Related Issue
Fixes #(issue number)

## Testing
- [ ] Tests added/updated
- [ ] All tests pass (`make test`)
- [ ] PHPStan passes (`make phpstan`)
- [ ] Psalm passes (`make psalm`)
- [ ] Code style passes (`make cs-check`)
- [ ] Manual testing completed

## Checklist
- [ ] Code follows project style
- [ ] Documentation updated
- [ ] CHANGELOG.md updated
- [ ] No breaking changes (or documented)
- [ ] Coverage remains >90%
```

### Review Process

- Maintainers will review your PR
- Address feedback and update PR
- CI must pass (all QA checks)
- Once approved, maintainer will merge

## Reporting Issues

### Bug Reports

Include:

- Symfony version
- PHP version
- Omnia Ipsum version
- Provider used (placeholder/picsum/placekitten/etc.)
- Steps to reproduce
- Expected vs actual behavior
- Error messages/stack traces
- Minimal code example

Use the GitHub issue template for bug reports.

### Feature Requests

Include:

- Clear description of feature
- Use cases and benefits
- Possible implementation approach
- Examples from other projects (if any)
- Impact on existing functionality

### Security Issues

**Do NOT** open public issues for security vulnerabilities.

See [SECURITY.md](.github/SECURITY.md) for reporting security issues.

## Testing Guidelines

### Unit Tests

✅ Test all public methods  
✅ Test error conditions  
✅ Use descriptive test method names  
✅ Follow Arrange-Act-Assert pattern  
✅ Mock external dependencies  
✅ Aim for >90% coverage

**Example:**

```php
public function testGenerateThrowsExceptionOnInvalidProvider(): void
{
    $manager = new ImageProviderManager($config);
    
    $this->expectException(\InvalidArgumentException::class);
    $this->expectExceptionMessage('Image provider "invalid" not found');
    
    $manager->generate(600, 400, ['provider' => 'invalid']);
}
```

### Integration Tests

✅ Test Twig function rendering  
✅ Test service integration  
✅ Test provider URL generation  
✅ Test configuration loading

## Adding New Image Providers

### 1. Create Provider Class

```php
<?php

declare(strict_types=1);

namespace NeuralGlitch\OmniaIpsum\Provider;

final class NewProvider implements ImageProviderInterface
{
    public function generate(int $width, int $height, array $options = []): string
    {
        return sprintf('https://example.com/%dx%d', $width, $height);
    }

    public function getName(): string
    {
        return 'newprovider';
    }

    public function supportsOption(string $option): bool
    {
        return in_array($option, ['option1', 'option2'], true);
    }
}
```

### 2. Register Provider

Add to `ImageProviderManager::registerDefaultProviders()`:

```php
$this->registerProvider(new NewProvider());
```

### 3. Write Tests

Create `tests/Provider/NewProviderTest.php`:

```php
<?php

declare(strict_types=1);

namespace NeuralGlitch\OmniaIpsum\Tests\Provider;

use NeuralGlitch\OmniaIpsum\Provider\NewProvider;
use PHPUnit\Framework\TestCase;

final class NewProviderTest extends TestCase
{
    private NewProvider $provider;

    protected function setUp(): void
    {
        $this->provider = new NewProvider();
    }

    public function testGenerate(): void
    {
        $url = $this->provider->generate(600, 400);
        
        $this->assertStringContainsString('https://example.com/600x400', $url);
    }
    
    // More tests...
}
```

### 4. Document Provider

Add section to `docs/providers.md`:

```markdown
## NewProvider

**URL Pattern:** `https://example.com/{width}x{height}`

### Supported Options

- `option1` - Description
- `option2` - Description

### Examples

\`\`\`twig
{{ omnia_image(600, 400, {provider: 'newprovider'}) }}
\`\`\`
```

## Dependency Management

### Renovate

This project uses [Renovate](https://docs.renovatebot.com/) for automated dependency updates:

- **Schedule**: Weekly (Mondays before 6am CET)
- **Grouped updates**: Symfony packages, QA tools
- **Auto-merge**: Minor/patch updates for safe dependencies
- **Security**: Updates at any time

Renovate will:
1. Create a "Dependency Dashboard" issue
2. Open PRs for dependency updates
3. Auto-merge safe updates
4. Alert on security vulnerabilities

**No manual dependency updates needed!** Renovate handles it.

## Code Review Checklist

Before submitting, ensure:

- [ ] PHPStan level 9 passes (`make phpstan`)
- [ ] Psalm passes (`make psalm`)
- [ ] All tests pass (`make test`)
- [ ] Code coverage >90%
- [ ] Code style compliant (`make cs-check`)
- [ ] New functionality has tests
- [ ] Documentation updated
- [ ] CHANGELOG.md updated
- [ ] No hardcoded values
- [ ] Proper error handling
- [ ] Type hints on all methods/properties
- [ ] No unused imports
- [ ] Meaningful variable/method names
- [ ] Commit messages follow convention

## Development Tools

### Make Commands

```bash
make help         # Show all available commands
make test         # Run PHPUnit tests
make test-coverage # Run tests with coverage
make phpstan      # Run PHPStan
make psalm        # Run Psalm
make infection    # Run mutation testing
make metrics      # Generate code metrics
make rector       # Check for refactorings
make cs-fix       # Fix code style
make cs-check     # Check code style
make qa           # Quick QA (CS + PHPStan + Psalm + Tests)
make qa-full      # Full QA suite
```

### Composer Scripts

All make commands use composer scripts internally:

```bash
composer test
composer test:coverage
composer phpstan
composer psalm
composer infection
composer cs-fix
composer qa
composer qa-full
```

## Release Process

(For maintainers)

1. Update CHANGELOG.md (move Unreleased to version)
2. Update version in composer.json (if needed)
3. Tag release: `git tag v0.1.0`
4. Push tag: `git push origin v0.1.0`
5. GitHub Actions will create release
6. Packagist will auto-update

## Getting Help

- **GitHub Issues**: Bug reports and feature requests
- **GitHub Discussions**: Questions and general discussion
- **Documentation**: Check `/docs` directory
- **Examples**: See `/docs/usage.md`

---

Thank you for contributing! 🎉

