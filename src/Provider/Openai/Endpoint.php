<?php

declare(strict_types=1);

namespace PHPCrewsAi\Provider\Openai;

use PHPCrewsAi\Enum\Llm\RequestType;

/**
 * @internal
 */
class Endpoint
{
  public static function for(RequestType $requestType): string
  {
    return match ($requestType) {
      RequestType::CHAT => "https://api.openai.com/v1/chat/completions",
      RequestType::EMBEDDING => "https://api.openai.com/v1/embeddings",
    };
  }
}
