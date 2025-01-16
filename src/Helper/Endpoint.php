<?php

declare(strict_types=1);

namespace PHPCrewsAi\Helper;

use UnhandledMatchError;
use PHPCrewsAi\Enum\Llm\RequestType;
use PHPCrewsAi\Enum\Llm\SupportedLlms;
use PHPCrewsAi\Exception\LlmException;

/**
 * @internal
 */
final class Endpoint
{
  public static function from(SupportedLlms|string $model, RequestType $requestType): string
  {
    if ($model instanceof SupportedLlms) {
      $provider = $model->name;
      $providerName = explode("_", $provider);
    } else {
      $providerName = explode("_", $model);
    }

    try {
      return match (strtolower($providerName[0])) {
        "openai" => \PHPCrewsAi\Provider\Openai\Endpoint::for($requestType),
      };
    } catch (UnhandledMatchError $unhandledMatchError) {
      // this will catch both invalid requests or models
      throw new LlmException("The model provider or request type specified does not exist");
    }
  }
}
