<?php

declare(strict_types=1);

namespace NeuralGlitch\OmniaIpsum\Tests\Twig\Runtime;

use NeuralGlitch\OmniaIpsum\Service\ImageProviderManager;
use NeuralGlitch\OmniaIpsum\Twig\Runtime\ImageRuntime;
use PHPUnit\Framework\TestCase;

final class ImageRuntimeTest extends TestCase
{
    private ImageRuntime $runtime;

    protected function setUp(): void
    {
        $config = [
            'images' => [
                'default_provider' => 'picsum',
            ],
        ];

        $imageManager = new ImageProviderManager($config);
        $this->runtime = new ImageRuntime($imageManager);
    }

    public function testPlaceholderImage(): void
    {
        $url = $this->runtime->placeholderImage(600, 400);

        $this->assertIsString($url);
        $this->assertStringContainsString('https://', $url);
    }

    public function testPlaceholderAvatar(): void
    {
        $url = $this->runtime->placeholderAvatar('John Doe', 100);

        $this->assertIsString($url);
        $this->assertStringContainsString('https://ui-avatars.com', $url);
    }
}
