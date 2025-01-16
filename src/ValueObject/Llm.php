<?php

declare(strict_types=1);

namespace PHPCrewsAi\ValueObject;

use PHPCrewsAi\ValueObject\ApiKey;
use PHPCrewsAi\Enum\Llm\SupportedLlms;
use PHPCrewsAi\Contract\Llm\LlmInterface;

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
