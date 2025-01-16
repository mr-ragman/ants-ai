<?php

declare(strict_types=1);

namespace Tests\Unit\Helper;

use AntsAi\Helper\Endpoint;
use AntsAi\Enum\Llm\RequestType;
use AntsAi\Enum\Llm\SupportedLlms;
use AntsAi\Exception\LlmException;

test("invalid model: throws LlmException", function (): void {
  $model = "OPENIA_FAKE_MODEL";
  $requestType = RequestType::CHAT;

  expect(fn() => Endpoint::from($model, $requestType))->toThrow(LlmException::class);;
});

test("invalid request type: throws LlmException", function (): void {
  $model = "OPENAI_FAKE_MODEL";
  $requestType = RequestType::INVALID;
  expect(fn() => Endpoint::from($model, $requestType))->toThrow(LlmException::class);;
});

it("retrieves llm endpoint", function (): void {
  $model = SupportedLlms::OPENAI_CHATGPT_4o_MINI;
  $requestType = RequestType::CHAT;

  $endpoint = Endpoint::from($model, $requestType);

  expect($endpoint)->not->toBeEmpty();
});
