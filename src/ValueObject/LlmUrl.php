<?php

declare(strict_types=1);

namespace PHPCrewsAi\ValueObject;

use PHPCrewsAi\Contract\StringableInterface;
use PHPCrewsAi\Exception\InvalidUrlException;

/**
 * @internal
 */
final class LlmUrl implements StringableInterface
{
  public readonly string $url;

  private bool $isSecure = true;

  /**
   * Create API key
   */
  public function __construct(string $url, bool $isSecure = true)
  {
    $this->isSecure = $isSecure;

    $this->validateUrl($url);
  }

  public static function from(string $url, bool $isSecure = true): self
  {
    return new self($url, $isSecure);
  }

  private function validateUrl(string $url): void
  {
    if (!str_starts_with($url, "https://") || !str_starts_with($url, "http://")) {
      $url = "https://" . $url;
    }

    if ($this->isSecure && !str_starts_with($url, "https://")) {
      throw new InvalidUrlException("Url must be secure");
    }

    $this->url = $url;
  }

  /**
   * {@inheritdoc}
   */
  public function toString(): string
  {
    return sprintf('ApiKey :: {url: %s, }', $this->url);
  }
}
