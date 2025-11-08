<?php

declare(strict_types=1);

namespace NeuralGlitch\OmniaIpsum\Twig\Runtime;

use NeuralGlitch\OmniaIpsum\Service\VideoProviderManager;
use Twig\Extension\RuntimeExtensionInterface;

final class VideoRuntime implements RuntimeExtensionInterface
{
    public function __construct(
        private readonly VideoProviderManager $videoProviderManager,
    ) {
    }

    /**
     * Generate a placeholder video URL.
     *
     * @param array<string, mixed> $options
     */
    public function placeholderVideo(int $width, int $height, array $options = []): string
    {
        return $this->videoProviderManager->generate($width, $height, $options);
    }
}
