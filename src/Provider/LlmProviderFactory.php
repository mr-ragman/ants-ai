<?php

declare(strict_types=1);

namespace AntsAi\Provider;

use AntsAi\ValueObject\AgentConfig;

class LlmProviderFactory
{
  private function __construct() {}

  public static function from(AgentConfig $agentConfig): LlmProvider
  {
    return new LlmProvider(agentConfig: $agentConfig);
  }
}
