<?php

declare(strict_types=1);

namespace AntsAi\Agent;

use AntsAi\ValueObject\Llm;
use AntsAi\ValueObject\ApiKey;
use AntsAi\ValueObject\LlmUrl;
use AntsAi\Enum\Llm\RequestType;
use AntsAi\Enum\Llm\SupportedLlms;
use AntsAi\ValueObject\AgentConfig;
use AntsAi\Provider\Openai\Endpoint;
use AntsAi\Helper\Apikey as ApiKeyHelper;
use AntsAi\Exception\AgentConfigException;

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
