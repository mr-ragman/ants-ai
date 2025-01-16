<?php

declare(strict_types=1);

namespace Tests\Unit\ValueObject;

use PHPCrewsAi\ValueObject\Llm;
use PHPCrewsAi\ValueObject\ApiKey;
use PHPCrewsAi\ValueObject\LlmUrl;
use PHPCrewsAi\Enum\Llm\SupportedLlms;
use PHPCrewsAi\ValueObject\AgentConfig;

it("can create agent config with model name", function (): void {
  $llm = new Llm(
    url: new LlmUrl("http://"),
    apiKey: new ApiKey("foo"),
    model: SupportedLlms::OPENAI_CHATGPT_4o_MINI
  );

  $agentConfig = new AgentConfig(
    llm: $llm,
    agentId: "part_assistant",
    greeting: "Hello, I am your part assistant for today. How can I help?",
    role: "Expert Car Parts Assistant",
    objective: "You will answer questions regarding cart parts based on given context",
    taskCodes: [],

    // tool_limit: 0,
    // // Maximum number of tokens for the agent to generate in a response.
    // max_tokens: 0,
    // # -*- User settings
    // session: false,
    // // data
    // sessionData: [],

    // # Save responses :: Class implementing MemoryInterface
    // memory: null,
    // # add_history_to_messages=true adds the chat history to the messages sent to the Model.
    // add_history_to_messages: true,
    // # Number of historical responses to add to the messages.
    // num_history_responses: 3,

    // # -*- Agent Knowledge
    // knowledge: [],
    // embedder: null,
    // retriever: [],
    // knowledge_format: ["json", "yaml"],

    // # If True, add instructions to return "I dont know" when the agent does not know the answer.
    // prevent_hallucinations: true,

    // # If True, add instructions for limiting tool access to the default system prompt if tools are provided
    // limit_tool_access: false,

    // # Class implementing AgentResponseInterface
    // response_model: null,
  );

  expect($agentConfig)->toBeObject();
  expect($agentConfig)->toBeInstanceOf(AgentConfig::class);
});
