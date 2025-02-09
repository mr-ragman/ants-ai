<?php

declare(strict_types=1);

namespace AntsAi\Provider;

use AntsAi\ValueObject\AgentConfig;
use AntsAi\ValueObject\ResponseState;
use AntsAi\Contract\Llm\ProviderInterface;
use AntsAi\Contract\Llm\LlmResponseInterface;

class LlmProvider implements ProviderInterface
{
  public function __construct(public readonly AgentConfig $agentConfig) {}

  public function run(): LlmResponseInterface
  {
    // dd($this->agentConfig);

    // call the LLM , send request, build response state.
    return new ResponseState(
      type: "text",
      content: "SystemPropt: " . $this->agentConfig->role .
        "<br/>User: " . $this->agentConfig->objective .
        "<br/>Assitant: I am well, I hope you are doing wonderful today! How may I help you?"
    );
  }

  // identify endpoints
}
