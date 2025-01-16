<?php

declare(strict_types=1);

namespace AntsAi\Helper;

use Exception;

/**
 * @internal
 * 
 * Retrieves API_KEY from the env
 */
final class Apikey
{
  public static function fromEnvironment(?string $envVariable = null): string
  {
    $envKey = "CREWSAI_API_KEY";

    if (!is_null($envVariable)) {
      $envKey = $envVariable;
    }

    $apiKey = getenv($envKey);

    if (empty($apiKey)) {
      throw new Exception(sprintf("No environment variable with name '%s'", $envKey));
    }

    return $apiKey;
  }
}
