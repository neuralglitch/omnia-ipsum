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

    public function testOmniaImage(): void
    {
        $url = $this->runtime->omniaImage(600, 400);

        $this->assertIsString($url);
        $this->assertStringContainsString('https://', $url);
    }

    public function testOmniaAvatar(): void
    {
        $url = $this->runtime->omniaAvatar('John Doe', 100);

        $this->assertIsString($url);
        $this->assertStringContainsString('https://ui-avatars.com', $url);
    }
}
