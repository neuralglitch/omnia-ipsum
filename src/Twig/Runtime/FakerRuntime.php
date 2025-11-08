<?php

declare(strict_types=1);

namespace NeuralGlitch\OmniaIpsum\Twig\Runtime;

use NeuralGlitch\OmniaIpsum\Service\FakerFactory;
use Twig\Extension\RuntimeExtensionInterface;

final class FakerRuntime implements RuntimeExtensionInterface
{
    public function __construct(
        private readonly FakerFactory $fakerFactory,
    ) {
    }

    /**
     * Generate fake data using Faker.
     *
     * @param array<int, mixed> $arguments
     */
    public function fake(string $formatter, array $arguments = []): mixed
    {
        return $this->fakerFactory->fake($formatter, $arguments);
    }

    /**
     * Generate realistic fake text (alternative to Lorem Ipsum).
     */
    public function fakeText(int $maxChars = 200): string
    {
        return (string) $this->fakerFactory->fake('realText', [$maxChars]);
    }
}
