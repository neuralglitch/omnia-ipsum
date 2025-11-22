<?php

declare(strict_types=1);

namespace NeuralGlitch\OmniaIpsum\Provider;

/**
 * SoundHelix audio provider.
 *
 * Provides generated royalty-free music tracks from SoundHelix.
 * Perfect for music player and podcast demos.
 *
 * @see https://www.soundhelix.com
 */
final class SoundHelixProvider implements AudioProviderInterface
{
    private const BASE_URL = 'https://www.soundhelix.com/examples/mp3';
    private const AVAILABLE_SONGS = 10;

    public function generate(int $duration, array $options = []): string
    {
        $song = (int) ($options['song'] ?? 1);

        // Ensure song is within valid range
        if ($song < 1 || $song > self::AVAILABLE_SONGS) {
            $song = 1;
        }

        return sprintf('%s/SoundHelix-Song-%d.mp3', self::BASE_URL, $song);
    }

    public function getName(): string
    {
        return 'soundhelix';
    }

    public function supportsOption(string $option): bool
    {
        return 'song' === $option;
    }

    /**
     * Get available song numbers.
     *
     * @return array<int>
     */
    public static function getAvailableSongs(): array
    {
        return range(1, self::AVAILABLE_SONGS);
    }
}
