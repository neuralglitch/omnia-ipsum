<?php

declare(strict_types=1);

namespace NeuralGlitch\OmniaIpsum\Tests\Twig\Runtime;

use NeuralGlitch\OmniaIpsum\Service\AudioProviderManager;
use NeuralGlitch\OmniaIpsum\Twig\Runtime\AudioRuntime;
use PHPUnit\Framework\TestCase;

final class AudioRuntimeTest extends TestCase
{
    private AudioRuntime $runtime;

    protected function setUp(): void
    {
        $config = [
            'audios' => [
                'default_provider' => 'silence',
            ],
        ];

        $audioManager = new AudioProviderManager($config);
        $this->runtime = new AudioRuntime($audioManager);
    }

    public function testOmniaAudio(): void
    {
        $url = $this->runtime->omniaAudio(10);

        $this->assertIsString($url);
        $this->assertStringStartsWith('data:audio/wav;base64,', $url);
    }
}
