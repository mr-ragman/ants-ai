<?php

declare(strict_types=1);

namespace AntsAi\ValueObject;

use AntsAi\ValueObject\ApiKey;
use AntsAi\Enum\Llm\SupportedLlms;
use AntsAi\Contract\Llm\LlmInterface;

class Llm implements LlmInterface
{
  public function __construct(
    public readonly ApiKey $apiKey,
    public readonly LlmUrl $url,
    public readonly SupportedLlms $model,
    public readonly float $temperature = 1.0,
    public readonly string|null $apiVersion = ""

  ) {
    // ...
  }
}
