<?php

declare(strict_types=1);

namespace AntsAi\Helper;

use UnhandledMatchError;
use AntsAi\Enum\Llm\RequestType;
use AntsAi\Enum\Llm\SupportedLlms;
use AntsAi\Exception\LlmException;

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
        "openai" => \AntsAi\Provider\Openai\Endpoint::for($requestType),
      };
    } catch (UnhandledMatchError $unhandledMatchError) {
      // this will catch both invalid requests or models
      throw new LlmException("The model provider or request type specified does not exist");
    }
  }
}
