<?php

declare(strict_types=1);

namespace NeuralGlitch\OmniaIpsum\Twig\Runtime;

use NeuralGlitch\OmniaIpsum\Service\ImageProviderManager;
use Twig\Extension\RuntimeExtensionInterface;

final class ImageRuntime implements RuntimeExtensionInterface
{
    public function __construct(
        private readonly ImageProviderManager $imageProviderManager,
    ) {
    }

    /**
     * Generate a placeholder image URL.
     *
     * @param array<string, mixed> $options
     */
    public function placeholderImage(int $width, int $height, array $options = []): string
    {
        return $this->imageProviderManager->generate($width, $height, $options);
    }

    /**
     * Generate a placeholder avatar URL.
     *
     * @param array<string, mixed> $options
     */
    public function placeholderAvatar(string $name, int $size = 100, array $options = []): string
    {
        return $this->imageProviderManager->generateAvatar($name, $size, $options);
    }
}
