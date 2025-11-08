<?php

declare(strict_types=1);

namespace NeuralGlitch\OmniaIpsum\Service;

use NeuralGlitch\OmniaIpsum\Provider\DummyImageProvider;
use NeuralGlitch\OmniaIpsum\Provider\ImageProviderInterface;
use NeuralGlitch\OmniaIpsum\Provider\PicsumProvider;
use NeuralGlitch\OmniaIpsum\Provider\PlaceholderProvider;
use NeuralGlitch\OmniaIpsum\Provider\PlaceholdProvider;
use NeuralGlitch\OmniaIpsum\Provider\UiAvatarsProvider;

final class ImageProviderManager
{
    /** @var array<string, ImageProviderInterface> */
    private array $providers = [];

    /**
     * @param array<string, mixed> $config
     */
    public function __construct(private readonly array $config)
    {
        $this->registerDefaultProviders();
    }

    /**
     * Generate a placeholder image URL.
     *
     * @param array<string, mixed> $options
     */
    public function generate(int $width, int $height, array $options = []): string
    {
        $providerName = $options['provider'] ?? $this->config['images']['default_provider'] ?? 'placeholder';

        if (!\is_string($providerName)) {
            $providerName = 'placeholder';
        }

        $provider = $this->getProvider($providerName);

        // Filter options to only those supported by the provider
        $filteredOptions = array_filter(
            $options,
            fn ($key) => 'provider' !== $key && $provider->supportsOption($key),
            \ARRAY_FILTER_USE_KEY
        );

        return $provider->generate($width, $height, $filteredOptions);
    }

    /**
     * Generate an avatar URL.
     *
     * @param array<string, mixed> $options
     */
    public function generateAvatar(string $name, int $size = 100, array $options = []): string
    {
        $background = $options['background'] ?? $this->generateColorFromName($name);
        $foreground = $options['foreground'] ?? 'ffffff';
        $bold = $options['bold'] ?? false;
        $rounded = $options['rounded'] ?? false;

        // Use UI Avatars for better avatar generation
        $provider = $this->getProvider('ui-avatars');

        return $provider->generate($size, $size, [
            'name' => $name,
            'background' => $background,
            'foreground' => $foreground,
            'bold' => $bold,
            'rounded' => $rounded,
        ]);
    }

    /**
     * Register a custom image provider.
     */
    public function registerProvider(ImageProviderInterface $provider): void
    {
        $this->providers[$provider->getName()] = $provider;
    }

    /**
     * Get a provider by name.
     */
    public function getProvider(string $name): ImageProviderInterface
    {
        if (!isset($this->providers[$name])) {
            throw new \InvalidArgumentException(sprintf('Image provider "%s" not found.', $name));
        }

        return $this->providers[$name];
    }

    /**
     * Get all registered providers.
     *
     * @return array<string, ImageProviderInterface>
     */
    public function getProviders(): array
    {
        return $this->providers;
    }

    private function registerDefaultProviders(): void
    {
        $this->registerProvider(new PlaceholderProvider());
        $this->registerProvider(new DummyImageProvider());
        $this->registerProvider(new PicsumProvider());
        $this->registerProvider(new PlaceholdProvider());
        $this->registerProvider(new UiAvatarsProvider());
    }

    private function generateColorFromName(string $name): string
    {
        // Generate a consistent color from the name
        $hash = md5($name);

        return substr($hash, 0, 6);
    }
}
