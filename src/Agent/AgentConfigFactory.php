<?php

declare(strict_types=1);

namespace PHPCrewsAi\Agent;

use PHPCrewsAi\ValueObject\Llm;
use PHPCrewsAi\ValueObject\ApiKey;
use PHPCrewsAi\ValueObject\LlmUrl;
use PHPCrewsAi\Enum\Llm\RequestType;
use PHPCrewsAi\Enum\Llm\SupportedLlms;
use PHPCrewsAi\ValueObject\AgentConfig;
use PHPCrewsAi\Provider\Openai\Endpoint;
use PHPCrewsAi\Helper\Apikey as ApiKeyHelper;
use PHPCrewsAi\Exception\AgentConfigException;

/**
 * @internal
 * 
 * Build the AgentConfig object
 */
class AgentConfigFactory
{
  private function __construct() {}

  public static function make(
    string $agentId,
    string|null $systemPrompt,
    string|null $prompt,
    SupportedLlms|null $model,
    AgentConfig|null $agentConfig,
  ): AgentConfig {

    if (!is_null($agentConfig)) {
      return $agentConfig;
    }

    if (!$model instanceof SupportedLlms) {
      throw new AgentConfigException("Agent model not specified");
    }

    $llm = new Llm(
      url: new LlmUrl(Endpoint::for(RequestType::CHAT)),
      apiKey: new ApiKey(ApiKeyHelper::fromEnvironment()), // get from env
      model: $model
    );

    return new AgentConfig(
      agentId: $agentId,
      llm: $llm,
      objective: $prompt ?: "",
      role: $systemPrompt ?: ""
    );
  }
}
