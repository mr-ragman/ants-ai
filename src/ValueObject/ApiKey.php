<?php

declare(strict_types=1);

namespace AntsAi\ValueObject;

use SensitiveParameter;
use AntsAi\Contract\StringableInterface;

/**
 * @internal
 */
final class ApiKey implements StringableInterface
{
    /**
     * Create API key
     */
    public function __construct(#[SensitiveParameter] public readonly string $apiKey)
    {
        // ..
    }

    public static function from(#[SensitiveParameter] string $apiKey): self
    {
        return new self($apiKey);
    }

    /**
     * {@inheritdoc}
     */
    public function toString(): string
    {
        return sprintf('ApiKey :: {apiKey: %s, }', $this->apiKey);
    }
}
