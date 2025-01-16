<?php

declare(strict_types=1);

use PHPCrewsAi\Agent\Agent;
use PHPCrewsAi\Enum\Llm\SupportedLlms;
use PHPCrewsAi\ValueObject\ResponseState;

beforeEach(function (): void {
    // $this->agentConfig = new AgentConfig(
    //     llm: SupportedLlms::OPENAI_CHATGPT_4o_MINI,
    //     nameId: "part_assistant",
    //     greeting: "Hello, I am your part assistant for today. How can I help?",
    //     role: "Expert Car Parts Assistant",
    //     objective: "You will answer questions regarding cart parts based on given context",
    //     taskCodes: [],
    // );
});

test('create_a_simple_agent_and_assign_automatic_id', function (): void {

    $agent = new Agent(model: SupportedLlms::OPENAI_CHATGPT_4o_MINI, systemPrompt: "You are a helpful assistant.");

    expect($agent)->toBeObject();
    expect($agent)->toBeInstanceOf(Agent::class);

    expect($agent->id())->not->toBeEmpty();
});

test('simple_agent_can_return_response', function (): void {

    $agent = new Agent(model: SupportedLlms::OPENAI_CHATGPT_4o_MINI, systemPrompt: "You are a helpful assistant.");

    /** @var ResponseState $state */
    $state = $agent->execute(message: "How are you today?");

    expect($state->content)->not->toBeEmpty();
});
