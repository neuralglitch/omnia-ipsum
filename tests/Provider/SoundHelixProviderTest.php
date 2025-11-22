<?php

declare(strict_types=1);

namespace NeuralGlitch\OmniaIpsum\Tests\Provider;

use NeuralGlitch\OmniaIpsum\Provider\SoundHelixProvider;
use PHPUnit\Framework\TestCase;

final class SoundHelixProviderTest extends TestCase
{
    private SoundHelixProvider $provider;

    protected function setUp(): void
    {
        $this->provider = new SoundHelixProvider();
    }

    public function testGenerate(): void
    {
        $url = $this->provider->generate(10);

        $this->assertStringContainsString('soundhelix.com', $url);
        $this->assertStringContainsString('.mp3', $url);
    }

    public function testGenerateWithSong(): void
    {
        $url = $this->provider->generate(10, ['song' => 5]);

        $this->assertStringContainsString('SoundHelix-Song-5.mp3', $url);
    }

    public function testGenerateWithDefaultSong(): void
    {
        $url = $this->provider->generate(10);

        $this->assertStringContainsString('SoundHelix-Song-1.mp3', $url);
    }

    public function testGenerateWithInvalidSongFallsBackToOne(): void
    {
        $url1 = $this->provider->generate(10, ['song' => 0]);
        $url2 = $this->provider->generate(10, ['song' => 999]);

        $this->assertStringContainsString('SoundHelix-Song-1.mp3', $url1);
        $this->assertStringContainsString('SoundHelix-Song-1.mp3', $url2);
    }

    public function testGenerateWithNegativeSong(): void
    {
        $url = $this->provider->generate(10, ['song' => -5]);

        $this->assertStringContainsString('SoundHelix-Song-1.mp3', $url);
    }

    public function testGetName(): void
    {
        $this->assertSame('soundhelix', $this->provider->getName());
    }

    public function testSupportsOption(): void
    {
        $this->assertTrue($this->provider->supportsOption('song'));
        $this->assertFalse($this->provider->supportsOption('duration'));
        $this->assertFalse($this->provider->supportsOption('format'));
    }

    public function testGetAvailableSongs(): void
    {
        $songs = SoundHelixProvider::getAvailableSongs();

        $this->assertIsArray($songs);
        $this->assertCount(10, $songs);
        $this->assertContains(1, $songs);
        $this->assertContains(5, $songs);
        $this->assertContains(10, $songs);
    }

    public function testAllSongsGenerateValidUrls(): void
    {
        foreach (SoundHelixProvider::getAvailableSongs() as $song) {
            $url = $this->provider->generate(10, ['song' => $song]);

            $this->assertStringContainsString('soundhelix.com', $url);
            $this->assertStringContainsString("SoundHelix-Song-{$song}.mp3", $url);
        }
    }
}
