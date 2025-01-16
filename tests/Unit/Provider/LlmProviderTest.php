<?php

declare(strict_types=1);

namespace Tests\Unit\Provider;

use AntsAi\ValueObject\Llm;
use AntsAi\ValueObject\ApiKey;
use AntsAi\ValueObject\LlmUrl;
use AntsAi\Provider\LlmProvider;
use AntsAi\Enum\Llm\SupportedLlms;
use AntsAi\ValueObject\AgentConfig;

/** 
 * Provider Class
 * 
 * - Receive llm or enough info to build an LLM
 * - receive user message
 * - determine which provider to use
 * - call the llm and return a response or error
 * 
 */

it("create instance from agent config", function (): void {
  $llm = new Llm(
    url: new LlmUrl("http://"),
    apiKey: new ApiKey("foo"),
    model: SupportedLlms::OPENAI_CHATGPT_4o_MINI
  );

  /** @var AgentConfig $agentConfig */
  $agentConfig = new AgentConfig(
    llm: $llm,
    agentId: "part_assistant",
    greeting: "Hello, I am your part assistant for today. How can I help?",
    role: "Expert Car Parts Assistant",
    objective: "You will answer questions regarding cart parts based on given context",
    taskCodes: [],
  );

  $provider = new LlmProvider(agentConfig: $agentConfig);

  expect($provider)->toBeInstanceOf(LlmProvider::class);

  expect($provider->agentConfig->agentId)->toEqual($agentConfig->agentId);
});
